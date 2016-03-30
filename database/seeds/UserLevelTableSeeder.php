<?php

use Illuminate\Database\Seeder;

class UserLevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_level')->insert([
            ['id' => 1, 'name' => 'admin'],
            ['id' => 2, 'name' => 'operator'],
            ['id' => 3, 'name' => 'moderator'],
            ['id' => 4, 'name' => 'user'],
        ]);
    }
}
