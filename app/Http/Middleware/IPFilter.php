<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use \App\Models\IPFilter as IPFilterModel;
use Symfony\Component\HttpFoundation\IpUtils;

class IPFilter
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $ips = IPFilterModel::IPList(true, 'whitelist');
        $status = false;
        foreach($ips as $IP) {
            if (IpUtils::checkIp($request->getClientIp(), $IP->ip_address)) {
                $status = true;
                break;
            }
        }
        if($status)
            return $next($request);
        else{
            abort(404);
        }
    }
}
