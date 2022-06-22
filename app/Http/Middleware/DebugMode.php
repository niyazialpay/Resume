<?php

namespace App\Http\Middleware;

use App\Models\IPFilter;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\IpUtils;

class DebugMode
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next):mixed
    {
        $ips = IPFilter::IPList(true, 'whitelist', true);
        $status = false;
        foreach($ips as $IP) {
            if (IpUtils::checkIp($request->getClientIp(), $IP->ip_address)) {
                $status = true;
                break;
            }
        }
        if($status)
            Config::set('app.debug', true);
        return $next($request);
    }
}
