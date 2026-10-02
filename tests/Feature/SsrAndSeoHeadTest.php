<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class SsrAndSeoHeadTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Verify View Source (Ctrl + U) delivers complete HTML body content and JSON-LD schema without JS.
     */
    public function test_service_page_renders_complete_ssr_html_and_localbusiness_schema(): void
    {
        $service = Page::create([
            'type' => 'service',
            'title' => 'Faisalabad Army Dog Center Unit',
            'slug' => 'faisalabad-test-ssr',
            'city' => 'Faisalabad',
            'province' => 'Punjab',
            'phone_numbers' => ['03001690800', '03332874135'],
            'content' => '<p>Emergency canine tracking squad active in Faisalabad industrial and residential sectors.</p>',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $res = $this->get('http://services.armydogcenterpk.com/faisalabad-test-ssr');

        $res->assertStatus(200);

        $html = $res->getContent();

        // 1. Verify complete body content is in raw HTML (SSR without JavaScript)
        $this->assertStringContainsString('Emergency canine tracking squad active in Faisalabad', $html);
        $this->assertStringContainsString('Faisalabad Army Dog Center Unit', $html);

        // 2. Verify SSOT Title and Meta Tags
        $this->assertStringContainsString('<title>Faisalabad Army Dog Center Unit | 24/7 Emergency Service | 03001690800 | 03332874135</title>', $html);
        $this->assertStringContainsString('<meta name="robots" content="index, follow">', $html);
        $this->assertStringContainsString('<link rel="canonical" href="https://services.armydogcenterpk.com/faisalabad-test-ssr">', $html);

        // 3. Verify LocalBusiness JSON-LD Schema
        $this->assertStringContainsString('"@context": "https://schema.org"', $html);
        $this->assertStringContainsString('"@type": "LocalBusiness"', $html);
        $this->assertStringContainsString('"name": "Faisalabad Army Dog Center Unit"', $html);
        $this->assertStringContainsString('"addressLocality": "Faisalabad"', $html);
        $this->assertStringContainsString('"addressRegion": "Punjab"', $html);
        $this->assertStringContainsString('"opens": "00:00"', $html);
        $this->assertStringContainsString('"closes": "23:59"', $html);
    }

    /**
     * Verify Blog single view delivers BlogPosting JSON-LD schema and rich SSR content.
     */
    public function test_blog_post_renders_ssr_html_and_blogposting_schema(): void
    {
        $blog = Page::create([
            'type' => 'blog',
            'title' => 'Scent Discrimination Science in German Shepherds',
            'slug' => 'scent-discrimination-science',
            'content' => '<p>Detailed analysis of olfactory receptor sensitivity in tracker canines.</p>',
            'excerpt' => 'How tracking dogs differentiate suspect trails.',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $res = $this->get('http://blog.armydogcenterpk.com/scent-discrimination-science');

        $res->assertStatus(200);

        $html = $res->getContent();

        // 1. SSR Body
        $this->assertStringContainsString('Detailed analysis of olfactory receptor sensitivity', $html);

        // 2. SSOT SEO Head
        $this->assertStringContainsString('<title>Scent Discrimination Science in German Shepherds | Army Dog Center Pakistan</title>', $html);
        $this->assertStringContainsString('<link rel="canonical" href="https://blog.armydogcenterpk.com/scent-discrimination-science">', $html);

        // 3. BlogPosting JSON-LD Schema
        $this->assertStringContainsString('"@type": "BlogPosting"', $html);
        $this->assertStringContainsString('"headline": "Scent Discrimination Science in German Shepherds"', $html);
        $this->assertStringContainsString('"name": "Army Dog Center Pakistan"', $html);
    }

    /**
     * Verify Paginated blog archive renders self-referential canonicals and prev/next links.
     */
    public function test_paginated_blog_urls_render_self_referential_canonicals_and_link_hints(): void
    {
        // 1. Page 1: Canonical should be clean root without ?page=1
        $resPage1 = $this->get('http://blog.armydogcenterpk.com/');
        $resPage1->assertStatus(200);
        $html1 = $resPage1->getContent();

        $this->assertStringContainsString('<link rel="canonical" href="https://blog.armydogcenterpk.com/">', $html1);
        $this->assertStringNotContainsString('<link rel="canonical" href="https://blog.armydogcenterpk.com/?page=1">', $html1);

        // 2. Page 2: Canonical should be self-referential with ?page=2, and have <link rel="prev"> pointing to Page 1
        $resPage2 = $this->get('http://blog.armydogcenterpk.com/?page=2');
        $resPage2->assertStatus(200);
        $html2 = $resPage2->getContent();

        $this->assertStringContainsString('<link rel="canonical" href="https://blog.armydogcenterpk.com?page=2">', $html2);
        $this->assertStringContainsString('<link rel="prev" href="https://blog.armydogcenterpk.com/">', $html2);
    }

    /**
     * Verify <x-city-section> renders semantic, crawlable HTML links across all provinces.
     */
    public function test_city_section_directory_eliminates_orphan_pages(): void
    {
        $res = $this->get('http://services.armydogcenterpk.com/');
        $res->assertStatus(200);

        $html = $res->getContent();

        // 1. Section Header & Provinces present
        $this->assertStringContainsString('id="cities-directory"', $html);
        $this->assertStringContainsString('National Coverage Directory', $html);
        $this->assertStringContainsString('Province', $html);

        // 2. Valid HTML5 <a> tags linking directly to city pages
        $this->assertMatchesRegularExpression('#<a\s+href="https://services\.armydogcenterpk\.com/[a-z0-9\-]+"#i', $html);
    }
}
