<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Privacy extends Model
{
    public static function getPrivacy()
    {
        if(Cache::has(config('settings.cache_prefix').'privacy')) {
            $privacy = Cache::get(config('settings.cache_prefix') . 'privacy');
        }
        else {
            $privacy = Cache::rememberForever(config('settings.cache_prefix').'privacy', function() {
                return DB::table('privacy')->first();
            });
        }
        return $privacy;
    }
}
