@props([
    'title' => null,
    'description' => null,
    'canonical' => null,
    'image' => null,
    'type' => 'website',
    'page' => null,
    'paginator' => null,
    'schema' => null,
    'showCitySection' => false,
    'currentCity' => null,
])

@php
    $scheme = config('domains.scheme', 'https');
    $rootDomain = config('domains.root', 'armydogcenterpk.com');
    $servicesDomain = config('domains.services', 'services.armydogcenterpk.com');
    $blogDomain = config('domains.blog', 'blog.armydogcenterpk.com');
    $aboutDomain = config('domains.about', 'about.armydogcenterpk.com');
    $contactDomain = config('domains.contact', 'contact.armydogcenterpk.com');

    $homeUrl = "{$scheme}://{$rootDomain}/";
    $servicesUrl = "{$scheme}://{$servicesDomain}/";
    $blogUrl = "{$scheme}://{$blogDomain}/";
    $aboutUrl = "{$scheme}://{$aboutDomain}/";
    $contactUrl = "{$scheme}://{$contactDomain}/";
@endphp

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SSOT Centralized SEO Head -->
    <x-seo-head
        :title="$title"
        :description="$description"
        :canonical="$canonical"
        :image="$image"
        :type="$type"
        :page="$page"
        :paginator="$paginator"
        :schema="$schema"
    />

    <!-- Favicons -->
    <link rel="icon" href="{{ asset('images/logo-armydog.webp') }}" type="image/webp">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-armydog.webp') }}">

    <!-- Vite Assets (TailwindCSS v4 & Typography) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans text-gray-900 antialiased selection:bg-red-500 selection:text-white">

    <!-- 24/7 Top Emergency Hotline Bar -->
    <aside class="bg-red-700 text-white text-xs sm:text-sm py-2 px-4 shadow-sm" aria-label="Emergency Hotline">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2 font-medium">
                <span class="inline-block w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse" aria-hidden="true"></span>
                <span>24/7 National Emergency Dog Response Network across Pakistan</span>
            </div>
            <div class="flex items-center gap-4 font-bold">
                <span>Helplines:</span>
                <a href="tel:03001690800" class="hover:underline flex items-center gap-1">📞 0300 1690800</a>
                <span class="opacity-60" aria-hidden="true">|</span>
                <a href="tel:03332874135" class="hover:underline flex items-center gap-1">📞 0333 2874135</a>
            </div>
        </div>
    </aside>

    <!-- Main Navigation Header (Zero JS, Fully Semantic) -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                <!-- Brand Identity -->
                <div class="flex items-center gap-3">
                    <a href="{{ $homeUrl }}" class="flex items-center gap-3 group">
                        <img
                            src="{{ asset('images/logo-armydog.webp') }}"
                            alt="Army Dog Center Pakistan Emblem"
                            width="50"
                            height="50"
                            class="h-10 w-10 sm:h-12 sm:w-12 object-contain"
                            fetchpriority="high"
                        />
                        <div class="flex flex-col">
                            <span class="text-base sm:text-xl font-extrabold tracking-tight text-gray-900 group-hover:text-red-700 transition">
                                ARMY DOG CENTER
                            </span>
                            <span class="text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-red-600">
                                Pakistan Emergency Service
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Primary Nav Links -->
                <nav class="flex items-center gap-3 sm:gap-6 text-sm font-semibold text-gray-700" aria-label="Main Navigation">
                    <a href="{{ $homeUrl }}" class="hover:text-red-600 transition">Home</a>
                    <a href="{{ $servicesUrl }}" class="hover:text-red-600 transition">Services Directory</a>
                    <a href="{{ $blogUrl }}" class="hover:text-red-600 transition">Blog & Insights</a>
                    <a href="{{ $aboutUrl }}" class="hover:text-red-600 transition hidden sm:inline-block">About Us</a>
                    <a href="{{ $contactUrl }}" class="hover:text-red-600 transition hidden sm:inline-block">Contact</a>
                    <a
                        href="tel:03001690800"
                        class="ml-2 inline-flex items-center justify-center px-4 py-2 text-xs sm:text-sm font-bold text-white bg-red-600 rounded-lg hover:bg-red-700 shadow-sm transition"
                    >
                        Emergency Call
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content Slot (100% SSR Rendered) -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Optional Orphan Prevention Directory Accordion -->
    @if($showCitySection)
        <x-city-section :currentCity="$currentCity" />
    @endif

    <!-- Main Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <!-- Col 1: About -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/logo-armydog.webp') }}" alt="ADC Logo" width="36" height="36" class="h-9 w-9 object-contain" loading="lazy">
                        <span class="text-lg font-bold text-white tracking-wide">Army Dog Center</span>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-400 leading-relaxed">
                        Dedicated professional tracker, sniffer, and crime detection dogs. Available 24/7/365 across all districts of Pakistan for emergency investigation and security services.
                    </p>
                </div>

                <!-- Col 2: Subdomains & Hubs -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-gray-800 pb-2">
                        Site Directory
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm">
                        <li><a href="{{ $homeUrl }}" class="hover:text-red-400 transition">Main Portal</a></li>
                        <li><a href="{{ $servicesUrl }}" class="hover:text-red-400 transition">All Cities Directory (130+)</a></li>
                        <li><a href="{{ $blogUrl }}" class="hover:text-red-400 transition">Blog & Training Guides</a></li>
                        <li><a href="{{ $aboutUrl }}" class="hover:text-red-400 transition">About Our Mission</a></li>
                        <li><a href="{{ $contactUrl }}" class="hover:text-red-400 transition">Contact & Dispatch</a></li>
                    </ul>
                </div>

                <!-- Col 3: Key Regional Hubs -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-gray-800 pb-2">
                        Major Centers
                    </h4>
                    <ul class="space-y-2 text-xs sm:text-sm">
                        <li><a href="{{ $servicesUrl }}karachi" class="hover:text-red-400 transition">Karachi Dog Center</a></li>
                        <li><a href="{{ $servicesUrl }}lahore" class="hover:text-red-400 transition">Lahore Dog Center</a></li>
                        <li><a href="{{ $servicesUrl }}islamabad" class="hover:text-red-400 transition">Islamabad & Rawalpindi</a></li>
                        <li><a href="{{ $servicesUrl }}peshawar" class="hover:text-red-400 transition">Peshawar Dog Squad</a></li>
                        <li><a href="{{ $servicesUrl }}quetta" class="hover:text-red-400 transition">Quetta & Balochistan</a></li>
                    </ul>
                </div>

                <!-- Col 4: Emergency Hotlines -->
                <div>
                    <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-4 border-b border-gray-800 pb-2">
                        24/7 Emergency Hotlines
                    </h4>
                    <p class="text-xs text-gray-400 mb-3">
                        Call immediately in case of theft, burglary, missing persons, or criminal tracking:
                    </p>
                    <div class="space-y-2 font-mono">
                        <a href="tel:03001690800" class="block bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded text-red-400 font-bold text-sm text-center border border-gray-700 transition">
                            📞 0300 1690800
                        </a>
                        <a href="tel:03332874135" class="block bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded text-red-400 font-bold text-sm text-center border border-gray-700 transition">
                            📞 0333 2874135
                        </a>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-800 text-center text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Army Dog Center Pakistan. All rights reserved. 100% Server-Side Rendered for rapid mobile accessibility.</p>
            </div>
        </div>
    </footer>

</body>
</html>
