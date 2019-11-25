<?php

namespace App\Http\Controllers\API;

use App\Hotel;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class HotelController extends ApiController {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Hotel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $hotel = new Hotel($request-> hotels);
        $hotel->slug = $this->generateSlug($hotel->name);
        $hotel-> save();
        return $hotel;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel) {
        return $hotel;
    }

    public function findSlug($slug) {
        return Hotel::query()->where('slug', $slug)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel) {
        $hotel -> delete();
    }
}
