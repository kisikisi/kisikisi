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
        	['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('secret')],   
        	['name' => 'manager', 'email' => 'manager@gmail.com', 'password' => Hash::make('secret')],   
        	['name' => 'member', 'email' => 'member@gmail.com', 'password' => Hash::make('secret')],   
        ]);
    }
}
