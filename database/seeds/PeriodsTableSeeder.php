<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            'start_datetime' => '2016/10/27 00:30:00',
            'stop_datetime' => '2016/11/03 00:29:00',
        ]);
        DB::table('periods')->insert([
            'start_datetime' => '2016/11/03 00:30:00',
            'stop_datetime' => '2016/11/10 00:29:00',
        ]);
        DB::table('periods')->insert([
            'start_datetime' => '2016/11/10 00:30:00',
            'stop_datetime' => '2016/11/17 00:29:00',
        ]);
        DB::table('periods')->insert([
            'start_datetime' => '2016/11/17 00:30:00',
            'stop_datetime' => '2016/11/24 00:29:00',
        ]);
    }
}
