<?php

namespace App\Services;

use App\Models\Page;
use Carbon\Carbon;

class PageService
{
    protected ImageService $imageService;

    /**
     * Complete province dictionary mapping for all Pakistani cities.
     */
    protected array $provinceMap = [
        // Sindh
        'karachi' => 'Sindh', 'hyderabad' => 'Sindh', 'sukkur' => 'Sindh', 'larkana' => 'Sindh',
        'badin' => 'Sindh', 'badin-cantt' => 'Sindh', 'ghotki' => 'Sindh', 'dadu' => 'Sindh',
        'jacobabad' => 'Sindh', 'khairpur' => 'Sindh', 'mirpur-khas' => 'Sindh', 'mirpurkhas' => 'Sindh',
        'nawabshah' => 'Sindh', 'shikarpur' => 'Sindh', 'thatta' => 'Sindh', 'umarkot' => 'Sindh',
        'umerkote' => 'Sindh', 'sujawal' => 'Sindh', 'sajawal' => 'Sindh', 'sanghar' => 'Sindh',
        'matiari' => 'Sindh', 'jamshoro' => 'Sindh', 'kashmore' => 'Sindh', 'qambar' => 'Sindh',
        'shahdadkot' => 'Sindh', 'tando-allahyar' => 'Sindh', 'tando-jam' => 'Sindh', 'kandiaro' => 'Sindh',
        'digri' => 'Sindh', 'diplo' => 'Sindh', 'gambat' => 'Sindh', 'garho' => 'Sindh',
        'gharo' => 'Sindh', 'gohi' => 'Sindh', 'golarchi' => 'Sindh', 'hala' => 'Sindh',
        'islamkot' => 'Sindh', 'islamkote' => 'Sindh', 'jati' => 'Sindh', 'jhampir' => 'Sindh',
        'jhuddo' => 'Sindh', 'keti-bandar' => 'Sindh', 'khipro' => 'Sindh', 'kotri' => 'Sindh',
        'kunri' => 'Sindh', 'makli' => 'Sindh', 'mehar' => 'Sindh', 'mirpur-mathelo' => 'Sindh',
        'mirpur-sakro' => 'Sindh', 'moro' => 'Sindh', 'nagarparkar' => 'Sindh', 'nasirabad' => 'Sindh',
        'naudero' => 'Sindh', 'naukot' => 'Sindh', 'naushahro-feroze' => 'Sindh', 'pano-aqil' => 'Sindh',
        'ranipur' => 'Sindh', 'rato-dero' => 'Sindh', 'rohri' => 'Sindh', 'sakrand' => 'Sindh',
        'sann' => 'Sindh', 'sehwan' => 'Sindh', 'shahpur-chakar' => 'Sindh', 'shahdadpur' => 'Sindh',
        'shadiwal' => 'Sindh', 'ubauro' => 'Sindh', 'wahipandi' => 'Sindh', 'chuhar-jamali' => 'Sindh',
        'dhabeji' => 'Sindh', 'baghan' => 'Sindh', 'bhiria-city' => 'Sindh', 'daulatpur' => 'Sindh',
        'malir' => 'Sindh', 'malir-cantt-karachi' => 'Sindh', 'port-qasim-karachi' => 'Sindh',
        'khairpur-nathan' => 'Sindh', 'mithi' => 'Sindh', 'tharparkar' => 'Sindh', 'naya-chhor' => 'Sindh',
        'chhor-cantt' => 'Sindh',

        // Punjab
        'lahore' => 'Punjab', 'faisalabad' => 'Punjab', 'rawalpindi' => 'Punjab', 'gujranwala' => 'Punjab',
        'multan' => 'Punjab', 'bahawalpur' => 'Punjab', 'sargodha' => 'Punjab', 'sialkot' => 'Punjab',
        'sheikhupura' => 'Punjab', 'jhang' => 'Punjab', 'rahim-yar-khan' => 'Punjab', 'gujrat' => 'Punjab',
        'kasur' => 'Punjab', 'dera-ghazi-khan' => 'Punjab', 'sahiwal' => 'Punjab', 'okara' => 'Punjab',
        'mandi-bahauddin' => 'Punjab', 'chiniot' => 'Punjab', 'hafizabad' => 'Punjab', 'murree' => 'Punjab',
        'jhelum' => 'Punjab', 'wazirabad' => 'Punjab', 'layyah' => 'Punjab', 'mainwali' => 'Punjab',
        'mianwali' => 'Punjab', 'dina' => 'Punjab', 'gujar-khan' => 'Punjab', 'haroonabad' => 'Punjab',
        'kallar-syedan' => 'Punjab', 'kharian' => 'Punjab', 'kharian-cantt' => 'Punjab', 'lalamusa' => 'Punjab',
        'mandra' => 'Punjab', 'mananwala' => 'Punjab', 'minchnabad' => 'Punjab', 'rahwali-cantt' => 'Punjab',
        'rohtas-fort' => 'Punjab', 'sadqabad' => 'Punjab', 'sangla-hill' => 'Punjab', 'shorkot' => 'Punjab',
        'sohawa' => 'Punjab', 'deona-mandi' => 'Punjab', 'kala-shah-kaku' => 'Punjab', 'mangla' => 'Punjab',
        'shahkot' => 'Punjab', 'labor-colony' => 'Punjab', 'mussa-khel' => 'Punjab',

        // KPK
        'peshawar' => 'KPK', 'abbottabad' => 'KPK', 'mardan' => 'KPK', 'swat' => 'KPK',
        'mingora' => 'KPK', 'kohat' => 'KPK', 'dera-ismail-khan' => 'KPK', 'bannu' => 'KPK',
        'charsadda' => 'KPK', 'swabi' => 'KPK', 'nowshera' => 'KPK', 'mansehra' => 'KPK',
        'haripur' => 'KPK', 'haripur-hazara' => 'KPK', 'karak' => 'KPK', 'hangu' => 'KPK',
        'lakki-marwat' => 'KPK', 'malakand' => 'KPK', 'batkhela' => 'KPK', 'lower-dir' => 'KPK',
        'upper-dir' => 'KPK', 'chitral' => 'KPK', 'khyber' => 'KPK', 'frontier-region-kohat' => 'KPK',
        'digbala' => 'KPK',

        // Balochistan
        'quetta' => 'Balochistan', 'gwadar' => 'Balochistan', 'turbat' => 'Balochistan',
        'hub-chowki' => 'Balochistan', 'lasbila' => 'Balochistan', 'dera-bugti' => 'Balochistan',
        'dera-bughti' => 'Balochistan', 'chaman' => 'Balochistan',

        // Federal & Territories
        'islamabad' => 'Federal',
        'kashmir' => 'Azad Kashmir',
        'pakistan' => 'National',
        'army-dog-center' => 'National',
    ];

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    /**
     * Parse legacy service PHP/HTML file.
     */
    public function parseServiceFile(string $slug, string $rawHtml): ?array
    {
        // 1. Meta Title
        $metaTitle = '';
        if (preg_match('/<title[^>]*>(.*?)<\/title>/si', $rawHtml, $m)) {
            $metaTitle = html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8');
        }

        // 2. Meta Description
        $metaDesc = '';
        if (preg_match('/<meta\s+name=["\']description["\']\s+content=["\'](.*?)["\']/si', $rawHtml, $m)) {
            $metaDesc = html_entity_decode(trim($m[1]), ENT_QUOTES, 'UTF-8');
        }

        // 3. Canonical URL
        $canonicalUrl = '';
        if (preg_match('/<link\s+rel=["\']canonical["\']\s+href=["\'](.*?)["\']/si', $rawHtml, $m)) {
            $canonicalUrl = trim($m[1]);
        }

        // 4. JSON-LD Schema
        $schema = null;
        if (preg_match('/<script\s+type=["\']application\/ld\+json["\']>(.*?)<\/script>/si', $rawHtml, $m)) {
            $decoded = json_decode(trim($m[1]), true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $schema = $decoded;
            }
        }

        // 5. Editorial Title & City Name
        $cityName = ucwords(str_replace('-', ' ', $slug));
        if ($schema && !empty($schema['name'])) {
            $title = ucwords(strtolower(trim($schema['name'])));
        } else {
            $title = "Army Dog Center " . $cityName;
        }

        // 6. Province
        $province = $this->getProvinceForCity($slug, $rawHtml);

        // 7. Phone Numbers
        $phoneNumbers = $this->extractPhoneNumbers($rawHtml, $schema);

        // 8. Body Content (between header and footer includes)
        $content = preg_replace('/^.*?include[^\n]+header\.php[^\n]*\?>/s', '', $rawHtml);
        $content = preg_replace('/<\?php\s+include[^\n]+footer\.php[^\n]*\?>.*$/s', '', $content);
        $content = trim($content);

        // 9. Resolve featured image path
        $imagePath = $this->imageService->resolveServiceImagePath($slug, $rawHtml);

        return [
            'type' => 'service',
            'title' => $title,
            'slug' => $slug,
            'city' => $cityName,
            'province' => $province,
            'phone_numbers' => $phoneNumbers,
            'meta_title' => $metaTitle ?: $title,
            'meta_description' => $metaDesc,
            'canonical_url' => $canonicalUrl ?: "https://services.armydogcenterpk.com/{$slug}",
            'schema_markup' => $schema,
            'content' => $content ?: "<p>Professional Army Dog Center services in {$cityName}. Available 24/7 for emergency search, rescue, tracking, and evidence detection.</p>",
            'status' => 'published',
            'published_at' => now(),
            'image_path' => $imagePath,
        ];
    }

