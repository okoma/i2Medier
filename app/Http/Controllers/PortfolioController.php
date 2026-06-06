<?php

namespace App\Http\Controllers;

use App\Models\PortfolioCategory;
use App\Models\PortfolioProject;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = PortfolioProject::query()
            ->published()
            ->with('categories')
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('published_at')
            ->get();

        $categories = PortfolioCategory::query()
            ->withCount(['projects' => fn ($q) => $q->published()])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('portfolio.index', [
            'projects'   => $projects,
            'categories' => $categories,
            'seo' => [
                'title' => 'Portfolio — i2Medier',
                'description' => 'See selected i2Medier work across web design, development, branding, and digital product delivery for businesses, nonprofits, and service brands.',
                'keywords' => 'web design portfolio, Laravel portfolio, WordPress portfolio, UI UX portfolio, agency work examples, i2Medier portfolio',
                'robots' => 'index, follow',
                'author' => 'i2Medier',
                'url' => route('portfolio.index'),
                'og_type' => 'website',
                'schema_type' => 'CollectionPage',
                'service_type' => null,
            ],
        ]);
    }

    public function preview(PortfolioProject $portfolioProject): View
    {
        $portfolioProject->load('categories');

        $relatedProjects = PortfolioProject::query()
            ->published()
            ->where('type', $portfolioProject->type)
            ->whereKeyNot($portfolioProject->getKey())
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('portfolio.show', [
            'project' => $portfolioProject,
            'relatedProjects' => $relatedProjects,
            'isPreview' => true,
            'seo' => $this->seoForProject($portfolioProject, true),
        ]);
    }

    public function show(PortfolioProject $portfolioProject): View
    {
        abort_unless(
            $portfolioProject->status === 'published' &&
            ($portfolioProject->published_at === null || $portfolioProject->published_at->lte(now())),
            404
        );

        $portfolioProject->load('categories');

        $relatedProjects = PortfolioProject::query()
            ->published()
            ->where('type', $portfolioProject->type)
            ->whereKeyNot($portfolioProject->getKey())
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('portfolio.show', [
            'project'         => $portfolioProject,
            'relatedProjects' => $relatedProjects,
            'seo' => $this->seoForProject($portfolioProject),
        ]);
    }

    private function seoForProject(PortfolioProject $project, bool $isPreview = false): array
    {
        $categoryNames = $project->categories->pluck('name')->filter()->implode(', ');
        $description = trim((string) ($project->summary ?: $project->description ?: 'Case study from i2Medier.'));

        if ($categoryNames !== '') {
            $description .= ' Categories: ' . $categoryNames . '.';
        }

        return [
            'title' => ($isPreview ? '[Preview] ' : '') . $project->title . ' — Case Study · i2Medier',
            'description' => $description,
            'keywords' => collect([
                $project->title,
                $project->client_name,
                $categoryNames,
                'i2Medier case study',
                'portfolio project',
            ])->filter()->implode(', '),
            'robots' => $isPreview ? 'noindex, nofollow' : 'index, follow',
            'author' => 'i2Medier',
            'url' => $isPreview
                ? route('portfolio.preview', ['portfolioProject' => $project->slug])
                : route('portfolio.show', ['portfolioProject' => $project->slug]),
            'og_type' => 'article',
            'schema_type' => 'CreativeWork',
            'service_type' => null,
        ];
    }
}
