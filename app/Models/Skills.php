<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class Skills extends Model
{
    public static function getSkills()
    {
        if(Cache::has(config('settings.cache_prefix').'skills')) {
            $skills = Cache::get(config('settings.cache_prefix') . 'skills');
        }
        else {
            $skills = Cache::rememberForever(config('settings.cache_prefix').'skills', function() {
                return DB::table('skills')->get();
            });
        }
        return $skills;
    }
}
