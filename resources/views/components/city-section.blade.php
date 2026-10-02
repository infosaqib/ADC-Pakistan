@props([
    'currentCity' => null,
])

@php
    $servicesByProvince = \App\Models\Page::services()
        ->published()
        ->orderBy('city')
        ->get()
        ->groupBy(function ($item) {
            return $item->province ?: 'Punjab';
        });

    $scheme = config('domains.scheme', 'https');
    $servicesDomain = config('domains.services', 'services.armydogcenterpk.com');
@endphp

<section class="py-12 bg-gray-50 border-t border-b border-gray-200" id="cities-directory">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <span class="text-xs font-bold uppercase tracking-wider text-red-600 bg-red-50 px-3 py-1 rounded-full border border-red-200">
                National Coverage Directory
            </span>
            <h2 class="mt-3 text-2xl sm:text-3xl font-bold text-gray-900">
                Army Dog Center Emergency Services Across Pakistan
            </h2>
            <p class="mt-2 text-sm sm:text-base text-gray-600 max-w-2xl mx-auto">
                24/7 emergency sniffer, tracker, and crime investigation dogs on call in over 130 cities across all provinces.
            </p>
        </div>

        <div class="space-y-6">
            @foreach($servicesByProvince as $province => $cities)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-100 px-5 py-3 border-b border-gray-200 flex items-center justify-between">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                            <span class="w-3 h-3 rounded-full bg-red-600"></span>
                            {{ $province }} Province ({{ $cities->count() }} Cities)
                        </h3>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            24/7 Active Units
                        </span>
                    </div>

                    <div class="p-5">
                        <ul class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-2.5">
                            @foreach($cities as $city)
                                @php
                                    $isCurrent = $currentCity && ($currentCity === $city->slug || $currentCity === $city->city);
                                    $cityUrl = "{$scheme}://{$servicesDomain}/{$city->slug}";
                                @endphp
                                <li>
                                    <a
                                        href="{{ $cityUrl }}"
                                        class="block px-3 py-2 text-xs sm:text-sm rounded-lg transition-colors duration-150 {{ $isCurrent ? 'bg-red-600 text-white font-bold shadow-sm' : 'bg-gray-50 hover:bg-red-50 text-gray-700 hover:text-red-700 border border-gray-100 hover:border-red-200' }}"
                                        title="Army Dog Center emergency services in {{ $city->city ?: $city->title }}"
                                    >
                                        {{ $city->city ?: $city->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-center text-xs text-gray-500">
            Need emergency response in an unlisted area? Call our 24/7 central dispatch:
            <a href="tel:03001690800" class="font-bold text-red-600 hover:underline">0300 1690800</a> /
            <a href="tel:03332874135" class="font-bold text-red-600 hover:underline">0333 2874135</a>
        </div>
    </div>
</section>