    /**
     * Parse legacy blog article file.
     */
    public function parseBlogFile(string $slug, string $rawContent): ?array
    {
        if (!preg_match('/\$post\s*=\s*(array\s*\(.*?\));/s', $rawContent, $m)) {
            return null;
        }

        try {
            $post = eval('return ' . $m[1] . ';');
        } catch (\Throwable $e) {
            return null;
        }

        if (!is_array($post) || empty($post['title'])) {
            return null;
        }

        $title = trim($post['title']);
        $rawHtml = $post['description'] ?? '';

        // Normalize relative legacy image paths
        $content = $this->normalizeBlogHtml($rawHtml);

        // Excerpt
        $excerpt = trim(strip_tags($content));
        $excerpt = mb_substr($excerpt, 0, 160);

        // Timestamps
        $publishedAt = null;
        if (!empty($post['created_at'])) {
            try {
                $publishedAt = Carbon::parse($post['created_at']);
            } catch (\Throwable $e) {
                $publishedAt = now();
            }
        } else {
            $publishedAt = now();
        }

        $imageFile = $post['image'] ?? null;
        $imagePath = null;
        if ($imageFile) {
            $imagePath = 'uploads/' . ltrim($imageFile, '/');
        }

        return [
            'type' => 'blog',
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'excerpt' => $excerpt,
            'meta_title' => $title,
            'meta_description' => $excerpt,
            'canonical_url' => "https://blog.armydogcenterpk.com/{$slug}",
            'schema_markup' => !empty($post['id']) ? ['legacy_id' => (int) $post['id']] : null,
            'status' => 'published',
            'published_at' => $publishedAt,
            'created_at' => $publishedAt,
            'updated_at' => $publishedAt,
            'image_path' => $imagePath,
        ];
    }

