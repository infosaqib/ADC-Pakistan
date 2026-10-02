<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class ServicePageController extends Controller
{
    /**
     * Display service directory hub.
     */
    public function index(Request $request): View|Response
    {
        $services = Page::services()->published()->orderBy('title')->get();

        if (view()->exists('services.index')) {
            return view('services.index', compact('services'));
        }

        return response("Service Directory Hub", 200);
    }

    /**
     * Display an individual city service page.
     */
    public function show(string $slug): View|Response
    {
        $page = Page::services()
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        if (view()->exists('services.show')) {
            return view('services.show', compact('page'));
        }

        return response("Service: " . e($page->title), 200);
    }
}
