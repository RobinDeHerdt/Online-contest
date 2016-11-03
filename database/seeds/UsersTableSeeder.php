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
    	factory(App\User::class, 50)->create();

        DB::table('users')->insert([
            'first_name' => 'Robin',
            'last_name' => 'De Herdt',
            'date_of_birth' => '1995/08/10',
            'street_number' => 'Vlinderstraat 22',
            'postalcode' => '2220',
            'city' => 'Heist-op-den-Berg',
            'email' => 'admin@humo.be',
            'ip_adress' => '127.0.0.1',
            'isAdmin' => true,
            'password' => bcrypt('admin'),
        ]);
    }
}
