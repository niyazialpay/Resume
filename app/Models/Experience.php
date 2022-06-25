<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Experience extends Model
{
    public static function getExperience()
    {
        if(Cache::has(config("settings.cache_prefix").'experience')){
            return Cache::get(config("settings.cache_prefix").'experience');
        }
        else{
            return Cache::rememberForever(config("settings.cache_prefix").'experience', function () {
                return DB::table('work_experience')->orderBy('start_date', 'desc')->get();
            });
        }
    }
}
