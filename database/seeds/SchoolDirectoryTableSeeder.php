<?php

use Illuminate\Database\Seeder;

class SchoolDirectoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('school_directories')->insert([
                'school_type_id' => $faker->numberBetween(1,20),
                'npsn' => $faker->ean8,
                'name' => $faker->company,
                'slug' => $faker->slug,
                'address' => $faker->address,
                'map_address' => $faker->url,
                'postal' => $faker->postcode,
                'phone' => $faker->phoneNumber,
                'fax' => $faker->phoneNumber,
                'email' => $faker->email,
                'website' => $faker->domainName,
                'logo' => "1462882706.png",
                'image' => "1462730388.jpg",
                'city_id' => $faker->numberBetween(3171,3175),
                'description' => $faker->paragraph(6),
                'data' => $faker->paragraph(6)
            ]);
        }
    }
}
