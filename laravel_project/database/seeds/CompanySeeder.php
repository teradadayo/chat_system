<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => "terada",
            'open_years' => "1986", // ★
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
