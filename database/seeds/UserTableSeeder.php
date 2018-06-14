<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "id" => 1,
            "name" => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make('admin123'),
            "authority" => "admin",
        ]);
    }
}
