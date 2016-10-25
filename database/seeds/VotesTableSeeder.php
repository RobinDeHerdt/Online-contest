<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('votes')->insert([
            'creation_id' => '1',
            'user_id' => '2',
        ]);

        DB::table('votes')->insert([
            'creation_id' => '2',
            'user_id' => '4',
        ]);
    }
}
