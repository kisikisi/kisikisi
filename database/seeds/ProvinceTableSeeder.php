<?php

use Illuminate\Database\Seeder;
use App\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->delete();
        $json = File::get("database/data/provinces.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
          Province::create(array(
            'id' => $obj->id,
            'name' => $obj->name,
          ));
        }
    }
}
