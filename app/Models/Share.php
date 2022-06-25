<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Share extends Model
{
    public static function getShareToken($token)
    {
        $cache_key = config('settings.cache_prefix').'share_token_' . $token;
        if (Cache::has($cache_key)){
            $share_token = Cache::get($cache_key);
        }
        else{
            $share_token = Cache::remember($cache_key, 1440, function () use ($token) {
                return DB::table('share_tokens')->where('token', $token)->where(function($query){
                    $query->where('expire_date', '>', date('Y-m-d'))
                        ->orWhere('expire_date', null);
                    })->first();
            });
        }
        return $share_token;
    }
}
