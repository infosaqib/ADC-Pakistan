<x-layouts.app
    title="Army Dog Center Pakistan | 24/7 Emergency Search, Sniffer & Tracking Dogs"
    description="Official 24/7 Army Dog Center in Pakistan. Highly trained tracking and sniffer dogs available across Punjab, Sindh, KPK, and Balochistan for emergency search and crime investigation."
    canonical="https://armydogcenterpk.com/"
    :showCitySection="true"
>
    <!-- Hero Section -->
    <section class="relative bg-linear-to-b from-red-950 via-gray-900 to-gray-900 text-white py-16 sm:py-24 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-3xl mx-auto">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-600/30 text-red-400 border border-red-500/30 uppercase tracking-widest">
                    🚨 24/7 Rapid Emergency Response Network
                </span>
                <h1 class="mt-4 text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight leading-tight">
                    Professional Search &amp; Tracking Dogs in Pakistan
                </h1>
                <p class="mt-4 text-base sm:text-xl text-gray-300 leading-relaxed font-normal">
                    Specialized canine units trained for theft investigation, burglary detection, missing persons search, and evidence tracing anywhere in Pakistan.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a
                        href="tel:03001690800"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 text-base font-extrabold text-white bg-red-600 hover:bg-red-700 rounded-xl shadow-lg hover:shadow-red-600/25 transition duration-150"
                    >
                        📞 Call Emergency Hotline: 0300 1690800
                    </a>
                    <a
                        href="{{ config('domains.scheme', 'https') }}://{{ config('domains.services', 'services.armydogcenterpk.com') }}/"
                        class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 text-base font-bold text-gray-200 bg-gray-800/80 hover:bg-gray-800 border border-gray-700 rounded-xl transition duration-150"
                    >
                        📍 View 130+ Cities Directory
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Services Highlights -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Canine Detection &amp; Security Services
                </h2>
                <p class="mt-2 text-sm sm:text-base text-gray-600">
                    Proven scent-tracking methodologies deployed instantly upon notification.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-2xl font-bold mb-4">
                        🔍
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Theft &amp; Burglary Tracking</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Precision tracking dogs identify scent trails from crime scenes, leading directly to stolen goods and suspect routes.
                    </p>
                </div>

                <!-- Service 2 -->
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-2xl font-bold mb-4">
                        🐕
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Missing Persons Search</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Experienced bloodhounds and German Shepherds trace missing children, elderly citizens, and lost individuals in rural or urban terrains.
                    </p>
                </div>

                <!-- Service 3 -->
                <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-2xl font-bold mb-4">
                        🛡️
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">24/7 Emergency Dispatch</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Units ready for deployment across Sindh, Punjab, KPK, Balochistan, and Federal capital territories.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
