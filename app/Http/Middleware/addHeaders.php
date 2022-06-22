<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class addHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $response = $next($request);
        $response->header('x-frame-options', 'SAMEORIGIN');
        $response->header('referrer-policy', 'same-origin');
        $response->header('x-xss-protection', '1; mode=block');
        $response->header('x-content-type-options', 'nosniff');
        $response->header('strict-transport-security', 'max-age=31536000; includeSubDomains; preload; always;');
        return $response;
    }
}
