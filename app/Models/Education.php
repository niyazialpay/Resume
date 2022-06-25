<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Education extends Model
{
    public static function getEducation()
    {
        if(Cache::has(config("settings.cache_prefix").'education')){
            return Cache::get(config("settings.cache_prefix").'education');
        }
        else{
            return Cache::rememberForever(config("settings.cache_prefix").'education', function () {
                return DB::table('education')->orderBy('start_date', 'desc')->get();
            });
        }
    }
}
