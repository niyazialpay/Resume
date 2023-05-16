<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class References extends Model
{
    public static function getReferences()
    {
        if(Cache::has(config("settings.cache_prefix").'references')){
            return Cache::get(config("settings.cache_prefix").'references');
        }
        else{
            return Cache::rememberForever(config("settings.cache_prefix").'references', function () {
                return DB::table('work_references')->get();
            });
        }
    }
}
