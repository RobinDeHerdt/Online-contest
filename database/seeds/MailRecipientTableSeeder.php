<?php

use Illuminate\Database\Seeder;

class MailRecipientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mailrecipients')->insert([
            'email' => 'robindh95@gmail.com',
        ]);
    }
}
