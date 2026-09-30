<?php

namespace Tests\Unit;

use App\Services\ImageService;
use App\Services\PageService;
use Tests\TestCase;

class ServiceLayerTest extends TestCase
{
    protected PageService $pageService;
    protected ImageService $imageService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->imageService = new ImageService();
        $this->pageService = new PageService($this->imageService);
    }

    public function test_normalizes_legacy_blog_html_image_paths(): void
    {
        $raw = '<p>Text</p><img src="../admin/uploads/test.jpg"><img src="../../admin/uploads/another.png">';
        $normalized = $this->pageService->normalizeBlogHtml($raw);

        $this->assertStringNotContainsString('../admin/uploads/', $normalized);
        $this->assertStringContainsString('src="/uploads/test.jpg"', $normalized);
        $this->assertStringContainsString('src="/uploads/another.png"', $normalized);
    }

    public function test_resolves_province_correctly_for_cities(): void
    {
        $this->assertEquals('Punjab', $this->pageService->getProvinceForCity('lahore'));
        $this->assertEquals('Sindh', $this->pageService->getProvinceForCity('karachi'));
        $this->assertEquals('KPK', $this->pageService->getProvinceForCity('peshawar'));
        $this->assertEquals('Balochistan', $this->pageService->getProvinceForCity('quetta'));
        $this->assertEquals('Federal', $this->pageService->getProvinceForCity('islamabad'));
    }

    public function test_extracts_phone_numbers_from_html_and_schema(): void
    {
        $html = '<a href="tel:03001234567">Call</a><a href="tel:03339876543">Call 2</a>';
        $schema = ['telephone' => '03001234567'];

        $numbers = $this->pageService->extractPhoneNumbers($html, $schema);

        $this->assertCount(2, $numbers);
        $this->assertContains('03001234567', $numbers);
        $this->assertContains('03339876543', $numbers);
    }

    public function test_parses_blog_file_format(): void
    {
        $sampleBlogPhp = <<<'PHP'
<?php
$post = array (
  'id' => '1',
  'title' => 'Sample Dog Article',
  'description' => '<p>Dog training</p><img src="../admin/uploads/dog.jpg">',
  'image' => 'dog.jpg',
  'created_at' => '2025-01-15 10:00:00',
  'url' => 'https://blog.armydogcenterpk.com/pages/sample-dog-article.php',
);
PHP;

        $parsed = $this->pageService->parseBlogFile('sample-dog-article', $sampleBlogPhp);

        $this->assertNotNull($parsed);
        $this->assertEquals('blog', $parsed['type']);
        $this->assertEquals('Sample Dog Article', $parsed['title']);
        $this->assertEquals('sample-dog-article', $parsed['slug']);
        $this->assertEquals('uploads/dog.jpg', $parsed['image_path']);
        $this->assertStringContainsString('/uploads/dog.jpg', $parsed['content']);
    }
}
