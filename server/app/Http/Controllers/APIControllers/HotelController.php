<?php

namespace App\Http\Controllers\APIControllers;

use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelController extends Controller {
    
    function __construct() {
        // $this->middleware('auth:api');
    }
    
    public function index() {
        // error_log('axant');
        $result = Hotel::getHotel();
        return response($result);
    }
    
    public function getID($id) {
        $result = Hotel::getID($id);
        return response($result);
    }
}
