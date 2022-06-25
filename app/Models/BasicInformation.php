<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class BasicInformation extends Model
{
    public static function getBasicInformation()
    {
        if(Cache::has(config("settings.cache_prefix").'basic_information')){
            return Cache::get(config("settings.cache_prefix").'basic_information');
        }
        else{
            return Cache::rememberForever(config("settings.cache_prefix").'basic_information', function () {
                return DB::table('basic_information')->leftJoin('social_network', 'basic_information.id', '=', 'social_network.user_id')->join('privacy', 'basic_information.id', '=', 'privacy.user_id')->first();
            });
        }
    }
}
