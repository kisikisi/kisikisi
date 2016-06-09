<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(EducationNewsTableSeeder::class);
        $this->call(SchoolDirectoryTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(EducationAgendaTableSeeder::class);
    }
}
