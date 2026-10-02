<x-layouts.app
    title="Army Dog Center Blog | Canine Training, Case Studies & Security Insights"
    description="Latest articles, search dog training tips, crime investigation case studies, and security updates from Army Dog Center Pakistan."
    :paginator="$posts"
    :showCitySection="false"
>
    <!-- Blog Header Banner -->
    <section class="bg-gray-900 text-white py-12 sm:py-16 border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-xs font-bold uppercase tracking-widest text-red-500 bg-red-950/60 px-3 py-1 rounded-full border border-red-800/60 mb-3">
                Canine Knowledge &amp; Field Reports
            </span>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight">
                Army Dog Center Pakistan Blog
            </h1>
            <p class="mt-3 text-sm sm:text-lg text-gray-400 max-w-2xl mx-auto">
                Explore real investigation case studies, scent-tracking science, and emergency dog dispatch reports.
            </p>
        </div>
    </section>

    <!-- Articles Grid (100% Native SSR) -->
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-md transition">
                        @if($post->featuredImage)
                            <a href="{{ config('domains.scheme', 'https') }}://{{ config('domains.blog', 'blog.armydogcenterpk.com') }}/{{ $post->slug }}" class="block aspect-video overflow-hidden bg-gray-100">
                                <x-responsive-image
                                    :image="$post->featuredImage"
                                    class="w-full h-full object-cover group-hover:scale-105 transition duration-300"
                                    alt="{{ $post->title }}"
                                />
                            </a>
                        @endif

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="text-xs text-gray-500 mb-2 flex items-center gap-2">
                                    <span>📅 {{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}</span>
                                    <span>•</span>
                                    <span>Army Dog Center Dispatch</span>
                                </div>

                                <h2 class="text-lg font-bold text-gray-900 hover:text-red-600 transition leading-snug">
                                    <a href="{{ config('domains.scheme', 'https') }}://{{ config('domains.blog', 'blog.armydogcenterpk.com') }}/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <p class="mt-3 text-sm text-gray-600 line-clamp-3 leading-relaxed">
                                    {{ $post->excerpt ?: strip_tags($post->content) }}
                                </p>
                            </div>

                            <div class="mt-5 pt-4 border-t border-gray-100">
                                <a
                                    href="{{ config('domains.scheme', 'https') }}://{{ config('domains.blog', 'blog.armydogcenterpk.com') }}/{{ $post->slug }}"
                                    class="inline-flex items-center text-xs font-bold text-red-600 hover:text-red-700 transition"
                                >
                                    Read Article &rarr;
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination Links (Self-referential, SEO Friendly) -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</x-layouts.app>
