<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Robin',
            'last_name' => 'De Herdt',
            'date_of_birth' => '1995/08/10',
            'email' => 'robindh@gmail.com',
            'ip_adress' => '127.0.0.1',
            'password' => bcrypt('123456'),
        ]);
    }
}
