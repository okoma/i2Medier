<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\PortfolioProject;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $blogUpdatedAt = BlogPost::query()
            ->published()
            ->max('updated_at');

        $portfolioUpdatedAt = PortfolioProject::query()
            ->published()
            ->max('updated_at');

        $sitemaps = collect([
            [
                'loc' => route('sitemap.static'),
                'lastmod' => $this->formatDate(max($blogUpdatedAt, $portfolioUpdatedAt)),
            ],
            [
                'loc' => route('sitemap.blog'),
                'lastmod' => $this->formatDate($blogUpdatedAt),
            ],
            [
                'loc' => route('sitemap.portfolio'),
                'lastmod' => $this->formatDate($portfolioUpdatedAt),
            ],
        ])->values();

        return response()
            ->view('sitemap.sitemap-index', ['sitemaps' => $sitemaps])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function static(): Response
    {
        $blogUpdatedAt = BlogPost::query()
            ->published()
            ->max('updated_at');

        $portfolioUpdatedAt = PortfolioProject::query()
            ->published()
            ->max('updated_at');

        $urls = $this->staticUrls($blogUpdatedAt, $portfolioUpdatedAt)
            ->merge($this->industryUrls())
            ->values();

        return response()
            ->view('sitemap.urlset', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function blog(): Response
    {
        $urls = $this->blogCategoryUrls()
            ->merge($this->blogPostUrls())
            ->values();

        return response()
            ->view('sitemap.urlset', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function portfolio(): Response
    {
        $urls = $this->portfolioUrls()
            ->values();

        return response()
            ->view('sitemap.urlset', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    private function staticUrls(?string $blogUpdatedAt, ?string $portfolioUpdatedAt): Collection
    {
        return collect([
            $this->makeUrl(route('site.home'), max($blogUpdatedAt, $portfolioUpdatedAt), 'weekly', '1.0'),
            $this->makeUrl(route('site.about'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.contact'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.start'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services'), null, 'weekly', '0.9'),
            $this->makeUrl(route('site.services.web-design'), null, 'weekly', '0.9'),
            $this->makeUrl(route('site.services.wordpress-development'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.laravel-development'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.mobile-app-development'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.search-optimization'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.ui-ux-design'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.business-email-setup'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.services.email-deliverability'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.services.white-label'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.website-maintenance'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.services.wordpress-maintenance'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.services.cloud-architecture'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.services.saas-application'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.services.ecommerce-website'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.who-we-help'), null, 'monthly', '0.8'),
            $this->makeUrl(route('site.lawyer'), null, 'monthly', '0.8'),
            $this->makeUrl(route('portfolio.index'), $portfolioUpdatedAt, 'weekly', '0.8'),
            $this->makeUrl(route('blog.index'), $blogUpdatedAt, 'daily', '0.9'),
            $this->makeUrl(route('tools.hub'), null, 'weekly', '0.8'),
            $this->makeUrl(route('tools.seo-audit'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.cost-calculator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.business-name-generator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.domain-name-generator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.website-brief-generator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.whatsapp-link-generator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.email-deliverability-checker'), null, 'monthly', '0.7'),
            $this->makeUrl(route('tools.invoice-generator'), null, 'monthly', '0.7'),
            $this->makeUrl(route('site.terms'), null, 'yearly', '0.3'),
            $this->makeUrl(route('site.privacy'), null, 'yearly', '0.3'),
        ]);
    }

    private function industryUrls(): Collection
    {
        return collect([
            'accounting-firm-website-design',
            'clinic-website-design',
            'real-estate-website-design',
            'consulting-firm-website-design',
            'construction-company-website-design',
            'engineering-firm-website-design',
            'architecture-firm-website-design',
            'school-website-design',
            'church-website-design',
            'hotel-website-design',
            'restaurant-website-design',
            'beauty-wellness-website-design',
            'fitness-website-design',
            'cleaning-company-website-design',
            'logistics-company-website-design',
            'travel-agency-website-design',
            'ecommerce-website-design',
            'fashion-brand-website-design',
            'event-planner-website-design',
            'photography-website-design',
            'personal-brand-website-design',
            'marketing-agency-website-design',
        ])->map(fn (string $industry) => $this->makeUrl(
            route('site.services.web-design.industry', ['industry' => $industry]),
            null,
            'monthly',
            '0.8'
        ));
    }

    private function blogCategoryUrls(): Collection
    {
        return BlogCategory::query()
            ->whereHas('posts', fn ($query) => $query->published())
            ->withMax(['posts' => fn ($query) => $query->published()], 'updated_at')
            ->orderBy('name')
            ->get()
            ->map(fn (BlogCategory $category) => $this->makeUrl(
                route('blog.category', ['category' => $category->slug]),
                $category->posts_max_updated_at,
                'weekly',
                '0.7'
            ));
    }

    private function blogPostUrls(): Collection
    {
        return BlogPost::query()
            ->published()
            ->with('category')
            ->latest('published_at')
            ->get()
            ->map(fn (BlogPost $post) => $this->makeUrl(
                route('blog.show', [
                    'category' => $post->category?->slug ?? 'uncategorized',
                    'post' => $post->slug,
                ]),
                $post->updated_at,
                'monthly',
                '0.7'
            ));
    }

    private function portfolioUrls(): Collection
    {
        return PortfolioProject::query()
            ->published()
            ->latest('published_at')
            ->get()
            ->map(fn (PortfolioProject $project) => $this->makeUrl(
                route('portfolio.show', ['portfolioProject' => $project->slug]),
                $project->updated_at,
                'monthly',
                '0.7'
            ));
    }

    private function makeUrl(string $location, mixed $lastModifiedAt, string $changeFrequency, string $priority): array
    {
        return [
            'loc' => $location,
            'lastmod' => $this->formatDate($lastModifiedAt),
            'changefreq' => $changeFrequency,
            'priority' => $priority,
        ];
    }

    private function formatDate(mixed $value): ?string
    {
        if (blank($value)) {
            return null;
        }

        return Carbon::parse($value)->toAtomString();
    }
}
