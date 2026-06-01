<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(): View
    {
        $featuredPost = BlogPost::query()
            ->published()
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $posts = BlogPost::query()
            ->published()
            ->with(['author', 'category', 'tags'])
            ->when($featuredPost, fn ($query) => $query->whereKeyNot($featuredPost->getKey()))
            ->latest('published_at')
            ->paginate(15);

        $posts->setCollection(
            $posts->getCollection()->map(fn (BlogPost $post) => $this->decoratePost($post))
        );

        $archivePosts = $posts->getCollection()->values();
        $leadPost = $archivePosts->get(0);
        $heroSidePosts = $archivePosts->slice(1, 3)->values();
        $gridPosts = $archivePosts->slice(4, 6)->values();
        $listPosts = $archivePosts->slice(10)->values();

        if ($featuredPost) {
            $featuredPost = $this->decoratePost($featuredPost->loadMissing(['author', 'category', 'tags']));
        }

        $totalPosts = BlogPost::query()->published()->count();
        $totalViews = (int) BlogPost::query()->published()->sum('view_count');

        $categories = BlogCategory::query()
            ->withCount([
                'posts' => fn ($query) => $query->published(),
            ])
            ->orderByDesc('posts_count')
            ->orderBy('sort_order')
            ->get()
            ->map(function (BlogCategory $category) {
                $category->ui = $this->categoryUi($category);

                return $category;
            })
            ->values();

        $popularPosts = BlogPost::query()
            ->published()
            ->with(['category'])
            ->orderByDesc('view_count')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get()
            ->map(fn (BlogPost $post) => $this->decoratePost($post));

        $tags = BlogTag::query()
            ->whereHas('posts', fn ($query) => $query->published())
            ->withCount([
                'posts' => fn ($query) => $query->published(),
            ])
            ->orderByDesc('posts_count')
            ->orderBy('name')
            ->limit(16)
            ->get();

        $topicCards = $categories->take(4)->map(function (BlogCategory $category) {
            $topic = $category->ui;

            return [
                'name' => $topic['label'],
                'count' => $category->posts_count,
                'description' => $topic['topic_description'],
                'icon' => $topic['icon'],
                'color' => $topic['color'],
                'slug' => $topic['slug'],
                'db_slug' => $category->slug,
            ];
        });

        $seo = [
            'title' => 'Blog - Web Design, SEO & Digital Strategy for Nigerian & UK Businesses | i2Medier',
            'description' => 'Practical, no-fluff articles on web design, SEO, Laravel, WordPress, mobile apps, cloud infrastructure, and digital strategy written by the team that builds it.',
            'keywords' => 'web design blog Nigeria, SEO tips Nigeria, Laravel development articles, WordPress guides Nigeria, digital strategy Nigeria, i2Medier blog, website tips Nigerian businesses',
            'robots' => 'index, follow',
            'author' => 'i2Medier',
            'url' => route('blog.index'),
            'og_type' => 'website',
            'schema_type' => 'Blog',
            'service_type' => null,
        ];

        return view('blog.index', compact(
            'featuredPost',
            'posts',
            'leadPost',
            'heroSidePosts',
            'gridPosts',
            'listPosts',
            'totalPosts',
            'totalViews',
            'categories',
            'popularPosts',
            'tags',
            'topicCards',
            'seo'
        ));
    }

    public function category(BlogCategory $category): View
    {
        $category->ui = $this->categoryUi($category);

        $heroPost = BlogPost::query()
            ->published()
            ->where('category_id', $category->id)
            ->where('is_featured', true)
            ->latest('published_at')
            ->first();

        $isHeroFeatured = (bool) $heroPost;

        if (! $heroPost) {
            $heroPost = BlogPost::query()
                ->published()
                ->where('category_id', $category->id)
                ->latest('published_at')
                ->first();
        }

        if ($heroPost) {
            $heroPost = $this->decoratePost($heroPost->loadMissing(['author', 'category', 'tags']));
        }

        $posts = BlogPost::query()
            ->published()
            ->where('category_id', $category->id)
            ->with(['author', 'category', 'tags'])
            ->when($heroPost, fn ($q) => $q->whereKeyNot($heroPost->getKey()))
            ->latest('published_at')
            ->paginate(12);

        $posts->setCollection(
            $posts->getCollection()->map(fn (BlogPost $post) => $this->decoratePost($post))
        );

        $allCategories = BlogCategory::query()
            ->withCount(['posts' => fn ($query) => $query->published()])
            ->orderByDesc('posts_count')
            ->orderBy('sort_order')
            ->get()
            ->map(function (BlogCategory $cat) {
                $cat->ui = $this->categoryUi($cat);

                return $cat;
            })
            ->values();

        $popularPosts = BlogPost::query()
            ->published()
            ->with(['category'])
            ->orderByDesc('view_count')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get()
            ->map(fn (BlogPost $post) => $this->decoratePost($post));

        $tags = BlogTag::query()
            ->whereHas('posts', fn ($query) => $query->published())
            ->withCount(['posts' => fn ($query) => $query->published()])
            ->orderByDesc('posts_count')
            ->orderBy('name')
            ->limit(16)
            ->get();

        $totalPosts = $posts->total();

        $seo = [
            'title' => $category->ui['label'] . ' Articles | i2Medier Blog',
            'description' => $category->ui['topic_description'],
            'keywords' => $category->name . ', web design Nigeria, i2Medier blog',
            'robots' => 'index, follow',
            'author' => 'i2Medier',
            'url' => route('blog.category', $category),
            'og_type' => 'website',
            'schema_type' => 'Blog',
            'service_type' => null,
        ];

        return view('blog.category', compact('category', 'heroPost', 'isHeroFeatured', 'posts', 'allCategories', 'popularPosts', 'tags', 'totalPosts', 'seo'));
    }

    public function preview(BlogPost $post): View
    {
        $post->load(['author', 'category', 'tags']);
        $post = $this->decoratePost($post);

        $relatedPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->when($post->category_id, fn ($query) => $query->where('category_id', $post->category_id))
            ->latest('published_at')
            ->limit(3)
            ->get()
            ->map(fn (BlogPost $relatedPost) => $this->decoratePost($relatedPost));

        $popularPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->with(['category'])
            ->orderByDesc('view_count')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get()
            ->map(fn (BlogPost $popularPost) => $this->decoratePost($popularPost));

        $categories = BlogCategory::query()
            ->withCount(['posts' => fn ($query) => $query->published()])
            ->orderByDesc('posts_count')
            ->orderBy('sort_order')
            ->get()
            ->map(function (BlogCategory $category) {
                $category->ui = $this->categoryUi($category);

                return $category;
            })
            ->values();

        $tags = BlogTag::query()
            ->whereHas('posts', fn ($query) => $query->published())
            ->withCount(['posts' => fn ($query) => $query->published()])
            ->orderByDesc('posts_count')
            ->orderBy('name')
            ->limit(14)
            ->get();

        $tableOfContents = $this->extractTableOfContents($post->content ?? []);

        $seo = [
            'title' => '[Preview] ' . ($post->seo_title ?: $post->title) . ' | i2Medier Blog',
            'description' => $post->seo_description ?: $post->excerpt,
            'keywords' => '',
            'robots' => 'noindex, nofollow',
            'author' => optional($post->author)->name ?: 'i2Medier',
            'url' => '#',
            'og_type' => 'article',
            'schema_type' => 'Article',
            'service_type' => null,
        ];

        return view('blog.show', compact(
            'post',
            'relatedPosts',
            'popularPosts',
            'categories',
            'tags',
            'tableOfContents',
            'seo'
        ))->with('isPreview', true);
    }

    public function show(string $category, BlogPost $post): View|RedirectResponse
    {
        abort_unless($post->status === 'published' && optional($post->published_at)->lte(now()), 404);

        $canonicalCategory = $post->category?->slug ?? 'uncategorized';

        if ($category !== $canonicalCategory) {
            return redirect()->route('blog.show', [
                'category' => $canonicalCategory,
                'post' => $post,
            ], 301);
        }

        $post->increment('view_count');
        $post->load(['author', 'category', 'tags']);
        $post = $this->decoratePost($post);

        $relatedPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->when($post->category_id, fn ($query) => $query->where('category_id', $post->category_id))
            ->latest('published_at')
            ->limit(3)
            ->get()
            ->map(fn (BlogPost $relatedPost) => $this->decoratePost($relatedPost));

        $popularPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->with(['category'])
            ->orderByDesc('view_count')
            ->orderByDesc('published_at')
            ->limit(5)
            ->get()
            ->map(fn (BlogPost $popularPost) => $this->decoratePost($popularPost));

        $categories = BlogCategory::query()
            ->withCount([
                'posts' => fn ($query) => $query->published(),
            ])
            ->orderByDesc('posts_count')
            ->orderBy('sort_order')
            ->get()
            ->map(function (BlogCategory $category) {
                $category->ui = $this->categoryUi($category);

                return $category;
            })
            ->values();

        $tags = BlogTag::query()
            ->whereHas('posts', fn ($query) => $query->published())
            ->withCount([
                'posts' => fn ($query) => $query->published(),
            ])
            ->orderByDesc('posts_count')
            ->orderBy('name')
            ->limit(14)
            ->get();

        $tableOfContents = $this->extractTableOfContents($post->content ?? []);

        $seo = [
            'title' => ($post->seo_title ?: $post->title) . ' | i2Medier Blog',
            'description' => $post->seo_description ?: $post->excerpt,
            'keywords' => is_array($post->seo_keywords) ? implode(', ', $post->seo_keywords) : ($post->seo_keywords ?: optional($post->category)->name),
            'robots' => 'index, follow',
            'author' => optional($post->author)->name ?: 'i2Medier',
            'url' => route('blog.show', $post->route_params),
            'og_type' => 'article',
            'schema_type' => 'Article',
            'service_type' => null,
        ];

        return view('blog.show', compact(
            'post',
            'relatedPosts',
            'popularPosts',
            'categories',
            'tags',
            'tableOfContents',
            'seo'
        ));
    }

    private function decoratePost(BlogPost $post): BlogPost
    {
        $post->ui = $this->categoryUi($post->category);
        $post->formatted_date = optional($post->published_at)->format('d M Y');
        $post->formatted_short_date = optional($post->published_at)->format('M d, Y');
        $post->route_params = [
            'category' => $post->category?->slug ?? 'uncategorized',
            'post' => $post,
        ];

        return $post;
    }

    private function categoryUi(?BlogCategory $category): array
    {
        $slug = $category?->slug;

        $map = [
            'web-design' => [
                'slug' => 'web-design',
                'label' => 'Web Design',
                'short_label' => 'Design',
                'color' => 'var(--cat-design)',
                'gradient' => 'linear-gradient(135deg,#0c1f3a 0%,#0e2c50 100%)',
                'icon' => 'design',
                'topic_description' => 'Custom themes, UX patterns, conversion design, and modern web experiences built for real businesses.',
            ],
            'seo' => [
                'slug' => 'seo',
                'label' => 'SEO & Search',
                'short_label' => 'SEO',
                'color' => 'var(--cat-seo)',
                'gradient' => 'linear-gradient(135deg,#061208 0%,#0e2a15 100%)',
                'icon' => 'search',
                'topic_description' => 'Technical SEO, local SEO, schema, content strategy, and ranking systems that produce measurable results.',
            ],
            'search-optimization' => [
                'slug' => 'seo',
                'label' => 'SEO & Search',
                'short_label' => 'SEO',
                'color' => 'var(--cat-seo)',
                'gradient' => 'linear-gradient(135deg,#061208 0%,#0e2a15 100%)',
                'icon' => 'chart',
                'topic_description' => 'Technical SEO, local SEO, schema, content strategy, and ranking systems that produce measurable results.',
            ],
            'wordpress' => [
                'slug' => 'wordpress',
                'label' => 'WordPress',
                'short_label' => 'WordPress',
                'color' => 'var(--cat-wp)',
                'gradient' => 'linear-gradient(135deg,#1a0a2e 0%,#2d1050 100%)',
                'icon' => 'wordpress',
                'topic_description' => 'Custom WordPress themes, maintenance systems, performance work, and the engineering behind scalable content sites.',
            ],
            'laravel' => [
                'slug' => 'laravel',
                'label' => 'Laravel',
                'short_label' => 'Laravel',
                'color' => 'var(--cat-laravel)',
                'gradient' => 'linear-gradient(135deg,#160a05 0%,#2a1208 100%)',
                'icon' => 'code',
                'topic_description' => 'Laravel patterns, APIs, CI/CD, testing, and practical architecture lessons from production systems.',
            ],
            'business-growth' => [
                'slug' => 'business',
                'label' => 'Business Growth',
                'short_label' => 'Business',
                'color' => 'var(--cat-biz)',
                'gradient' => 'linear-gradient(135deg,#1a0d05 0%,#3a1e08 100%)',
                'icon' => 'growth',
                'topic_description' => 'Positioning, conversion, pricing, and digital strategy ideas for service businesses that want better clients.',
            ],
            'industry-guides' => [
                'slug' => 'industry',
                'label' => 'Industry Guides',
                'short_label' => 'Industry',
                'color' => 'var(--cat-industry)',
                'gradient' => 'linear-gradient(135deg,#0e2a14 0%,#1a4a22 100%)',
                'icon' => 'industry',
                'topic_description' => 'Deep guides for industries like law, clinics, accounting, and real estate built around how buyers actually choose.',
            ],
            'mobile-apps' => [
                'slug' => 'mobile',
                'label' => 'Mobile Apps',
                'short_label' => 'Mobile',
                'color' => 'var(--cat-mobile)',
                'gradient' => 'linear-gradient(135deg,#020c18 0%,#06182a 100%)',
                'icon' => 'mobile',
                'topic_description' => 'Product planning, app architecture, React Native decisions, and mobile UX for practical business apps.',
            ],
            'cloud-infrastructure' => [
                'slug' => 'cloud',
                'label' => 'Cloud & Infra',
                'short_label' => 'Cloud',
                'color' => 'var(--cat-cloud)',
                'gradient' => 'linear-gradient(135deg,#0a0f1a 0%,#101830 100%)',
                'icon' => 'cloud',
                'topic_description' => 'Hosting, deployments, uptime, observability, and cloud decisions that keep modern websites fast and stable.',
            ],
        ];

        return $map[$slug] ?? [
            'slug' => $slug ?: 'all',
            'label' => $category?->name ?? 'Uncategorized',
            'short_label' => $category?->name ?? 'Post',
            'color' => 'var(--gold)',
            'gradient' => 'linear-gradient(135deg,#0c1f3a 0%,#162952 100%)',
            'icon' => 'spark',
            'topic_description' => 'Practical strategy, design, and development notes from the i2Medier team.',
        ];
    }

    private function extractTableOfContents(array $content): array
    {
        return collect($content['blocks'] ?? [])
            ->filter(fn (array $block): bool => ($block['type'] ?? null) === 'header' && (int) (($block['data']['level'] ?? 0)) === 2)
            ->values()
            ->map(function (array $block, int $index) {
                $title = trim(html_entity_decode(strip_tags((string) ($block['data']['text'] ?? ''))));

                return [
                    'id' => \App\View\Components\EditorjsRenderer::headingId($title . '-' . $index),
                    'title' => $title,
                    'label' => $index < 9 ? str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) : '→',
                ];
            })
            ->filter(fn (array $item) => filled($item['id']) && filled($item['title']))
            ->all();
    }
}
