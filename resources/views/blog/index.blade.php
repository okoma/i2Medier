<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>i2Medier Journal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-950 text-stone-100">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(251,191,36,0.22),_transparent_32%),linear-gradient(180deg,_#1c1917_0%,_#0c0a09_100%)]">
        <div class="mx-auto max-w-6xl px-6 py-12">
            <div class="mb-12 flex items-end justify-between gap-6">
                <div>
                    <p class="mb-3 text-sm uppercase tracking-[0.35em] text-amber-300">i2Medier Journal</p>
                    <h1 class="max-w-3xl text-4xl font-semibold tracking-tight text-white sm:text-6xl">Ideas, systems, and growth notes for managed website clients.</h1>
                </div>
                <a href="/admin" class="hidden rounded-full border border-white/15 px-5 py-3 text-sm text-stone-200 transition hover:border-amber-300 hover:text-amber-200 sm:inline-flex">Admin Panel</a>
            </div>

            @if ($featuredPost)
                <article class="mb-12 overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-2xl shadow-black/30">
                    <div class="grid gap-8 p-8 lg:grid-cols-[1.2fr_0.8fr] lg:p-10">
                        <div>
                            <p class="mb-4 text-xs uppercase tracking-[0.3em] text-amber-300">Featured Story</p>
                            <h2 class="mb-4 text-3xl font-semibold text-white sm:text-4xl">{{ $featuredPost->title }}</h2>
                            <p class="mb-6 max-w-2xl text-base leading-7 text-stone-300">{{ $featuredPost->excerpt }}</p>
                            <div class="mb-6 flex flex-wrap gap-3 text-sm text-stone-400">
                                <span>{{ optional($featuredPost->category)->name ?? 'Uncategorized' }}</span>
                                <span>{{ optional($featuredPost->published_at)->format('M d, Y') }}</span>
                                <span>{{ $featuredPost->read_time }} min read</span>
                            </div>
                            <a href="{{ route('blog.show', $featuredPost) }}" class="inline-flex rounded-full bg-amber-300 px-5 py-3 text-sm font-medium text-stone-950 transition hover:bg-amber-200">Read article</a>
                        </div>
                        <div class="rounded-[1.5rem] border border-white/10 bg-stone-900/80 p-6">
                            <p class="mb-4 text-sm text-stone-400">Why this exists</p>
                            <p class="text-sm leading-7 text-stone-300">The blog is part of the i2Medier managed-services platform, giving the agency a clean editorial workflow inside Filament while keeping public publishing fast and lightweight.</p>
                        </div>
                    </div>
                </article>
            @endif

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @forelse ($posts as $post)
                    <article class="rounded-[1.75rem] border border-white/10 bg-white/5 p-6 transition hover:-translate-y-1 hover:border-amber-300/50 hover:bg-white/10">
                        <p class="mb-3 text-xs uppercase tracking-[0.25em] text-amber-300">{{ optional($post->category)->name ?? 'Uncategorized' }}</p>
                        <h2 class="mb-3 text-2xl font-semibold text-white">{{ $post->title }}</h2>
                        <p class="mb-5 text-sm leading-7 text-stone-300">{{ $post->excerpt }}</p>
                        <div class="mb-5 flex flex-wrap gap-3 text-xs text-stone-400">
                            <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                            <span>{{ $post->read_time }} min read</span>
                            <span>{{ optional($post->author)->name ?? 'i2Medier' }}</span>
                        </div>
                        <a href="{{ route('blog.show', $post) }}" class="text-sm font-medium text-amber-200">Open article</a>
                    </article>
                @empty
                    <div class="rounded-[1.75rem] border border-dashed border-white/15 bg-white/5 p-10 text-stone-300 md:col-span-2 xl:col-span-3">
                        No published blog posts yet.
                    </div>
                @endforelse
            </div>

            <div class="mt-10">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</body>
</html>
