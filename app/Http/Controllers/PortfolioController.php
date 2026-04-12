<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = PortfolioProject::query()
            ->published()
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->latest('published_at')
            ->get();

        return view('portfolio.index', [
            'inhouseProjects' => $projects->where('type', 'inhouse')->values(),
            'clientProjects' => $projects->where('type', 'client')->values(),
        ]);
    }

    public function show(PortfolioProject $portfolioProject): View
    {
        abort_unless(
            $portfolioProject->status === 'published' &&
            ($portfolioProject->published_at === null || $portfolioProject->published_at->lte(now())),
            404
        );

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
        ]);
    }
}
