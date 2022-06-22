<?php

namespace App\Http\Middleware;

use App\Models\IPFilter;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\IpUtils;

class UnderConstruction
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
        if($request->is('panel','panel/*')){
            return $next($request);
        }
        else{
            if(config('app.debug')){
                $ips = IPFilter::IPList(true, 'whitelist');
                $status = false;
                foreach($ips as $IP) {
                    if (IpUtils::checkIp($request->getClientIp(), $IP->ip_address)) {
                        $status = true;
                        break;
                    }
                }
                if(!$status){
                    if(Session::has('admin_login')){
                        return $next($request);
                    }
                    else{
                        return response()->view('under_construction');
                    }
                }
                else{
                    return $next($request);
                }
            }
            else{
                return $next($request);
            }
        }
    }
}
