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
        	['name' => 'admin', 'level_id' => '1', 'email' => 'admin@gmail.com', 'password' => Hash::make('secret')],   
        ]);
    }
}
