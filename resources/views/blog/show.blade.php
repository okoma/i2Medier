@extends('public.layouts.app')

@section('title', ($post->seo_title ?: $post->title) . ' | i2Medier')
@push('page_css')
    @vite('resources/css/public/pages/blog-single.css')
@endpush

@push('meta')
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post->seo_title ?: $post->title,
    'description' => $post->seo_description ?: $post->excerpt,
    'author' => [
        '@type' => 'Person',
        'name' => optional($post->author)->name ?: 'i2Medier Editorial Team',
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'i2Medier',
        'url' => url('/'),
    ],
    'datePublished' => optional($post->published_at)?->toDateString(),
    'dateModified' => optional($post->updated_at)?->toDateString(),
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => route('blog.show', $post->route_params),
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
<script type="application/ld+json">{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => route('site.home'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => route('blog.index'),
        ],
        [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $post->ui['label'],
            'item' => route('blog.show', $post->route_params),
        ],
        [
            '@type' => 'ListItem',
            'position' => 4,
            'name' => $post->title,
            'item' => route('blog.show', $post->route_params),
        ],
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>
@endpush

@section('content')
@if ($isPreview ?? false)
<div class="preview-banner" style="position:sticky;top:0;z-index:9999;background:#b45309;color:#fff;padding:.75rem 1.5rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;font-size:.875rem;font-weight:500;box-shadow:0 2px 8px rgba(0,0,0,.35);">
    <span>⚠ Draft Preview — this post is not yet published. Only you can see this page.</span>
    <a href="{{ url()->previous() }}" style="color:#fef9c3;text-decoration:underline;white-space:nowrap;">← Back to editor</a>
</div>
@endif
<div class="blog-single-page">
    <div class="reading-progress" id="readingProgress" aria-hidden="true"></div>
    <div class="share-rail" id="shareRail" role="complementary" aria-label="Share this article">
        <div class="sr-count" id="rail-count">{{ (int) ($post->share_count ?? 0) }}</div>
        <div class="sr-count-label">Shares</div>
        <div class="sr-rule"></div>
        <div class="sr-item">
            <button class="sr-btn" type="button" data-share-rail="twitter" data-count="0" aria-label="Share on X">
                <svg viewBox="0 0 24 24" style="width:14px;height:14px;fill:currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                <span class="sr-tooltip">Post on X</span>
            </button>
        </div>
        <div class="sr-item">
            <button class="sr-btn" type="button" data-share-rail="linkedin" data-count="0" aria-label="Share on LinkedIn">
                <svg viewBox="0 0 24 24" style="width:14px;height:14px;fill:currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                <span class="sr-tooltip">LinkedIn</span>
            </button>
        </div>
        <div class="sr-item">
            <button class="sr-btn" type="button" data-share-rail="whatsapp" data-count="0" aria-label="Share on WhatsApp">
                <svg viewBox="0 0 24 24" style="width:14px;height:14px;fill:currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                <span class="sr-tooltip">WhatsApp</span>
            </button>
        </div>
        <div class="sr-item">
            <button class="sr-btn" id="rail-copy-btn" type="button" aria-label="Copy link">
                <svg viewBox="0 0 24 24" style="width:14px;height:14px;fill:currentColor"><path d="M16 1H4c-1.1 0-2 .9-2 2v14h2V3h12V1zm3 4H8c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/></svg>
                <span class="sr-tooltip" id="rail-tooltip">Copy link</span>
            </button>
        </div>
    </div>

    <div class="blog-hero">
        <div class="blog-hero-glow" aria-hidden="true"></div>
        <div class="blog-hero-grid" aria-hidden="true"></div>
        <div class="blog-hero-inner">
            <nav class="bs-breadcrumb" aria-label="Breadcrumb">
                <a href="{{ route('site.home') }}">Home</a><span class="breadcrumb-sep">›</span>
                <a href="{{ route('blog.index') }}">Blog</a><span class="breadcrumb-sep">›</span>
                @if ($post->category)<a href="{{ route('blog.category', $post->category) }}">{{ $post->ui['label'] }}</a><span class="breadcrumb-sep">›</span>@endif
                <span aria-current="page">{{ $post->title }}</span>
            </nav>
            <div class="post-meta-top">
                <a href="{{ $post->category ? route('blog.category', $post->category) : route('blog.index') }}" class="post-category">{{ $post->ui['label'] }}</a>
                <span class="post-dot" aria-hidden="true"></span>
                <span class="post-date">{{ $post->formatted_date }}</span>
                <span class="post-dot" aria-hidden="true"></span>
                <span class="post-read-time">@include('blog.partials.archive-icon', ['name' => 'clock', 'class' => 'blog-inline-icon']) {{ $post->read_time }} min read</span>
            </div>

            <h1 class="post-title">{{ $post->title }}</h1>

            <p class="post-excerpt">{{ $post->excerpt }}</p>

            <div class="post-author-row">
                <div class="post-author">
                    <div class="post-author-avatar" aria-hidden="true">i2</div>
                    <div>
                        <div class="post-author-name">{{ optional($post->author)->name ?: 'i2Medier Editorial Team' }}</div>
                        <div class="post-author-role">{{ $post->ui['label'] }} · i2Medier</div>
                    </div>
                </div>
                <div class="post-share" aria-label="Share this article">
                    <span class="share-label">Share this article</span>
                    <div class="hero-share-actions">
                        <a href="https://x.com/intent/tweet?url={{ urlencode(route('blog.show', $post->route_params)) }}&text={{ urlencode($post->title) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on X"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->route_params)) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on Facebook"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->route_params)) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
                        <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->route_params)) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.52 3.48A11.86 11.86 0 0012.08 0C5.52 0 .18 5.34.18 11.9c0 2.1.55 4.15 1.6 5.97L0 24l6.33-1.66a11.9 11.9 0 005.75 1.47h.01c6.56 0 11.9-5.34 11.9-11.9 0-3.18-1.24-6.17-3.47-8.43zm-8.43 18.32h-.01a9.9 9.9 0 01-5.05-1.38l-.36-.21-3.76.99 1-3.67-.24-.38a9.88 9.88 0 01-1.51-5.25c0-5.45 4.43-9.88 9.89-9.88 2.64 0 5.12 1.03 6.99 2.89a9.84 9.84 0 012.9 7c0 5.45-4.44 9.89-9.9 9.89zm5.42-7.4c-.3-.15-1.76-.87-2.04-.96-.27-.1-.47-.15-.67.14-.2.3-.77.96-.94 1.16-.18.2-.35.22-.65.08-.3-.15-1.25-.46-2.38-1.48-.88-.78-1.47-1.75-1.64-2.05-.17-.3-.02-.46.13-.6.14-.14.3-.35.45-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.53-.08-.15-.67-1.62-.92-2.22-.24-.58-.49-.5-.67-.5h-.57c-.2 0-.53.08-.8.38-.28.3-1.05 1.03-1.05 2.5s1.08 2.88 1.23 3.08c.15.2 2.12 3.23 5.13 4.53.72.31 1.29.5 1.73.63.73.23 1.4.2 1.93.12.59-.09 1.76-.72 2-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35z"/></svg></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-feature-img" aria-hidden="true"></div>
    </div>

    <div class="blog-main">
        <main id="article-top" class="article-wrap">
            <div class="feature-img" aria-hidden="true">
                @if ($post->featured_image)
                    <img src="{{ Storage::url($post->featured_image) }}" alt="{{ e($post->title) }}" class="feature-img-photo">
                @else
                    <div class="feature-img-inner">
                        <span class="feature-img-icon">@include('blog.partials.archive-icon', ['name' => $post->ui['icon'], 'class' => 'feature-svg'])</span>
                        <div class="feature-img-title">{{ $post->ui['label'] }} insights for ambitious businesses</div>
                        <div class="feature-img-sub">Practical lessons from real projects, audits, and growth strategy work</div>
                    </div>
                @endif
            </div>


            <article class="article-body" id="article">
                <x-editorjs-renderer :content="$post->content" />

                @if ($post->tags->isNotEmpty())
                    <div class="article-tags">
                        <span class="article-tags-label">Tagged:</span>
                        @foreach ($post->tags as $tag)
                            <a href="#" class="article-tag">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                @endif

                <div class="share-card article-share">
                    <div class="sc-glow" aria-hidden="true"></div>
                    <div class="sc-top">
                        <div>
                            <div class="sc-text-eyebrow">Enjoyed this piece?</div>
                            <div class="sc-title">Share it with someone<br>who needs to read it</div>
                            <p class="sc-sub">Good thinking travels through good sharing. If this changed how you see website maintenance, someone in your network probably needs to see it too.</p>
                        </div>
                        <div class="sc-count-pill">
                            <div class="scp-num">{{ (int) ($post->share_count ?? 0) }}</div>
                            <div class="scp-label">Shares<br>this week</div>
                        </div>
                    </div>
                    <div class="sc-platforms">
                        <button class="scp-btn twitter" type="button" data-share-platform="twitter">
                            <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.74l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Post on X
                        </button>
                        <button class="scp-btn linkedin" type="button" data-share-platform="linkedin">
                            <svg viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            LinkedIn
                        </button>
                        <button class="scp-btn whatsapp" type="button" data-share-platform="whatsapp">
                            <svg viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347zm-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884zm8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </button>
                        <button class="scp-btn facebook" type="button" data-share-platform="facebook">
                            <svg viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            Facebook
                        </button>
                    </div>
                    <div class="sc-copy-row">
                        <span class="scr-url">{{ route('blog.show', $post->route_params) }}</span>
                        <button class="scr-btn" type="button" id="copyArticleLink" data-copy-url>Copy link</button>
                    </div>
                </div>

                <div class="author-bio">
                    <div class="author-bio-avatar" aria-hidden="true">i2</div>
                    <div>
                        <div class="author-bio-label">Written by</div>
                        <div class="author-bio-name">{{ optional($post->author)->name ?: 'i2Medier Editorial Team' }}</div>
                        <p class="author-bio-text">The i2Medier team writes about web design, SEO, digital strategy, and technology for business owners in Nigeria and the UK. Our content comes from practitioners who build websites, ship products, and run campaigns for real clients every week.</p>
                        <div class="author-bio-links">
                            <a href="{{ route('portfolio.index') }}" class="author-bio-link">See Our Work @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
                            <a href="{{ route('blog.index') }}" class="author-bio-link">All Articles @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
                        </div>
                    </div>
                </div>

            </article>
        </main>

        <aside class="sidebar" aria-label="Blog sidebar">
            @if (!empty($tableOfContents))
                <div class="sidebar-widget">
                    <div class="sw-head">In This Article</div>
                    <div class="sw-body">
                        <ul class="toc-list" role="list">
                            @foreach ($tableOfContents as $tocItem)
                                <li><a href="#{{ $tocItem['id'] }}" class="toc-link{{ $loop->first ? ' active' : '' }}"><span class="toc-link-num">{{ $tocItem['label'] }}</span>{{ $tocItem['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="sidebar-widget dark">
                <div class="cta-widget-body">
                    <div class="cta-widget-ico">@include('blog.partials.archive-icon', ['name' => 'search', 'class' => 'sidebar-cta-icon'])</div>
                    <div class="cta-widget-title">Free Website Audit</div>
                    <p class="cta-widget-text">Find out exactly where your website is underperforming and what it would take to fix it.</p>
                    <a href="{{ route('site.contact') }}" class="btn-gold-full">Get Your Free Audit @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
                </div>
            </div>

            <div class="sidebar-widget">
                <div class="sw-head">Popular Articles</div>
                <div class="sw-body">
                    <ul class="popular-list" role="list">
                        @foreach ($popularPosts as $index => $popularPost)
                            <li>
                                <a href="{{ route('blog.show', $popularPost->route_params) }}" class="popular-item">
                                    <span class="popular-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                    <div>
                                        <div class="popular-title">{{ $popularPost->title }}</div>
                                        <span class="popular-date">{{ $popularPost->formatted_date }}</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="sidebar-widget">
                <div class="sw-head">Browse by Category</div>
                <div class="sw-body">
                    <ul class="cat-list" role="list">
                        @foreach ($categories as $category)
                            <li><a href="{{ route('blog.category', $category) }}" class="cat-item{{ isset($post) && $post->category_id === $category->id ? ' active' : '' }}"><span class="cat-name">{{ $category->ui['label'] }}</span><span class="cat-count">{{ $category->posts_count }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </aside>
    </div>

    @if ($relatedPosts->isNotEmpty())
        <section class="related-section" aria-labelledby="related-heading">
            <div class="related-header">
                <h2 class="related-title">Keep <span>reading</span></h2>
                <a href="{{ route('blog.index') }}" class="related-see-all">View All Articles @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
            </div>
            <div class="related-grid">
                @foreach ($relatedPosts as $relatedPost)
                    <article class="related-card">
                        @if ($relatedPost->featured_image)
                            <div class="related-card-thumb" style="background:url('{{ Storage::url($relatedPost->featured_image) }}') center/cover no-repeat"></div>
                        @else
                            <div class="related-card-thumb" style="background:{{ $relatedPost->ui['gradient'] }}">
                                <div class="related-card-thumb-inner">@include('blog.partials.archive-icon', ['name' => $relatedPost->ui['icon'], 'class' => 'related-card-svg'])</div>
                            </div>
                        @endif
                        <div class="related-card-body">
                            <div class="related-card-cat">{{ $relatedPost->ui['label'] }}</div>
                            <h3 class="related-card-title"><a href="{{ route('blog.show', $relatedPost->route_params) }}">{{ $relatedPost->title }}</a></h3>
                            <p class="related-card-excerpt">{{ $relatedPost->excerpt }}</p>
                            <div class="related-card-meta">
                                <span class="related-card-date">{{ $relatedPost->formatted_date }}</span>
                                <a href="{{ route('blog.show', $relatedPost->route_params) }}" class="related-card-read-link">Read Article @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @endif

    <section class="cta-band" id="contact" aria-labelledby="cta-h">
        <h2 id="cta-h">Ready to turn your website into a stronger growth channel?</h2>
        <p>Get a practical review of your current website, search visibility, and conversion opportunities from the i2Medier team.</p>
        <a href="{{ route('site.contact') }}" class="btn-dark">Get Your Free Website Audit @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</a>
    </section>
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/blog-show.js')
@endpush
