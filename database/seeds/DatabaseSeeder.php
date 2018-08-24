<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
	        'name' => 'admin',
            'email' => 'mih.chumak@yandex.ru',
            'password' => bcrypt('tkmQ1pwN'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('markers')->insert([
            'name' => 'Irkutsk',
            'description' => 'This is description of a marker',
            'pic' => 'This is a placeholder for a picture',
            'lat' => '47.417220',
            'lng' => '-1.219482',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('excursions')->insert([
            'name' => 'Irkutsk',
            'description' => 'This is description of a marker',
            'user_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
