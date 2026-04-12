<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->seo_title ?: $post->title }}</title>
    @if($post->seo_description)
        <meta name="description" content="{{ $post->seo_description }}">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-950 text-stone-100">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(251,191,36,0.18),_transparent_30%),linear-gradient(180deg,_#1c1917_0%,_#0c0a09_100%)]">
        <div class="mx-auto max-w-4xl px-6 py-12">
            <a href="{{ route('blog.index') }}" class="mb-8 inline-flex text-sm text-amber-200">Back to Journal</a>

            <article class="rounded-[2rem] border border-white/10 bg-white/5 p-8 lg:p-10">
                <div class="mb-6 flex flex-wrap gap-3 text-xs uppercase tracking-[0.25em] text-amber-300">
                    <span>{{ optional($post->category)->name ?? 'Uncategorized' }}</span>
                    <span>{{ optional($post->published_at)->format('M d, Y') }}</span>
                </div>
                <h1 class="mb-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">{{ $post->title }}</h1>
                <p class="mb-8 text-base leading-8 text-stone-300">{{ $post->excerpt }}</p>
                <div class="mb-10 flex flex-wrap gap-4 text-sm text-stone-400">
                    <span>By {{ optional($post->author)->name ?? 'i2Medier' }}</span>
                    <span>{{ $post->read_time }} min read</span>
                    <span>{{ number_format($post->view_count) }} views</span>
                </div>
                <div class="prose prose-invert max-w-none prose-headings:text-white prose-p:text-stone-200 prose-a:text-amber-200">
                    {!! $post->body !!}
                </div>
            </article>

            @if ($relatedPosts->isNotEmpty())
                <section class="mt-12">
                    <h2 class="mb-6 text-2xl font-semibold text-white">Related Posts</h2>
                    <div class="grid gap-6 md:grid-cols-3">
                        @foreach ($relatedPosts as $relatedPost)
                            <article class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5">
                                <p class="mb-2 text-xs uppercase tracking-[0.25em] text-amber-300">{{ optional($relatedPost->published_at)->format('M d, Y') }}</p>
                                <h3 class="mb-3 text-lg font-semibold text-white">{{ $relatedPost->title }}</h3>
                                <p class="mb-4 text-sm leading-7 text-stone-300">{{ $relatedPost->excerpt }}</p>
                                <a href="{{ route('blog.show', $relatedPost) }}" class="text-sm text-amber-200">Read more</a>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endif
        </div>
    </div>
</body>
</html>
