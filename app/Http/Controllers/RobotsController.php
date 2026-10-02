<?php

namespace App\Http\Controllers;

use App\Services\DomainRoutingService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RobotsController extends Controller
{
    protected DomainRoutingService $routingService;

    public function __construct(DomainRoutingService $routingService)
    {
        $this->routingService = $routingService;
    }

    /**
     * Generate dynamic, subdomain-isolated robots.txt.
     */
    public function __invoke(Request $request): Response
    {
        $host = strtolower($request->getHost());
        $scheme = config('domains.scheme', 'https');

        $servicesDomain = strtolower(config('domains.services', 'services.armydogcenterpk.com'));
        $blogDomain = strtolower(config('domains.blog', 'blog.armydogcenterpk.com'));
        $aboutDomain = strtolower(config('domains.about', 'about.armydogcenterpk.com'));
        $contactDomain = strtolower(config('domains.contact', 'contact.armydogcenterpk.com'));
        $rootDomain = strtolower(config('domains.root', 'armydogcenterpk.com'));

        $sitemapUrl = match ($host) {
            $servicesDomain => "{$scheme}://{$servicesDomain}/sitemap.xml",
            $blogDomain => "{$scheme}://{$blogDomain}/sitemap.xml",
            $aboutDomain => "{$scheme}://{$aboutDomain}/sitemap.xml",
            $contactDomain => "{$scheme}://{$contactDomain}/sitemap.xml",
            default => "{$scheme}://{$rootDomain}/sitemap.xml",
        };

        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /login\n\n";
        $content .= "Sitemap: {$sitemapUrl}\n";

        return response($content, 200, [
            'Content-Type' => 'text/plain',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }
}
