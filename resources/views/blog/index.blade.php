@extends('public.layouts.app')

@section('title', 'Blog - Web Design, SEO & Digital Strategy for Nigerian & UK Businesses | i2Medier')

@push('page_css')
    @vite('resources/css/public/pages/blog-archive.css')
@endpush

@section('content')
<div class="blog-archive-page">
    <div class="breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('site.home') }}">Home</a>
        <span class="breadcrumb-sep">›</span>
        <span aria-current="page">Blog</span>
    </div>

    <header class="blog-hero">
        <div class="bh-bg" aria-hidden="true"></div>
        <div class="bh-grid" aria-hidden="true"></div>

        <div class="bh-pills" aria-hidden="true">
            @foreach ($categories->take(8) as $category)
                <span class="bh-pill">
                    <span class="bh-pill-dot" style="background:{{ $category->ui['color'] }}"></span>
                    {{ $category->ui['label'] }}
                </span>
            @endforeach
        </div>

        <div class="bh-inner">
            <div class="bh-left">
                <span class="bh-tag"><span class="bh-dot"></span>i2Medier Blog</span>
                <h1 class="bh-h1">Practical insights.<br>No fluff. Just<br><em>what works.</em></h1>
                <p class="bh-sub">Web design, SEO, development, and digital strategy written by the people who build it every day for real Nigerian and UK businesses. If it is not actionable, we do not publish it.</p>

                <div class="bh-search">
                    <span class="bh-search-ico">@include('blog.partials.archive-icon', ['name' => 'search', 'class' => 'blog-icon blog-icon-search'])</span>
                    <input class="bh-search-input" type="search" id="searchInput" placeholder="Search {{ $totalPosts }} articles..." aria-label="Search articles">
                    <button class="bh-search-btn" type="button" id="searchButton">Search</button>
                </div>

                <div class="bh-stats">
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ $totalPosts }}</em></div>
                        <div class="bhs-lbl">Articles</div>
                    </div>
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ $categories->count() }}</em></div>
                        <div class="bhs-lbl">Topics</div>
                    </div>
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ number_format($totalViews) }}</em></div>
                        <div class="bhs-lbl">Views</div>
                    </div>
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ $featuredPost ? 'Fresh' : 'Live' }}</em></div>
                        <div class="bhs-lbl">Weekly</div>
                    </div>
                </div>
            </div>

            @if ($featuredPost)
                <div class="bh-right">
                    <div class="bh-featured-card">
                        <div class="bfc-img">
                            <div class="bfc-img-bg" style="background:{{ $featuredPost->ui['gradient'] }}"></div>
                            <div class="bfc-overlay"></div>
                            <span class="bfc-ico">@include('blog.partials.archive-icon', ['name' => $featuredPost->ui['icon'], 'class' => 'blog-icon blog-icon-hero'])</span>
                            <span class="bfc-badge">Editor's Pick</span>
                        </div>
                        <div class="bfc-body">
                            <div class="bfc-cat">{{ $featuredPost->ui['label'] }}</div>
                            <h2 class="bfc-title"><a href="{{ route('blog.show', $featuredPost->route_params) }}">{{ $featuredPost->title }}</a></h2>
                            <p class="bfc-excerpt">{{ $featuredPost->excerpt }}</p>
                            <div class="bfc-meta">
                                <div class="bfc-meta-left">
                                    <span class="bfc-date">{{ $featuredPost->formatted_date }}</span>
                                    <span class="bfc-read">· {{ $featuredPost->read_time }} min</span>
                                </div>
                                <a href="{{ route('blog.show', $featuredPost->route_params) }}" class="bfc-cta">Read Article @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <div class="filter-wrap" aria-label="Filter by category">
        <nav class="filter-inner" aria-label="Category filters">
            <button class="f-btn active" type="button" data-cat="all">All <span class="f-count">{{ $totalPosts }}</span></button>
            @foreach ($categories as $category)
                <button class="f-btn" type="button" data-cat="{{ $category->ui['slug'] }}">{{ $category->ui['label'] }} <span class="f-count">{{ $category->posts_count }}</span></button>
            @endforeach
        </nav>
    </div>

    <div class="blog-body">
        <main id="postsFeed" class="posts-area" aria-label="Blog posts">
            @if ($leadPost || $heroSidePosts->isNotEmpty())
                <div class="top-strip">
                    @if ($leadPost)
                        <article class="big-card reveal" data-cat="{{ $leadPost->ui['slug'] }}" data-search="{{ strtolower($leadPost->title . ' ' . $leadPost->excerpt . ' ' . $leadPost->ui['label']) }}">
                            <div class="bc-thumb">
                                <div class="bc-thumb-bg" style="background:{{ $leadPost->ui['gradient'] }}"></div>
                                <div class="bc-overlay"></div>
                                <span class="bc-ico">@include('blog.partials.archive-icon', ['name' => $leadPost->ui['icon'], 'class' => 'blog-icon blog-icon-card'])</span>
                                <div class="bc-badge-wrap">
                                    <span class="bc-badge featured">Trending</span>
                                    <span class="bc-badge cat" style="background:{{ $leadPost->ui['color'] }}">{{ $leadPost->ui['short_label'] }}</span>
                                </div>
                            </div>
                            <div class="bc-body">
                                <div class="bc-cat">{{ $leadPost->ui['label'] }}</div>
                                <h2 class="bc-title"><a href="{{ route('blog.show', $leadPost->route_params) }}">{{ $leadPost->title }}</a></h2>
                                <p class="bc-excerpt">{{ $leadPost->excerpt }}</p>
                                <div class="bc-meta">
                                    <span class="bc-date">{{ $leadPost->formatted_date }} · {{ $leadPost->read_time }} min</span>
                                    <a href="{{ route('blog.show', $leadPost->route_params) }}" class="bc-read-link">Read Article @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                                </div>
                            </div>
                        </article>
                    @endif

                    <div class="small-stack">
                        @foreach ($heroSidePosts as $post)
                            <article class="small-card reveal" data-cat="{{ $post->ui['slug'] }}" data-search="{{ strtolower($post->title . ' ' . $post->excerpt . ' ' . $post->ui['label']) }}">
                                <div class="sc-thumb">
                                    <div class="sc-thumb-bg" style="background:{{ $post->ui['gradient'] }}"></div>
                                    <span class="sc-ico">@include('blog.partials.archive-icon', ['name' => $post->ui['icon'], 'class' => 'blog-icon blog-icon-small'])</span>
                                </div>
                                <div class="sc-body">
                                    <div class="sc-cat">{{ $post->ui['label'] }}</div>
                                    <h3 class="sc-title"><a href="{{ route('blog.show', $post->route_params) }}">{{ $post->title }}</a></h3>
                                    <span class="sc-meta">{{ $post->formatted_date }} · {{ $post->read_time }} min</span>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="feed-sep">
                <span class="feed-sep-label">Latest Articles</span>
                <span class="feed-sep-line" aria-hidden="true"></span>
                <span class="feed-sep-count">{{ $totalPosts }} articles</span>
            </div>

            <div class="posts-grid" id="postsGrid">
                @foreach ($gridPosts as $post)
                    <article class="post-card reveal" data-cat="{{ $post->ui['slug'] }}" data-search="{{ strtolower($post->title . ' ' . $post->excerpt . ' ' . $post->ui['label']) }}">
                        <div class="pc-thumb">
                            <div class="pc-thumb-bg" style="background:{{ $post->ui['gradient'] }}"></div>
                            <div class="pc-overlay">
                                <span class="pc-cat-pill" style="background:{{ $post->ui['color'] }}">{{ $post->ui['short_label'] }}</span>
                            </div>
                            <span class="pc-ico">@include('blog.partials.archive-icon', ['name' => $post->ui['icon'], 'class' => 'blog-icon blog-icon-post'])</span>
                        </div>
                        <div class="pc-body">
                            <div class="pc-cat">{{ $post->ui['label'] }}</div>
                            <h3 class="pc-title"><a href="{{ route('blog.show', $post->route_params) }}">{{ $post->title }}</a></h3>
                            <p class="pc-excerpt">{{ $post->excerpt }}</p>
                            <div class="pc-meta">
                                <span class="pc-date">{{ $post->formatted_date }} · {{ $post->read_time }} min</span>
                                <a href="{{ route('blog.show', $post->route_params) }}" class="pc-read-link">Read @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="feed-sep">
                <span class="feed-sep-label">More Articles</span>
                <span class="feed-sep-line" aria-hidden="true"></span>
            </div>

            <div id="listArea">
                @forelse ($listPosts as $post)
                    <article class="list-card reveal" data-cat="{{ $post->ui['slug'] }}" data-search="{{ strtolower($post->title . ' ' . $post->excerpt . ' ' . $post->ui['label']) }}">
                        <div class="lc-thumb">
                            <div class="lc-thumb-bg" style="background:{{ $post->ui['gradient'] }}"></div>
                            <span class="lc-ico">@include('blog.partials.archive-icon', ['name' => $post->ui['icon'], 'class' => 'blog-icon blog-icon-list'])</span>
                        </div>
                        <div class="lc-body">
                            <div class="lc-cat">{{ $post->ui['label'] }}</div>
                            <h3 class="lc-title"><a href="{{ route('blog.show', $post->route_params) }}">{{ $post->title }}</a></h3>
                            <p class="lc-excerpt">{{ $post->excerpt }}</p>
                            <div class="lc-meta">
                                <span class="lc-date">{{ $post->formatted_date }}</span>
                                <span class="lc-time">· {{ $post->read_time }} min</span>
                                <a href="{{ route('blog.show', $post->route_params) }}" class="lc-read-link">Read @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="empty-state">No published blog posts yet.</div>
                @endforelse
            </div>

            @if ($posts->hasPages())
                <div class="load-more-wrap">
                    <div class="blog-pagination">
                        @if ($posts->onFirstPage())
                            <span class="pager-btn is-disabled">Newer Posts</span>
                        @else
                            <a href="{{ $posts->previousPageUrl() }}" class="pager-btn">Newer Posts</a>
                        @endif

                        @if ($posts->hasMorePages())
                            <a href="{{ $posts->nextPageUrl() }}" class="load-more-btn">Browse Older Articles @include('blog.partials.archive-icon', ['name' => 'arrow-down', 'class' => 'blog-icon blog-icon-inline'])</a>
                        @else
                            <span class="load-more-btn is-disabled">No More Articles</span>
                        @endif
                    </div>
                    <p class="load-more-count">Showing {{ $posts->count() }} archive stories on this page.</p>
                </div>
            @endif
        </main>

        <aside class="sidebar" aria-label="Blog sidebar">
            <div class="sw">
                <div class="sw-about-body">
                    <div class="sw-brand">i2Medi<span>er</span></div>
                    <p class="sw-about-desc">We build websites and digital products for businesses in Nigeria and the UK. This blog is where we share what we learn, written by the people who actually do the work.</p>
                    <div class="sw-about-stats">
                        <div class="sw-astat"><div class="sw-astat-num">{{ $totalPosts }}</div><div class="sw-astat-lbl">Articles</div></div>
                        <div class="sw-astat"><div class="sw-astat-num">{{ number_format($totalViews) }}</div><div class="sw-astat-lbl">Views</div></div>
                        <div class="sw-astat"><div class="sw-astat-num">{{ $categories->count() }}</div><div class="sw-astat-lbl">Topics</div></div>
                    </div>
                    <a href="{{ route('portfolio.index') }}" class="btn-navy">See Our Work @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                </div>
            </div>

            <div class="sw dark">
                <div class="sw-cta-body">
                    <span class="sw-cta-ico">@include('blog.partials.archive-icon', ['name' => 'search', 'class' => 'blog-icon blog-icon-cta'])</span>
                    <div class="sw-cta-title">Free Website Audit</div>
                    <p class="sw-cta-desc">Find out what your current website is missing and what it may be costing you in lost leads every month.</p>
                    <a href="{{ route('site.contact') }}" class="btn-gold-block">Get Your Free Audit @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                </div>
            </div>

            <div class="sw">
                <div class="sw-head">Browse by Category</div>
                <div class="sw-body">
                    <ul class="cat-list">
                        <li><a href="#" class="cat-row active" data-filter="all"><span class="cat-dot" style="background:var(--gold)"></span><span class="cat-name">All Articles</span><span class="cat-num">{{ $totalPosts }}</span></a></li>
                        @foreach ($categories as $category)
                            <li><a href="#" class="cat-row" data-filter="{{ $category->ui['slug'] }}"><span class="cat-dot" style="background:{{ $category->ui['color'] }}"></span><span class="cat-name">{{ $category->ui['label'] }}</span><span class="cat-num">{{ $category->posts_count }}</span></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="sw">
                <div class="sw-head">Most Read This Month</div>
                <div class="sw-body">
                    <ul class="popular-list">
                        @foreach ($popularPosts as $index => $post)
                            <li>
                                <a href="{{ route('blog.show', $post->route_params) }}" class="pop-item">
                                    <span class="pop-num">{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                                    <div>
                                        <div class="pop-title">{{ $post->title }}</div>
                                        <span class="pop-meta">{{ $post->ui['label'] }} · {{ $post->read_time }} min</span>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="sw">
                <div class="sw-head">Weekly Newsletter</div>
                <div class="sw-body">
                    <p class="sw-nl-sub">One practical web design or SEO tip every week. No fluff. Just ideas you can act on immediately.</p>
                    <div class="nl-form">
                        <input class="nl-input" type="text" placeholder="First name" aria-label="First name">
                        <input class="nl-input" type="email" placeholder="your@email.com" aria-label="Email address">
                        <button class="nl-btn" id="nlBtn" type="button">Subscribe Free @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</button>
                        <p class="nl-note">Weekly. Unsubscribe anytime.</p>
                    </div>
                </div>
            </div>

            <div class="sw">
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

    @if ($topicCards->isNotEmpty())
        <section class="topics-strip" aria-labelledby="topics-h">
            <div class="ts-header">
                <h2 class="ts-title" id="topics-h">Browse by <em>topic</em></h2>
                <a href="#postsFeed" class="ts-all">View All Topics @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
            </div>
            <div class="topic-grid">
                @foreach ($topicCards as $topic)
                    <a href="#" class="topic-card reveal" data-filter-link="{{ $topic['slug'] }}" style="--topic-color:{{ $topic['color'] }}">
                        <span class="tc-ico">@include('blog.partials.archive-icon', ['name' => $topic['icon'], 'class' => 'blog-icon blog-icon-topic'])</span>
                        <div class="tc-name">{{ $topic['name'] }}</div>
                        <div class="tc-count">{{ $topic['count'] }} articles</div>
                        <p class="tc-desc">{{ $topic['description'] }}</p>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

    <section class="ticker-band" aria-label="Highlights ticker">
        <div class="ticker-track">
            @foreach ($popularPosts as $post)
                <span class="ticker-item"><span class="ticker-dot"></span>{{ $post->ui['label'] }}: {{ $post->title }}</span>
            @endforeach
            @foreach ($popularPosts as $post)
                <span class="ticker-item"><span class="ticker-dot"></span>{{ $post->ui['label'] }}: {{ $post->title }}</span>
            @endforeach
        </div>
    </section>

    <section class="email-band">
        <div class="email-band-inner">
            <span class="eb-tag"><span class="eb-dot"></span>Stay in the Loop</span>
            <h2>Fresh strategy notes, dev lessons, and SEO wins for <em>serious businesses</em></h2>
            <p>Subscribe for practical digital growth insights from the i2Medier team, straight to your inbox.</p>
            <div class="email-form">
                <input class="email-input" type="email" placeholder="your@email.com" aria-label="Email address">
                <button class="email-btn" type="button">Subscribe Free</button>
            </div>
            <p class="email-note">No spam. Just useful updates.</p>
        </div>
    </section>

    <section class="cta-band">
        <h2>Need content and the website strategy behind it?</h2>
        <p>We do not just publish insights. We design, build, optimize, and maintain the systems that help service businesses grow online.</p>
        <a href="{{ route('site.contact') }}" class="btn-dark">Start a Project</a>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const revealItems = document.querySelectorAll('.blog-archive-page .reveal');
    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    revealItems.forEach(function (item) {
        observer.observe(item);
    });

    const filterButtons = Array.from(document.querySelectorAll('.f-btn'));
    const categoryLinks = Array.from(document.querySelectorAll('.cat-row'));
    const topicLinks = Array.from(document.querySelectorAll('[data-filter-link]'));
    const posts = Array.from(document.querySelectorAll('[data-cat][data-search]'));
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    let activeCategory = 'all';

    const applyFilters = function () {
        const searchTerm = (searchInput?.value || '').trim().toLowerCase();

        posts.forEach(function (post) {
            const matchesCategory = activeCategory === 'all' || post.dataset.cat === activeCategory;
            const matchesSearch = searchTerm === '' || post.dataset.search.includes(searchTerm);
            post.style.display = matchesCategory && matchesSearch ? '' : 'none';
        });
    };

    const setCategory = function (category) {
        activeCategory = category;
        filterButtons.forEach(function (button) {
            button.classList.toggle('active', button.dataset.cat === category);
        });
        categoryLinks.forEach(function (link) {
            link.classList.toggle('active', link.dataset.filter === category);
        });
        applyFilters();
    };

    filterButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            setCategory(button.dataset.cat);
        });
    });

    categoryLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            setCategory(link.dataset.filter);
        });
    });

    topicLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            setCategory(link.dataset.filterLink);
            document.getElementById('postsFeed')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    if (searchInput) {
        searchInput.addEventListener('input', applyFilters);
    }

    if (searchButton) {
        searchButton.addEventListener('click', applyFilters);
    }

    setCategory('all');
});
</script>
@endpush
