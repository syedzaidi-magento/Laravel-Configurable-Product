<?php

use Illuminate\Database\Seeder;

class LegsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('legs')->insert(['leg_name' => 'Chrome Plated']);
        DB::table('legs')->insert(['leg_name' => 'Brass Plated']);
        DB::table('legs')->insert(['leg_name' => 'Matte Black']);
        DB::table('legs')->insert(['leg_name' => 'Brushed Nickel']);
        DB::table('legs')->insert(['leg_name' => 'Brass Plated']);
        DB::table('legs')->insert(['leg_name' => 'Unfinished GunMetal']);
        DB::table('legs')->insert(['leg_name' => 'Oiled Walnut']);
        DB::table('legs')->insert(['leg_name' => 'Natural Oak']);
        DB::table('legs')->insert(['leg_name' => 'Painted Black']);
    }
}
