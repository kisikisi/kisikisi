<?php

use Illuminate\Database\Seeder;

class ScholarshipsTableSeeder extends Seeder
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
            DB::table('scholarships')->insert([
                'slug' => $faker->slug,
                'title' => ucwords($faker->sentence(6)),
                'instance' => $faker->company,
                'deadline' => $faker->dateTimeBetween('+7 days','+14 days')->getTimestamp(),
                'image_content' => $faker->numberBetween(1,5).'.jpg',
                'image_cover' => $faker->numberBetween(1,3).'.jpg',
                'content' => $faker->paragraph(6),
                'requirement' => $faker->paragraph(6),
                'registration' => $faker->paragraph(6),
                'link' => $faker->url,
                'status' => 1,
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1,
            ]);
        }
    }
}
