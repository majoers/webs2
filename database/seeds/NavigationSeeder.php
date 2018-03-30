<?php

use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("navigations")->insert([
        "label" => "Home",
        "link" => "/home",
        "parent" => 0,
        "sort" => 0
    ]);

        DB::table("navigations")->insert([
        "label" => "Catalog",
        "link" => "/catalog",
        "parent" => 0,
        "sort" => 0
    ]);

        DB::table("navigations")->insert([
            "label" => "About",
            "link" => "/about",
            "parent" => 0,
            "sort" => 0
        ]);


    }
}
