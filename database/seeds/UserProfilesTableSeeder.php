<?php

use Illuminate\Database\Seeder;

class UserProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 55;

        for ($i = 1; $i < $limit; $i++) {
            DB::table('user_profiles')->insert([
				'user_id' => $i,
				'title' => $faker->title,
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'born' => $faker->dateTimeBetween('-30 years','-20 years')->getTimestamp(),
				'gender' => $faker->randomElement(['M','F']),
				'city_id' => $faker->numberBetween(3171,3175),
				'address' => $faker->address,
				'image_profile' => $faker->numberBetween(1,10).".jpg",
				'image_cover' => $faker->numberBetween(1,10).".jpg",
				'quote' => ucwords($faker->sentence(6)),
				'bio' => $faker->paragraph(2),
				'phone' => $faker->phoneNumber,
				'email' => $faker->email,
				'website' => $faker->domainName,
				'created_at' => time(),
				'updated_at' => time(),
			]);
        }
    }
}
