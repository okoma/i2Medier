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
        ]);
    }
}
