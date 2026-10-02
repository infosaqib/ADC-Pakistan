<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveTrailingSlash
{
    /**
     * Handle an incoming request.
     *
     * Canonicalizes URLs by removing trailing slashes on non-root paths.
     * Explicitly protects root ('/') to avoid infinite redirect loops.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->getPathInfo();

        if ($path !== '/' && str_ends_with($path, '/')) {
            $cleanPath = rtrim($path, '/');
            $queryString = $request->getQueryString();
            $target = $queryString ? "{$cleanPath}?{$queryString}" : $cleanPath;

            return redirect($target, 301);
        }

        return $next($request);
    }
}
