<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class settings extends Model
{
   public static function getSiteSettings()
   {
      if(Cache::has(config('settings.cache_prefix').'site_settings')) {
          $settings = Cache::get(config('settings.cache_prefix') . 'site_settings');
      }
      else {
          $settings = Cache::rememberForever(config('settings.cache_prefix').'site_settings', function() {
                return DB::table('site_settings')->leftJoin('smtp_settings', 'site_settings.id', '=', 'smtp_settings.settings_id')->first();
            });
      }
      return $settings;
   }
}
