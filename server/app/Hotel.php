<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Hotel extends Model {

    protected $table = "hoteles";

    public static function getHotel() {
        
        // $id = Auth::user()->id;
        $res = DB::table('hoteles')
            ->select('*')
            // ->where('id', '=', $id)
            ->get();
        
        return $res;
    }

    public static function getID($id) {
        
        $res = DB::table('hoteles')
            ->select('*')
            ->where('id', '=', $id)
            ->get();

        return $res;
    }
}
