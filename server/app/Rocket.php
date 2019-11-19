<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Rocket extends Model
{
    public static  function isFavorite($rocket_id) {
        
        $id = Auth::user()->id;
        
        $res = DB::table('favorite_rockets')
                    ->where('user_id', '=', $id)
                    ->where('rocket_id', '=', $rocket_id)
                    ->count();
        
        return $res;
    }
    
    public static function addFavorite($rocket_id) {
        
        $id = Auth::user()->id;
        
        $res = DB::table('favorite_rockets')->insert([
            'user_id' => $id,
            'rocket_id' => $rocket_id
        ]);
        
        return $res;
    }
    
    public static function removeFavorite($rocket_id) {
        
        $id = Auth::user()->id;
        
        $res = DB::table('favorite_rockets')
                    ->where('user_id', '=', $id)
                    ->where('rocket_id', '=', $rocket_id)
                    ->delete();
        
        return $res;
    }
}
