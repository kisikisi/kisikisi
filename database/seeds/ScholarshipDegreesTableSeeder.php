<?php

use Illuminate\Database\Seeder;

class ScholarshipDegreesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('scholarship_degrees')->insert([
                'slug' => $faker->slug,
                'name' => ucwords($faker->word()),
				'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1,
            ]);
		}
    }
}
