<?php

use Illuminate\Database\Seeder;

class CreationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('creations')->insert([
            'description' => 'Speeder sheep',
            'image_url' => 'img/creaties/1.jpg',
            'user_id' => '10',
        ]);

        DB::table('creations')->insert([
            'description' => 'Sporza',
            'image_url' => 'img/creaties/2.jpg',
            'user_id' => '20',
        ]);

        DB::table('creations')->insert([
            'description' => 'Lambo',
            'image_url' => 'img/creaties/3.png',
            'user_id' => '12',
        ]);

        DB::table('creations')->insert([
            'description' => 'Supersheep',
            'image_url' => 'img/creaties/4.jpg',
            'user_id' => '42',
        ]);

        DB::table('creations')->insert([
            'description' => 'Just trying to fit in',
            'image_url' => 'img/creaties/5.jpg',
            'user_id' => '14',
        ]);

        DB::table('creations')->insert([
            'description' => 'Again!?',
            'image_url' => 'img/creaties/6.jpg',
            'user_id' => '32',
        ]);

        DB::table('creations')->insert([
            'description' => 'Beard contest',
            'image_url' => 'img/creaties/7.jpg',
            'user_id' => '46',
        ]);


        DB::table('creations')->insert([
            'description' => '8.5',
            'image_url' => 'img/creaties/8.png',
            'user_id' => '51',
        ]);
    }
}
