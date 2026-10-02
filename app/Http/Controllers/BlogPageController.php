<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class BlogPageController extends Controller
{
    /**
     * Display paginated blog posts archive.
     */
    public function index(Request $request): View|Response
    {
        $posts = Page::blogs()
            ->published()
            ->latest('published_at')
            ->paginate(12);

        if (view()->exists('blog.index')) {
            return view('blog.index', compact('posts'));
        }

        return response("Blog Archive - Page " . $posts->currentPage(), 200);
    }

    /**
     * Display a single blog article.
     */
    public function show(string $slug): View|Response
    {
        $post = Page::blogs()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        if (view()->exists('blog.show')) {
            return view('blog.show', compact('post'));
        }

        return response("Blog Post: " . e($post->title), 200);
    }
}
