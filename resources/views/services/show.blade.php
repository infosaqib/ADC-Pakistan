<x-layouts.app
    :page="$page"
    :showCitySection="true"
    :currentCity="$page->slug"
>
    <!-- Emergency City Hero Banner -->
    <article class="bg-white">
        <header class="bg-gray-900 text-white py-12 sm:py-16 border-b border-gray-800">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                <nav class="text-xs text-gray-400 mb-4" aria-label="Breadcrumb">
                    <ol class="flex items-center gap-2">
                        <li><a href="{{ config('domains.scheme', 'https') }}://{{ config('domains.services', 'services.armydogcenterpk.com') }}/" class="hover:text-white transition">Services</a></li>
                        <li>/</li>
                        <li><span class="text-gray-300">{{ $page->province ?: 'Pakistan' }}</span></li>
                        <li>/</li>
                        <li class="text-red-400 font-semibold" aria-current="page">{{ $page->city ?: $page->title }}</li>
                    </ol>
                </nav>

                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-red-600/20 text-red-400 border border-red-500/30 uppercase tracking-widest mb-3">
                    <span class="w-2 h-2 rounded-full bg-red-500 animate-ping"></span>
                    24/7 Emergency Canine Unit Ready in {{ $page->city ?: $page->title }}
                </div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white">
                    {{ $page->title }}
                </h1>

                <p class="mt-4 text-base sm:text-lg text-gray-300 leading-relaxed max-w-3xl">
                    Immediate crime scene tracking, robbery investigation, sniffer detection, and search services across {{ $page->city ?: 'all surrounding localities' }}.
                </p>

                <!-- Prominent Emergency Hotline Buttons -->
                <div class="mt-8 flex flex-wrap gap-4 items-center">
                    @php
                        $phones = !empty($page->phone_numbers) ? (array) $page->phone_numbers : ['03001690800', '03332874135'];
                    @endphp
                    @foreach($phones as $phone)
                        <a
                            href="tel:{{ preg_replace('/[^0-9+]/', '', $phone) }}"
                            class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm sm:text-base font-extrabold text-white bg-red-600 hover:bg-red-700 shadow-md transition"
                        >
                            📞 Call Emergency: {{ $phone }}
                        </a>
                    @endforeach
                </div>
            </div>
        </header>

        <!-- Main Body Content (Native SSR, Zero Client-side JS) -->
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <!-- Featured / Hero Image with Core Web Vitals Optimization -->
            @if($page->featuredImage)
                <figure class="mb-10 rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                    <x-responsive-image
                        :image="$page->featuredImage"
                        :priority="true"
                        class="w-full h-auto max-h-[500px] object-cover"
                        alt="Army Dog Center emergency canine team in {{ $page->city ?: $page->title }}"
                    />
                    @if($page->featuredImage->caption)
                        <figcaption class="p-3 text-xs text-center text-gray-500 bg-gray-50 border-t border-gray-100">
                            {{ $page->featuredImage->caption }}
                        </figcaption>
                    @endif
                </figure>
            @endif

            <!-- Editorial / Body Content -->
            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed">
                {!! $page->content !!}
            </div>

            <!-- Emergency Dispatch Alert Box -->
            <div class="mt-12 p-6 sm:p-8 rounded-2xl bg-red-50 border-2 border-red-200 shadow-xs">
                <h3 class="text-xl font-bold text-red-900 mb-2">
                    🚨 Emergency Dispatch Protocol for {{ $page->city ?: 'Your Area' }}
                </h3>
                <p class="text-sm sm:text-base text-red-800 leading-relaxed mb-4">
                    In the event of an incident (burglary, theft, kidnapping, or missing individual), preserve the area immediately. Do not touch or disturb suspect footprints, dropped belongings, or entry points before our tracking dogs arrive.
                </p>
                <div class="flex flex-wrap gap-4 font-mono font-bold text-sm">
                    <span class="text-red-900">Direct Line 1: <a href="tel:03001690800" class="underline">0300 1690800</a></span>
                    <span class="text-red-900">Direct Line 2: <a href="tel:03332874135" class="underline">0333 2874135</a></span>
                </div>
            </div>
        </div>
    </article>
</x-layouts.app>
