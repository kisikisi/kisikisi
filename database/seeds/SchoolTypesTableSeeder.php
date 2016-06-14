<?php

use Illuminate\Database\Seeder;

class SchoolTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('school_types')->insert([
                'name' => $faker->word,
                'alias' => $faker->word,
                'created_at' => time(),
                'updated_at' => time(),
                'created_by' => 1,
                'modified_by' => 1
            ]);
        }
    }
}
