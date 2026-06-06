@extends('public.layouts.app')

@section('title', $category->ui['label'] . ' Articles | i2Medier Blog')
@push('page_css')
    @vite('resources/css/public/pages/blog-archive.css')
@endpush

@section('content')
<div class="blog-archive-page">
    <header class="blog-hero" style="--cat-accent:{{ $category->ui['color'] }}">
        <div class="bh-bg" style="background:{{ $category->ui['gradient'] }}" aria-hidden="true"></div>
        <div class="bh-grid" aria-hidden="true"></div>

        <div class="bh-inner">
            <div class="bh-left">
                <nav class="bh-breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ route('site.home') }}">Home</a>
                    <span class="breadcrumb-sep">›</span>
                    <a href="{{ route('blog.index') }}">Blog</a>
                    <span class="breadcrumb-sep">›</span>
                    <span aria-current="page">{{ $category->ui['label'] }}</span>
                </nav>
                <span class="bh-tag" style="background:rgba(255,255,255,.08);border-color:rgba(255,255,255,.12)">
                    <span class="bh-dot" style="background:{{ $category->ui['color'] }}"></span>
                    Topic Archive
                </span>
                <h1 class="bh-h1" style="font-size:clamp(2rem,4.5vw,3.4rem)">
                    @include('blog.partials.archive-icon', ['name' => $category->ui['icon'], 'class' => 'blog-icon blog-icon-hero', 'style' => 'display:inline-block;vertical-align:middle;margin-right:.4rem;opacity:.6'])
                    {{ $category->ui['label'] }}
                </h1>
                <p class="bh-sub">{{ $category->ui['topic_description'] }}</p>

                <div class="bh-stats">
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ $totalPosts }}</em></div>
                        <div class="bhs-lbl">Articles</div>
                    </div>
                    <div class="bhs-item">
                        <div class="bhs-num"><em>{{ $allCategories->count() }}</em></div>
                        <div class="bhs-lbl">Topics</div>
                    </div>
                </div>

                <a href="{{ route('blog.index') }}" class="btn-navy" style="margin-top:1.5rem;display:inline-flex;align-items:center;gap:.4rem;font-size:.8rem">
                    @include('blog.partials.archive-icon', ['name' => 'arrow-left', 'class' => 'blog-icon blog-icon-inline'])
                    All Articles
                </a>
            </div>

            @if ($heroPost)
                <div class="bh-right">
                    <div class="bh-featured-card">
                        <div class="bfc-img">
                            @if ($heroPost->featured_image)<div class="bfc-img-bg" style="background:url('{{ Storage::url($heroPost->featured_image) }}') center/cover no-repeat"></div>@else<div class="bfc-img-bg" style="background:{{ $heroPost->ui['gradient'] }}"></div>@endif
                            <div class="bfc-overlay"></div>
                            <span class="bfc-ico">@include('blog.partials.archive-icon', ['name' => $heroPost->ui['icon'], 'class' => 'blog-icon blog-icon-hero'])</span>
                            <span class="bfc-badge">{{ $isHeroFeatured ? "Editor's Pick" : 'Latest Article' }}</span>
                        </div>
                        <div class="bfc-body">
                            <div class="bfc-cat">{{ $heroPost->ui['label'] }}</div>
                            <h2 class="bfc-title"><a href="{{ route('blog.show', $heroPost->route_params) }}">{{ $heroPost->title }}</a></h2>
                            <p class="bfc-excerpt">{{ $heroPost->excerpt }}</p>
                            <div class="bfc-meta">
                                <div class="bfc-meta-left">
                                    <span class="bfc-date">{{ $heroPost->formatted_date }}</span>
                                    <span class="bfc-read">· {{ $heroPost->read_time }} min</span>
                                </div>
                                <a href="{{ route('blog.show', $heroPost->route_params) }}" class="bfc-cta">Read Article @include('blog.partials.archive-icon', ['name' => 'arrow-right', 'class' => 'blog-icon blog-icon-inline'])</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <div class="blog-body">
        <main class="posts-area" id="postsFeed" aria-label="Blog posts">

            <div class="feed-sep">
                <span class="feed-sep-label">{{ $category->ui['label'] }}</span>
                <span class="feed-sep-line" aria-hidden="true"></span>
                <span class="feed-sep-count">{{ $totalPosts }} {{ Str::plural('article', $totalPosts) }}</span>
            </div>

            <div id="listArea">
                @forelse ($posts as $post)
                    <article class="list-card reveal">
                        <div class="lc-thumb">
                            @if ($post->featured_image)<div class="lc-thumb-bg" style="background:url('{{ Storage::url($post->featured_image) }}') center/cover no-repeat"></div>@else<div class="lc-thumb-bg" style="background:{{ $post->ui['gradient'] }}"></div>@endif
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
                    <div class="empty-state">No published articles in this topic yet.</div>
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
                            <a href="{{ $posts->nextPageUrl() }}" class="load-more-btn">More Articles @include('blog.partials.archive-icon', ['name' => 'arrow-down', 'class' => 'blog-icon blog-icon-inline'])</a>
                        @else
                            <span class="load-more-btn is-disabled">No More Articles</span>
                        @endif
                    </div>
                    <p class="load-more-count">Showing {{ $posts->count() }} of {{ $totalPosts }} articles.</p>
                </div>
            @endif
        </main>

        <aside class="sidebar" aria-label="Blog sidebar">
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
                        <li><a href="{{ route('blog.index') }}" class="cat-row"><span class="cat-dot" style="background:var(--gold)"></span><span class="cat-name">All Articles</span></a></li>
                        @foreach ($allCategories as $cat)
                            <li>
                                <a href="{{ route('blog.category', $cat) }}" class="cat-row{{ $cat->id === $category->id ? ' active' : '' }}">
                                    <span class="cat-dot" style="background:{{ $cat->ui['color'] }}"></span>
                                    <span class="cat-name">{{ $cat->ui['label'] }}</span>
                                    <span class="cat-num">{{ $cat->posts_count }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="sw">
                <div class="sw-head">Most Read</div>
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
</div>
@endsection

@push('scripts')
    @vite('resources/js/public/pages/blog-category.js')
@endpush
