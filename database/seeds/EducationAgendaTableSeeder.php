<?php

use Illuminate\Database\Seeder;

class EducationAgendaTableSeeder extends Seeder
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
            DB::table('education_agendas')->insert([
                'agenda_category_id' => $faker->numberBetween(1,4),
                'title' => ucwords($faker->sentence(6)),
                'slug' => $faker->slug,
                'city_id' => $faker->numberBetween(3171,3175),
                'location' => $faker->address,
                'start_datetime' => $faker->dateTimeBetween('+7 days','+14 days')->getTimestamp(),
                'end_datetime' => $faker->dateTimeBetween('+15 days','+21 days')->getTimestamp(),
				'map_address' => $faker->url,
                'image_cover' => "1464068870.jpg",
                'image_content' => "1464068877.jpg",
                'content' => $faker->paragraph(12),
                'embed' => $faker->url,
                'status' => 1,
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1,

            ]);
        }
    }
}
