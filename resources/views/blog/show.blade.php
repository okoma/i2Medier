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
                    <span class="share-label">Share</span>
                    <a href="https://x.com/intent/tweet?url={{ urlencode(route('blog.show', $post->route_params)) }}&text={{ urlencode($post->title) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on X">𝕏</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->route_params)) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on LinkedIn">in</a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->route_params)) }}" class="share-btn" target="_blank" rel="noopener" aria-label="Share on WhatsApp">↗</a>
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

                <div class="article-share">
                    <span class="article-share-label">Found this useful? Share it:</span>
                    <a href="https://x.com/intent/tweet?url={{ urlencode(route('blog.show', $post->route_params)) }}&text={{ urlencode($post->title) }}" class="share-btn-lg twitter" target="_blank" rel="noopener">𝕏 Share on X</a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->route_params)) }}" class="share-btn-lg linkedin" target="_blank" rel="noopener">in LinkedIn</a>
                    <a href="https://wa.me/?text={{ urlencode($post->title . ' ' . route('blog.show', $post->route_params)) }}" class="share-btn-lg whatsapp" target="_blank" rel="noopener">↗ WhatsApp</a>
                    <a href="#" class="share-btn-lg copy" id="copyArticleLink">🔗 Copy Link</a>
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

                <div class="comments-section">
                    <h3 class="comments-title">Leave a comment</h3>
                    <div class="comment-form">
                        <div class="comment-form-title">Share your thoughts or ask a question</div>
                        <div class="form-row">
                            <div class="form-field">
                                <label class="form-label" for="comment-name">Full Name *</label>
                                <input class="form-input" type="text" id="comment-name" name="name" placeholder="Your name">
                            </div>
                            <div class="form-field">
                                <label class="form-label" for="comment-email">Email Address *</label>
                                <input class="form-input" type="email" id="comment-email" name="email" placeholder="your@email.com">
                            </div>
                        </div>
                        <div class="form-field">
                            <label class="form-label" for="comment-message">Your Comment *</label>
                            <textarea class="form-input form-textarea" id="comment-message" name="message" placeholder="Share your thoughts, ask a question, or tell us your experience..."></textarea>
                        </div>
                        <button type="button" class="form-btn">Post Comment @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</button>
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
                <div class="sw-head">Weekly Web Tips</div>
                <div class="sw-body">
                    <p class="newsletter-sub">Get one practical web design or SEO tip every week. No fluff, just useful insights for business owners.</p>
                    <div class="newsletter-form">
                        <input class="newsletter-input" type="text" placeholder="Your first name">
                        <input class="newsletter-input" type="email" placeholder="your@email.com">
                        <button class="newsletter-btn" type="button">Subscribe Free @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-inline-icon'])</button>
                        <p class="newsletter-note">One email per week. Unsubscribe anytime.</p>
                    </div>
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

            <div class="sidebar-widget">
                <div class="sw-head">Popular Tags</div>
                <div class="sw-body">
                    <div class="tags-cloud">
                        @foreach ($tags as $tag)
                            <a href="#" class="tag-chip">{{ $tag->name }}</a>
                        @endforeach
                    </div>
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
