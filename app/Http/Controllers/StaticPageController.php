<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class StaticPageController extends Controller
{
    /**
     * Display homepage.
     */
    public function home(Request $request): View|Response
    {
        if (view()->exists('home')) {
            return view('home');
        }

        return view('welcome');
    }

    /**
     * Display about page.
     */
    public function about(Request $request): View|Response
    {
        if (view()->exists('about')) {
            return view('about');
        }

        return response("About Army Dog Center Pakistan", 200);
    }

    /**
     * Display contact page.
     */
    public function contact(Request $request): View|Response
    {
        if (view()->exists('contact')) {
            return view('contact');
        }

        return response("Contact Army Dog Center Pakistan", 200);
    }
}
