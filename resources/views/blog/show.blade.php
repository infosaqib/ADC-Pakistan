@php
    $relatedPosts = \App\Models\Page::blogs()
        ->published()
        ->where('id', '!=', $post->id)
        ->latest('published_at')
        ->take(4)
        ->get();

    $blogBaseUrl = config('domains.scheme', 'https') . '://' . config('domains.blog', 'blog.armydogcenterpk.com');
@endphp

<x-layouts.app :page="$post">
    <article class="bg-white py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Article Header -->
            <header class="mb-10 text-center">
                <div class="text-xs font-bold uppercase tracking-wider text-red-600 mb-3">
                    Army Dog Center Official Article
                </div>
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="mt-4 flex items-center justify-center gap-3 text-xs sm:text-sm text-gray-500">
                    <span>Published: {{ $post->published_at ? $post->published_at->format('F d, Y') : 'Recent' }}</span>
                    <span>•</span>
                    <span>By Army Dog Center Pakistan</span>
                </div>
            </header>

            <!-- Featured Image with Core Web Vitals Optimization -->
            @if($post->featuredImage)
                <figure class="mb-10 rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                    <x-responsive-image
                        :image="$post->featuredImage"
                        :priority="true"
                        class="w-full h-auto max-h-[550px] object-cover"
                        alt="{{ $post->title }}"
                    />
                </figure>
            @endif

            <!-- Body Content with Prose & Urdu Support -->
            <div class="prose prose-lg max-w-none text-gray-800 leading-relaxed font-sans font-urdu">
                {!! $post->content !!}
            </div>

            <!-- Emergency Consultation Callout Box -->
            <div class="mt-14 p-6 sm:p-8 rounded-2xl bg-gray-900 text-white shadow-md">
                <div class="sm:flex sm:items-center sm:justify-between gap-6">
                    <div>
                        <h3 class="text-xl font-bold text-white mb-2">Need Immediate Emergency Dog Assistance?</h3>
                        <p class="text-sm text-gray-300">Our specialized tracking and sniffer squads are active 24/7 across Pakistan.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 flex gap-3">
                        <a
                            href="tel:03001690800"
                            class="inline-flex items-center px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold text-sm shadow transition"
                        >
                            📞 0300 1690800
                        </a>
                        <a
                            href="tel:03332874135"
                            class="inline-flex items-center px-5 py-3 rounded-xl bg-gray-800 hover:bg-gray-700 text-white font-bold text-sm border border-gray-700 transition"
                        >
                            📞 0333 2874135
                        </a>
                    </div>
                </div>
            </div>

            <!-- Related Articles (Inbound Link Graph & Orphan Elimination) -->
            @if($relatedPosts->isNotEmpty())
                <section class="mt-16 pt-12 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Related Articles &amp; Field Reports</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        @foreach($relatedPosts as $related)
                            <article class="p-4 rounded-xl border border-gray-200 bg-gray-50 hover:bg-white hover:shadow-sm transition">
                                <h4 class="text-base font-bold text-gray-900 hover:text-red-600 transition leading-snug">
                                    <a href="{{ $blogBaseUrl }}/{{ $related->slug }}">
                                        {{ $related->title }}
                                    </a>
                                </h4>
                                <p class="mt-2 text-xs text-gray-600 line-clamp-2">
                                    {{ $related->excerpt ?: strip_tags($related->content) }}
                                </p>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </article>
</x-layouts.app>
