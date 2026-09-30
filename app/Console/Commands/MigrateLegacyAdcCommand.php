<?php

namespace App\Console\Commands;

use App\Models\Image;
use App\Models\Page;
use App\Services\ImageService;
use App\Services\PageService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateLegacyAdcCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'migrate:legacy-adc 
                            {--only= : Migrate only services or blogs (services|blogs)}
                            {--dry-run : Simulate data extraction without modifying the database}
                            {--truncate : Truncate pages and images tables before migrating}';

    /**
     * The console command description.
     */
    protected $description = 'Ingests legacy ADC service city pages and blog articles into MySQL';

    protected PageService $pageService;
    protected ImageService $imageService;

    public function __construct(PageService $pageService, ImageService $imageService)
    {
        parent::__construct();
        $this->pageService = $pageService;
        $this->imageService = $imageService;
    }

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->info("============================================================");
        $this->info(" ADC-Pakistan Legacy Content Migration Engine (Phase 4)");
        $this->info("============================================================");

        $only = strtolower($this->option('only') ?? '');
        $dryRun = (bool) $this->option('dry-run');
        $truncate = (bool) $this->option('truncate');

        if ($dryRun) {
            $this->warn("[DRY RUN MODE] No changes will be written to the database.");
        }

        if ($truncate && !$dryRun) {
            if ($this->confirm('Truncate pages and images tables before migrating? This will delete existing records.')) {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                Image::truncate();
                Page::truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                $this->info("Tables truncated.");
            }
        }

        $serviceStats = ['processed' => 0, 'saved' => 0, 'images' => 0];
        $blogStats = ['processed' => 0, 'saved' => 0, 'images' => 0];

        if ($only !== 'blogs') {
            $serviceStats = $this->migrateServices($dryRun);
        }

        if ($only !== 'services') {
            $blogStats = $this->migrateBlogs($dryRun);
        }

        $this->newLine();
        $this->info("============================================================");
        $this->info(" Migration Completed Successfully");
        $this->info("============================================================");

        $this->table(
            ['Content Type', 'Files Processed', 'Saved/Updated', 'Images Linked'],
            [
                ['Service City Pages', $serviceStats['processed'], $serviceStats['saved'], $serviceStats['images']],
                ['Blog Articles', $blogStats['processed'], $blogStats['saved'], $blogStats['images']],
                ['Total Content', $serviceStats['processed'] + $blogStats['processed'], $serviceStats['saved'] + $blogStats['saved'], $serviceStats['images'] + $blogStats['images']],
            ]
        );

        return Command::SUCCESS;
    }

    /**
     * Migrate legacy service city pages using PageService.
     */
    protected function migrateServices(bool $dryRun): array
    {
        $files = glob(base_path('services/*.php'));
        $stats = ['processed' => 0, 'saved' => 0, 'images' => 0];

        // Filter out index.php and sitemap.xml
        $files = array_filter($files, function ($file) {
            $name = basename($file);
            return $name !== 'index.php' && $name !== 'sitemap.xml';
        });

        $total = count($files);
        $this->info("Discovered {$total} legacy service pages to ingest.");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $chunk = [];

        foreach ($files as $filePath) {
            $slug = basename($filePath, '.php');
            $rawHtml = file_get_contents($filePath);

            $parsed = $this->pageService->parseServiceFile($slug, $rawHtml);

            if ($parsed) {
                $chunk[] = $parsed;
                $stats['processed']++;
            }

            if (count($chunk) >= 50 || $stats['processed'] === $total) {
                if (!$dryRun) {
                    DB::transaction(function () use ($chunk, &$stats) {
                        foreach ($chunk as $item) {
                            $hasImage = !empty($item['image_path']);
                            $this->pageService->saveServicePage($item, true);
                            $stats['saved']++;
                            if ($hasImage) $stats['images']++;
                        }
                    });
                }
                $chunk = [];
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        return $stats;
    }

    /**
     * Migrate legacy blog articles using PageService.
     */
    protected function migrateBlogs(bool $dryRun): array
    {
        $files = glob(base_path('blog/pages/*.php'));
        $stats = ['processed' => 0, 'saved' => 0, 'images' => 0];

        // Filter out index.php
        $files = array_filter($files, function ($file) {
            return basename($file) !== 'index.php';
        });

        $total = count($files);
        $this->info("Discovered {$total} legacy blog articles to ingest.");

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $chunk = [];

        foreach ($files as $filePath) {
            $slug = basename($filePath, '.php');
            $rawContent = file_get_contents($filePath);

            $parsed = $this->pageService->parseBlogFile($slug, $rawContent);

            if ($parsed) {
                $chunk[] = $parsed;
                $stats['processed']++;
            }

            if (count($chunk) >= 100 || $stats['processed'] === $total) {
                if (!$dryRun) {
                    DB::transaction(function () use ($chunk, &$stats) {
                        foreach ($chunk as $item) {
                            $hasImage = !empty($item['image_path']);
                            $this->pageService->saveBlogPage($item, true);
                            $stats['saved']++;
                            if ($hasImage) $stats['images']++;
                        }
                    });
                }
                $chunk = [];
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();

        return $stats;
    }
}
