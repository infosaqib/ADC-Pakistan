<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RoutingAndRedirectionTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Point 1: Trailing slash root collision guard (Zero infinite loops on '/').
     */
    public function test_root_paths_do_not_redirect_or_loop(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $servicesRoot = $this->get('http://services.armydogcenterpk.com/');
        $servicesRoot->assertStatus(200);

        $blogRoot = $this->get('http://blog.armydogcenterpk.com/');
        $blogRoot->assertStatus(200);
    }

    /**
     * Point 1 & 4: Trailing slashes on non-root paths redirect with HTTP 301 in a single hop.
     */
    public function test_non_root_trailing_slash_redirects_with_301(): void
    {
        Page::create([
            'type' => 'service',
            'title' => 'Lahore Dog Center Test',
            'slug' => 'lahore-test-route',
            'content' => 'Test',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $request = \Illuminate\Http\Request::create('http://services.armydogcenterpk.com/lahore-test-route/', 'GET');
        $response = $this->createTestResponse($this->app->handle($request), $request);

        $response->assertStatus(301);
        $this->assertEquals('/lahore-test-route', parse_url($response->headers->get('Location'), PHP_URL_PATH));
    }

    /**
     * Point 3 & 4: Single-hop 301 redirects for legacy service URLs without chaining.
     */
    public function test_legacy_service_urls_redirect_in_single_hop(): void
    {
        Page::create([
            'type' => 'service',
            'title' => 'Karachi Dog Center Route Test',
            'slug' => 'karachi-route-test',
            'content' => 'Test content',
            'status' => 'published',
            'published_at' => now(),
        ]);

        // 1. Directory index on root domain
        $res = $this->get('http://armydogcenterpk.com/services/index.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://services.armydogcenterpk.com/');

        $res = $this->get('http://armydogcenterpk.com/services/');
        $res->assertStatus(301);
        $res->assertRedirect('https://services.armydogcenterpk.com/');

        // 2. Slashed legacy service page on root domain: /services/{slug}.php/ (Must be 1 hop!)
        $res = $this->get('http://armydogcenterpk.com/services/karachi-route-test.php/');
        $res->assertStatus(301);
        $res->assertRedirect('https://services.armydogcenterpk.com/karachi-route-test');

        // 3. Legacy .php on services subdomain: services.armydogcenterpk.com/{slug}.php
        $res = $this->get('http://services.armydogcenterpk.com/karachi-route-test.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://services.armydogcenterpk.com/karachi-route-test');

        // 4. Historical city page on root domain: armydogcenterpk.com/{slug}.php
        $res = $this->get('http://armydogcenterpk.com/karachi-route-test.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://services.armydogcenterpk.com/karachi-route-test');
    }

    /**
     * Point 3 & 4: Single-hop 301 redirects for legacy blog URLs without chaining.
     */
    public function test_legacy_blog_urls_redirect_in_single_hop(): void
    {
        // 1. Blog directory index
        $res = $this->get('http://armydogcenterpk.com/blog/index.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/');

        $res = $this->get('http://armydogcenterpk.com/blog/');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/');

        // 2. Legacy /pages/{slug}.php/ on blog subdomain (Must be 1 hop!)
        $res = $this->get('http://blog.armydogcenterpk.com/pages/training-tips.php/');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/training-tips');

        // 3. Legacy /blog/pages/{slug}.php on root domain
        $res = $this->get('http://armydogcenterpk.com/blog/pages/training-tips.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/training-tips');
    }

    /**
     * Point 3: Legacy blog query parameters (e.g. blogpost.php?id=12).
     */
    public function test_legacy_blog_query_id_redirects_to_slug(): void
    {
        $blog = Page::create([
            'type' => 'blog',
            'title' => 'Search Dogs Tracking Guide',
            'slug' => 'search-dogs-tracking-guide',
            'content' => 'Guide content',
            'schema_markup' => ['legacy_id' => 99999],
            'status' => 'published',
            'published_at' => now(),
        ]);

        // Legacy query param on root domain
        $res = $this->get('http://armydogcenterpk.com/blogpost.php?id=99999');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/search-dogs-tracking-guide');

        // Unmatched query param falls back to blog root
        $res = $this->get('http://armydogcenterpk.com/blogpost.php?id=987654321');
        $res->assertStatus(301);
        $res->assertRedirect('https://blog.armydogcenterpk.com/');
    }

    /**
     * Point 3: Legacy About and Contact pages redirect to their respective subdomains.
     */
    public function test_legacy_about_and_contact_redirect_to_subdomains(): void
    {
        $res = $this->get('http://armydogcenterpk.com/about/index.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://about.armydogcenterpk.com/');

        $res = $this->get('http://armydogcenterpk.com/contact/index.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://contact.armydogcenterpk.com/');

        $res = $this->get('http://armydogcenterpk.com/index.php');
        $res->assertStatus(301);
        $res->assertRedirect('https://armydogcenterpk.com/');
    }

    /**
     * Point 6: Dedicated dynamic robots.txt per subdomain with HTTP 200 and isolated sitemaps.
     */
    public function test_subdomain_robots_txt_isolation(): void
    {
        // 1. Services Subdomain
        $res = $this->get('http://services.armydogcenterpk.com/robots.txt');
        $res->assertStatus(200);
        $res->assertHeader('Content-Type', 'text/plain; charset=UTF-8');
        $this->assertStringContainsString('Allow: /', $res->getContent());
        $this->assertStringContainsString('Sitemap: https://services.armydogcenterpk.com/sitemap.xml', $res->getContent());

        // 2. Blog Subdomain
        $res = $this->get('http://blog.armydogcenterpk.com/robots.txt');
        $res->assertStatus(200);
        $this->assertStringContainsString('Sitemap: https://blog.armydogcenterpk.com/sitemap.xml', $res->getContent());

        // 3. Root Domain
        $res = $this->get('http://armydogcenterpk.com/robots.txt');
        $res->assertStatus(200);
        $this->assertStringContainsString('Sitemap: https://armydogcenterpk.com/sitemap.xml', $res->getContent());
    }

    /**
     * Point 2: Subdomain route matching and 404 handling.
     */
    public function test_subdomain_routing_content_and_404(): void
    {
        Page::create([
            'type' => 'service',
            'title' => 'Rawalpindi Dog Squad',
            'slug' => 'rawalpindi-dog-squad',
            'content' => 'Service content',
            'status' => 'published',
            'published_at' => now(),
        ]);

        $res = $this->get('http://services.armydogcenterpk.com/rawalpindi-dog-squad');
        $res->assertStatus(200);

        $res = $this->get('http://services.armydogcenterpk.com/non-existent-city-xyz');
        $res->assertStatus(404);
    }
}
