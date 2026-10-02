<?php

namespace App\Services;

use App\Models\Page;
use Illuminate\Http\Request;

class DomainRoutingService
{
    /**
     * Build absolute URL for the root domain.
     */
    public function rootUrl(string $path = ''): string
    {
        $domain = config('domains.root', 'armydogcenterpk.com');
        $scheme = config('domains.scheme', 'https');
        $cleanPath = '/' . ltrim($path, '/');
        $cleanPath = $cleanPath === '/' ? '/' : rtrim($cleanPath, '/');

        return "{$scheme}://{$domain}" . ($cleanPath === '/' ? '/' : $cleanPath);
    }

    /**
     * Build absolute URL for the services subdomain.
     */
    public function servicesUrl(string $path = ''): string
    {
        $domain = config('domains.services', 'services.armydogcenterpk.com');
        $scheme = config('domains.scheme', 'https');
        $cleanPath = '/' . ltrim($path, '/');
        $cleanPath = $cleanPath === '/' ? '/' : rtrim($cleanPath, '/');

        return "{$scheme}://{$domain}" . ($cleanPath === '/' ? '/' : $cleanPath);
    }

    /**
     * Build absolute URL for the blog subdomain.
     */
    public function blogUrl(string $path = ''): string
    {
        $domain = config('domains.blog', 'blog.armydogcenterpk.com');
        $scheme = config('domains.scheme', 'https');
        $cleanPath = '/' . ltrim($path, '/');
        $cleanPath = $cleanPath === '/' ? '/' : rtrim($cleanPath, '/');

        return "{$scheme}://{$domain}" . ($cleanPath === '/' ? '/' : $cleanPath);
    }

    /**
     * Build absolute URL for the about subdomain.
     */
    public function aboutUrl(string $path = ''): string
    {
        $domain = config('domains.about', 'about.armydogcenterpk.com');
        $scheme = config('domains.scheme', 'https');
        $cleanPath = '/' . ltrim($path, '/');
        $cleanPath = $cleanPath === '/' ? '/' : rtrim($cleanPath, '/');

        return "{$scheme}://{$domain}" . ($cleanPath === '/' ? '/' : $cleanPath);
    }

    /**
     * Build absolute URL for the contact subdomain.
     */
    public function contactUrl(string $path = ''): string
    {
        $domain = config('domains.contact', 'contact.armydogcenterpk.com');
        $scheme = config('domains.scheme', 'https');
        $cleanPath = '/' . ltrim($path, '/');
        $cleanPath = $cleanPath === '/' ? '/' : rtrim($cleanPath, '/');

        return "{$scheme}://{$domain}" . ($cleanPath === '/' ? '/' : $cleanPath);
    }

