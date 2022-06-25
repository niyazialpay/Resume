<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Portfolio extends Model
{
    public static function getPortfolio()
    {
        if(Cache::has(config("settings.cache_prefix").'portfolio')){
            return Cache::get(config("settings.cache_prefix").'portfolio');
        }
        else{
            return Cache::rememberForever(config("settings.cache_prefix").'portfolio', function () {
                return DB::table('portfolio')->get();
            });
        }
    }
}
