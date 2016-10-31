<?php

use Illuminate\Database\Seeder;

class ContestimagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contestimages')->insert([
            'image_url' => 'img/contests/week-2.jpg',
            'isUsed' => false,
        ]);

        DB::table('contestimages')->insert([
            'image_url' => 'img/contests/week-1.jpg',
            'isUsed' => true,
        ]);
    }
}
