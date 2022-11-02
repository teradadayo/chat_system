<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guests')->insert([
            'name' => "terada",
            'sex' => 2, // ★
            'image' => "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);




        DB::table('guests')->insert([
            'name' => "ra",
            'sex' => 1, // ★
            'image' => "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('guests')->insert([
            'name' => "tera",
            'sex' => 1, // ★
            'image' => "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('guests')->insert([
            'name' => "da",
            'sex' => 2, // ★
            'image' => "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('guests')->insert([
            'name' => "nya",
            'sex' => 2, // ★
            'image' => "",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);





















    }
}
