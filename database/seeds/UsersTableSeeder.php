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

		$faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $faker->userName,
                'email' => $faker->email,
				'password' => Hash::make('123'),
				'picture' => $faker->numberBetween(1,10).".jpg",
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }
}
