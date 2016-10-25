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
            'description' => 'Sheep 1',
            'image_url' => 'img/creaties/1.jpg',
            'user_id' => '10',
        ]);

        DB::table('creations')->insert([
            'description' => 'Sheep 2',
            'image_url' => 'img/creaties/2.jpg',
            'user_id' => '20',
        ]);

        DB::table('creations')->insert([
            'description' => 'Sheep 3',
            'image_url' => 'img/creaties/3.png',
            'user_id' => '12',
        ]);

        DB::table('creations')->insert([
            'description' => 'Sheep 4',
            'image_url' => 'img/creaties/4.jpg',
            'user_id' => '42',
        ]);

        DB::table('creations')->insert([
            'description' => 'Sheep 5',
            'image_url' => 'img/creaties/5.jpg',
            'user_id' => '1',
        ]);
    }
}
