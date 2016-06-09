<?php

use Illuminate\Database\Seeder;

class EducationNewsTableSeeder extends Seeder
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
            DB::table('education_news')->insert([
                'news_category_id' => $faker->numberBetween(3,50),
                'title' => ucwords($faker->sentence(6)),
                'slug' => $faker->slug,
                'image_cover' => "1464068870.jpg",
                'image_content' => "1464068877.jpg",
                'content' => $faker->paragraph(12),
                'date' => time(),
  				'author' => 1,
                'status' => 1,
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1,

            ]);
        }
    }
}
