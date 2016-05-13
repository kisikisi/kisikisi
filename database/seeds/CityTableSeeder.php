<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->delete();
        $json = File::get("database/data/regencies.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          City::create(array(
            'id' => $obj->id,
            'province_id' => $obj->province_id,
            'name' => $obj->name,
          ));
        }
    }
}
