<?php

use Illuminate\Database\Seeder;

class HotelsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        // DB::table('hoteles')->truncate();

        // DB::table('hoteles')->insert([
        //     'name' => 'test',
        //     'stars' => '5',
        //     'country' => 'alemania',
        //     'company' => 'alemania'
        // ]);

        // DB::table('hoteles')->insert([
        //     'name' => 'test2',
        //     'stars' => '3',
        //     'country' => 'francia',
        //     'company' => 'iberia'
        // ]);
        // $hotel = factory(App\Hotel::class)->make();
        // $hotel -> save();
        // error_log($hotel);
        factory(App\Hotel::class, 20)
            ->create();
        
    }
}
