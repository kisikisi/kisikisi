<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
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
            DB::table('courses')->insert([
                'title' => ucwords($faker->sentence(6)),
                'slug' => $faker->slug,
				'author_id' => 1,
                'description' => $faker->paragraph(12),
                'duration' => $faker->randomNumber(2),
                'difficulty' => $faker->randomNumber(1),
                'image_cover' => $faker->numberBetween(1,10).'.jpg',
                'embed' => 'https://www.youtube.com/watch?v=l33hTAtJa0c',
                'status' => 1,
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1,

            ]);
		}
    }
}