    /**
     * Resolve legacy URL to its final canonical destination (Single 301 Hop).
     * Returns null if no legacy redirection applies.
     */
    public function resolveLegacyDestination(Request $request): ?string
    {
        $host = strtolower($request->getHost());
        $path = $request->getPathInfo();
        $trimmedPath = rtrim($path, '/');

        $rootDomain = strtolower(config('domains.root', 'armydogcenterpk.com'));
        $servicesDomain = strtolower(config('domains.services', 'services.armydogcenterpk.com'));
        $blogDomain = strtolower(config('domains.blog', 'blog.armydogcenterpk.com'));

        $isRootHost = ($host === $rootDomain || $host === 'localhost' || $host === '127.0.0.1');
        $isServicesHost = ($host === $servicesDomain);
        $isBlogHost = ($host === $blogDomain);

        // 1. Root index.php (e.g. armydogcenterpk.com/index.php) -> armydogcenterpk.com/
        if ($isRootHost && ($trimmedPath === '/index.php' || $trimmedPath === '/index')) {
            return $this->rootUrl('/');
        }

        // 2. Legacy About patterns on root domain
        if ($isRootHost && in_array($trimmedPath, ['/about', '/about/index.php', '/about.php', '/about/index'], true)) {
            return $this->aboutUrl('/');
        }

        // 3. Legacy Contact patterns on root domain
        if ($isRootHost && in_array($trimmedPath, ['/contact', '/contact/index.php', '/contact.php', '/contact/index'], true)) {
            return $this->contactUrl('/');
        }

        // 4. Legacy Service Directory Index patterns
        if ($isRootHost && in_array($trimmedPath, ['/services', '/services/index.php', '/services.php', '/services/index'], true)) {
            return $this->servicesUrl('/');
        }
        if ($isServicesHost && in_array($trimmedPath, ['/index.php', '/index'], true)) {
            return $this->servicesUrl('/');
        }

        // 5. Legacy Service City Page patterns:
        // Pattern A: /services/{slug}.php or /services/{slug} on root domain
        if ($isRootHost && preg_match('#^/services/([^/]+?)(?:\.php)?$#i', $trimmedPath, $m)) {
            $slug = $m[1];
            if ($slug !== 'index') {
                return $this->servicesUrl('/' . $slug);
            }
        }

        // Pattern B: /{slug}.php on services subdomain (e.g. services.armydogcenterpk.com/karachi.php)
        if ($isServicesHost && preg_match('#^/([^/]+?)\.php$#i', $trimmedPath, $m)) {
            $slug = $m[1];
            if ($slug !== 'index') {
                return $this->servicesUrl('/' . $slug);
            }
        }

        // Pattern C: /{slug}.php on root domain (e.g. armydogcenterpk.com/karachi.php)
        if ($isRootHost && preg_match('#^/([^/]+?)\.php$#i', $trimmedPath, $m)) {
            $slug = $m[1];
            if ($slug !== 'index' && $slug !== 'about' && $slug !== 'contact' && $slug !== 'blog') {
                // If it's a known service slug, redirect to services subdomain
                if (Page::services()->where('slug', $slug)->exists()) {
                    return $this->servicesUrl('/' . $slug);
                }
            }
        }

        // 6. Legacy Blog Directory Index patterns
        if ($isRootHost && in_array($trimmedPath, ['/blog', '/blog/index.php', '/blog.php', '/blog/index'], true)) {
            return $this->blogUrl('/');
        }
        if ($isBlogHost && in_array($trimmedPath, ['/index.php', '/index'], true)) {
            return $this->blogUrl('/');
        }

        // 7. Legacy Blog Query Parameters: blogpost.php?id={id}, blog.php?id={id}, /blog/blogpost.php?id={id}
        if (preg_match('#(?:blogpost|blog)\.php#i', $path) || ($isBlogHost && $request->has('id'))) {
            $id = $request->query('id');
            if ($id) {
                $post = Page::blogs()->where('schema_markup->legacy_id', (int) $id)->first()
                     ?? Page::blogs()->find($id);

                if ($post) {
                    return $this->blogUrl('/' . $post->slug);
                }
            }
            return $this->blogUrl('/');
        }

        // 8. Legacy Blog Post Page patterns:
        // Pattern A: /blog/pages/{slug}.php or /blog/pages/{slug} or /blog/{slug}.php on root domain
        if ($isRootHost && preg_match('#^/blog/(?:pages/)?([^/]+?)(?:\.php)?$#i', $trimmedPath, $m)) {
            $slug = $m[1];
            if ($slug !== 'index' && $slug !== 'blogpost') {
                return $this->blogUrl('/' . $slug);
            }
        }

        // Pattern B: /pages/{slug}.php or /pages/{slug} or /{slug}.php on blog subdomain
        if ($isBlogHost && preg_match('#^(?:/pages)?/([^/]+?)(?:\.php)?$#i', $trimmedPath, $m)) {
            $slug = $m[1];
            if ($slug !== 'index' && $slug !== 'blogpost') {
                // Only redirect if it had /pages/ or .php to avoid looping on modern clean /slug
                if (str_starts_with($trimmedPath, '/pages/') || str_ends_with($trimmedPath, '.php')) {
                    return $this->blogUrl('/' . $slug);
                }
            }
        }

        return null;
    }
}
