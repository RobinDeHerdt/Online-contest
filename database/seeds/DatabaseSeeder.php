<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CreationsTableSeeder::class);
        $this->call(VotesTableSeeder::class);
        $this->call(PeriodsTableSeeder::class);
        $this->call(ContestimagesTableSeeder::class);
    }
}
