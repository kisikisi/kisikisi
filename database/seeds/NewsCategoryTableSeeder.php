<?php

use Illuminate\Database\Seeder;

class NewsCategoryTableSeeder extends Seeder
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
            DB::table('news_categories')->insert([
                'slug' => $faker->slug,
                'name' => 'arbi',
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1
            ]);
        }
    }
}
