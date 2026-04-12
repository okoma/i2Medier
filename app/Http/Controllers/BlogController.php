<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Contracts\View\View;

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
            ->with(['author', 'category'])
            ->when($featuredPost, fn ($query) => $query->whereKeyNot($featuredPost->getKey()))
            ->latest('published_at')
            ->paginate(9);

        return view('blog.index', compact('featuredPost', 'posts'));
    }

    public function show(BlogPost $post): View
    {
        abort_unless($post->status === 'published' && optional($post->published_at)->lte(now()), 404);

        $post->increment('view_count');
        $post->load(['author', 'category']);

        $relatedPosts = BlogPost::query()
            ->published()
            ->whereKeyNot($post->getKey())
            ->when($post->category_id, fn ($query) => $query->where('category_id', $post->category_id))
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