    /**
     * Save or update a service page and link its featured image.
     */
    public function saveServicePage(array $data, bool $linkImage = true): Page
    {
        $imagePath = $data['image_path'] ?? null;
        unset($data['image_path']);

        $page = Page::withTrashed()->where('type', 'service')->where('slug', $data['slug'])->first();

        if ($page) {
            $page->update($data);
        } else {
            $page = Page::create($data);
        }

        if ($linkImage && $imagePath && $page) {
            $this->imageService->linkFeaturedImage($page, $imagePath);
        }

        return $page;
    }

    /**
     * Save or update a blog article and link its featured image.
     */
    public function saveBlogPage(array $data, bool $linkImage = true): Page
    {
        $imagePath = $data['image_path'] ?? null;
        unset($data['image_path']);

        $page = Page::withTrashed()->where('type', 'blog')->where('slug', $data['slug'])->first();

        if ($page) {
            $page->update($data);
        } else {
            $page = Page::create($data);
        }

        if ($linkImage && $imagePath && $page) {
            $this->imageService->linkFeaturedImage($page, $imagePath);
        }

        return $page;
    }

    /**
     * Determine the province for a given city slug.
     */
    public function getProvinceForCity(string $slug, ?string $rawHtml = null): string
    {
        if (isset($this->provinceMap[$slug])) {
            return $this->provinceMap[$slug];
        }

        if ($rawHtml && preg_match('/images\/services\/([a-z]+)\//i', $rawHtml, $m)) {
            $provKey = strtolower($m[1]);
            return match ($provKey) {
                'punjab' => 'Punjab',
                'sindh' => 'Sindh',
                'kpk' => 'KPK',
                'balochistan' => 'Balochistan',
                default => ucfirst($provKey),
            };
        }

        return 'Punjab'; // Fallback
    }

    /**
     * Extract unique phone numbers from HTML and schema.
     */
    public function extractPhoneNumbers(string $rawHtml, ?array $schema = null): array
    {
        $phoneNumbers = [];

        if ($schema && !empty($schema['telephone'])) {
            $phones = (array) $schema['telephone'];
            foreach ($phones as $p) {
                $clean = preg_replace('/[^0-9+]/', '', $p);
                if (!empty($clean)) $phoneNumbers[] = $clean;
            }
        }

        if (preg_match_all('/href=["\']tel:([0-9+]+)["\']/i', $rawHtml, $m)) {
            foreach ($m[1] as $p) {
                $clean = preg_replace('/[^0-9+]/', '', $p);
                if (!empty($clean)) $phoneNumbers[] = $clean;
            }
        }

        return array_values(array_unique($phoneNumbers));
    }

    /**
     * Normalize legacy relative image paths to modern public paths.
     */
    public function normalizeBlogHtml(string $html): string
    {
        $html = preg_replace('/(\.\.\/)+admin\/uploads\//', '/uploads/', $html);
        return str_replace('../admin/uploads/', '/uploads/', $html);
    }
}
