<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IPFilter extends Model
{
    public static function IPList($active=null, $list_type=null, $invisible=null){
        if(Cache::has(config('cache.prefix')."ip_filter".$list_type.$active.$invisible)){
            return Cache::get(config('cache.prefix')."ip_filter".$list_type.$active.$invisible);
        }
        else{
            return Cache::rememberForever(config('cache.prefix')."ip_filter".$list_type.$active.$invisible, function()use($list_type, $active, $invisible){
                $query = DB::table('ip_filter');
                if($list_type!=null){
                    $query->where('list_type', $list_type);
                }
                if($active!=null){
                    $query->where('active', $active);
                }
                if($invisible!=null){
                    $query->where('invisible', $invisible);
                }
                return $query->get();
            });
        }
    }
}
