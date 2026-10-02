<?php

namespace App\Http\Middleware;

use App\Services\DomainRoutingService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HandleLegacyRedirects
{
    protected DomainRoutingService $routingService;

    public function __construct(DomainRoutingService $routingService)
    {
        $this->routingService = $routingService;
    }

    /**
     * Handle an incoming request.
     *
     * Evaluates legacy URL patterns (.php, legacy subfolder paths, query params)
     * and redirects directly to the canonical target in a single HTTP 301 hop.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $destination = $this->routingService->resolveLegacyDestination($request);

        if ($destination) {
            return redirect($destination, 301);
        }

        return $next($request);
    }
}
