@props([
    'title' => null,
    'description' => null,
    'canonical' => null,
    'image' => null,
    'type' => 'website',
    'page' => null,
    'paginator' => null,
    'schema' => null,
])

@php
    $scheme = config('domains.scheme', 'https');
    $rootDomain = config('domains.root', 'armydogcenterpk.com');
    $servicesDomain = config('domains.services', 'services.armydogcenterpk.com');
    $blogDomain = config('domains.blog', 'blog.armydogcenterpk.com');
    $defaultImage = asset('images/logo-armydog.webp');

    // 1. Resolve Title
    if (!empty($title)) {
        $metaTitle = $title;
    } elseif ($page) {
        if ($page->type === 'service') {
            $phones = !empty($page->phone_numbers) ? implode(' | ', (array) $page->phone_numbers) : '03001690800 | 03332874135';
            $metaTitle = "{$page->title} | 24/7 Emergency Service | {$phones}";
        } else {
            $metaTitle = "{$page->title} | Army Dog Center Pakistan";
        }
    } else {
        $metaTitle = 'Army Dog Center Pakistan | 24/7 Emergency Search & Tracking Dogs';
    }

    // 2. Resolve Meta Description (< 160 chars)
    if (!empty($description)) {
        $metaDescription = $description;
    } elseif ($page && !empty($page->meta_description)) {
        $metaDescription = $page->meta_description;
    } elseif ($page && !empty($page->excerpt)) {
        $metaDescription = $page->excerpt;
    } else {
        $metaDescription = 'Army Dog Center Pakistan provides 24/7 emergency tracker dogs, sniffer dogs, search and rescue services across all cities in Sindh, Punjab, KPK, and Balochistan.';
    }
    $metaDescription = mb_substr(strip_tags($metaDescription), 0, 160);

    // 3. Resolve Self-Referential Canonical URL (Absolute HTTPS)
    if (!empty($canonical)) {
        $canonicalUrl = $canonical;
    } elseif ($page) {
        if ($page->type === 'service') {
            $canonicalUrl = $page->canonical_url ?: "{$scheme}://{$servicesDomain}/{$page->slug}";
        } elseif ($page->type === 'blog') {
            $canonicalUrl = $page->canonical_url ?: "{$scheme}://{$blogDomain}/{$page->slug}";
        } else {
            $canonicalUrl = $page->canonical_url ?: url()->current();
        }
    } elseif ($paginator) {
        $currentPage = $paginator->currentPage();
        $baseUrl = "{$scheme}://{$blogDomain}";
        $canonicalUrl = $currentPage > 1 ? "{$baseUrl}?page={$currentPage}" : "{$baseUrl}/";
    } else {
        $canonicalUrl = url()->current();
    }

    // 4. Resolve Image
    if (!empty($image)) {
        $ogImage = $image;
    } elseif ($page && $page->featuredImage) {
        $ogImage = $page->featuredImage->full_url;
    } else {
        $ogImage = $defaultImage;
    }

    // 5. Pagination Link Hints (Prev / Next)
    $prevUrl = null;
    $nextUrl = null;
    if ($paginator) {
        $baseUrl = "{$scheme}://{$blogDomain}";
        if ($paginator->currentPage() > 1) {
            $prevPage = $paginator->currentPage() - 1;
            $prevUrl = $prevPage > 1 ? "{$baseUrl}?page={$prevPage}" : "{$baseUrl}/";
        }
        if ($paginator->hasMorePages()) {
            $nextPage = $paginator->currentPage() + 1;
            $nextUrl = "{$baseUrl}?page={$nextPage}";
        }
    }

    // 6. JSON-LD Structured Data Schema
    $jsonLd = [];
    if (!empty($schema)) {
        $jsonLd = $schema;
    } elseif ($page && $page->type === 'service') {
        $phoneList = !empty($page->phone_numbers) ? (array) $page->phone_numbers : ['03001690800', '03332874135'];
        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => $page->title,
            'description' => $metaDescription,
            'url' => $canonicalUrl,
            'image' => $ogImage,
            'telephone' => $phoneList,
            'areaServed' => [
                '@type' => 'City',
                'name' => $page->city ?: 'Pakistan',
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => $page->city ?: 'Pakistan',
                'addressRegion' => $page->province ?: 'Pakistan',
                'addressCountry' => 'PK',
            ],
            'openingHoursSpecification' => [
                '@type' => 'OpeningHoursSpecification',
                'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                'opens' => '00:00',
                'closes' => '23:59',
            ],
            'priceRange' => '$$',
        ];
    } elseif ($page && $page->type === 'blog') {
        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $page->title,
            'description' => $metaDescription,
            'url' => $canonicalUrl,
            'image' => $ogImage,
            'datePublished' => $page->published_at ? $page->published_at->toIso8601String() : now()->toIso8601String(),
            'dateModified' => $page->updated_at ? $page->updated_at->toIso8601String() : now()->toIso8601String(),
            'author' => [
                '@type' => 'Organization',
                'name' => 'Army Dog Center Pakistan',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Army Dog Center Pakistan',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => $defaultImage,
                ],
            ],
        ];
    } else {
        $jsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Army Dog Center Pakistan',
            'url' => "{$scheme}://{$rootDomain}/",
            'description' => $metaDescription,
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => "{$scheme}://{$rootDomain}/search?q={search_term_string}",
                'query-input' => 'required name=search_term_string',
            ],
        ];
    }
@endphp

<!-- Basic Meta Tags -->
<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ $canonicalUrl }}">

@if($prevUrl)
<link rel="prev" href="{{ $prevUrl }}">
@endif
@if($nextUrl)
<link rel="next" href="{{ $nextUrl }}">
@endif

<!-- OpenGraph Meta Tags -->
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="{{ $type === 'article' || ($page && $page->type === 'blog') ? 'article' : 'website' }}">
<meta property="og:title" content="{{ $metaTitle }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:site_name" content="Army Dog Center Pakistan">
<meta property="og:image" content="{{ $ogImage }}">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $metaTitle }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $ogImage }}">

<!-- JSON-LD Structured Data Schema -->
@if(!empty($jsonLd))
<script type="application/ld+json">
{!! json_encode($jsonLd, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endif
