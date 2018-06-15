<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("subcategories")->insert([
               "name"=>"Detective"
        ]);

        DB::table("subcategories")->insert([
            "name"=>"Adventure"
        ]);

        DB::table("subcategories")->insert([
            "name"=>"Open world"
        ]);

        DB::table("subcategories")->insert([
            "name"=>"Platformer"
        ]);

        DB::table("subcategories")->insert([
            "name"=>"First-person shooter"
        ]);

        DB::table("categories")->insert([
            "name"=>"Book"
        ]);

        DB::table("categories")->insert([
            "name"=>"Game"
        ]);

        DB::table("categories")->insert([
            "name"=>"Film"
        ]);

        DB::table("products")->insert([
            "category_id" => 1,
            "subcategory_id" => 2,
            "name" => "The Lord of the Rings",
            "description" => "a tale about a ring that must be destroyed in order to give peace to the world",
            "price" => 25.99,
            "image" => "lordoftherings.jpg"

    ]);

        DB::table("products")->insert([
            "category_id" => 1,
            "subcategory_id" => 2,
            "name" => "Harry Potter and the chamber of secters",
            "description" => "a boy with a scar on his face must save hogwarts from a snake under the castle",
            "price" => 45.99,
            "image" => "harrypotterandthechamberofsecrets.jpg"

    ]);

        DB::table("products")->insert([
            "category_id" => 1,
            "subcategory_id" => 1,
            "name" => "Sherlock Holmes",
            "description" => "A man solves mysteries with his partner Watson",
            "price" => 15.59,
            "image" => "sherlockholmes.jpg"

        ]);

        DB::table("products")->insert([
            "category_id" => 2,
            "subcategory_id" => 3,
            "name" => "GTA 5",
            "description" => "You play as three dudes that shoot people, drive arround in fancy car and do more illigal stuff",
            "price" => 59.99,
            "image" => "gta5.jpg"

        ]);

        DB::table("products")->insert([
            "category_id" => 2,
            "subcategory_id" => 4,
            "name" => "Super Mario 64",
            "description" => "Princess invites plummer to caslte for cake. Princess get kidnapped. Plummer collects stars in order to save princess from big firebeating turtle guy.",
            "price" => 25.99,
            "image" => "supermario64.jpg"

        ]);

        DB::table("products")->insert([
            "category_id" => 2,
            "subcategory_id" => 5,
            "name" => "Call of Duty",
            "description" => "Generic shooter where the developers were proud that they had fish AI in their 2010 game. This is not special since Super Mario 64, which is a 1996 game, had this as well.",
            "price" => 0.59,
            "image" => "callofduty.jpg"

        ]);


        DB::table("products")->insert([
            "category_id" => 3,
            "subcategory_id" => 2,
            "name" => "Inception",
            "description" => "There is a dream, limbo and more!",
            "price" => 54.99,
            "image" => "inception.jpg"

        ]);

        DB::table("products")->insert([
            "category_id" => 3,
            "subcategory_id" => 2,
            "name" => "Pirates of the Carrabean",
            "description" => "Pirate, Jack Spearow, and more",
            "price" => 15.99,
            "image" => "piratesofthecaribbean.jpg"

        ]);

        DB::table("products")->insert([
            "category_id" => 3,
            "subcategory_id" => 2,
            "name" => "The Matrix",
            "description" => "Walls are very breakable!",
            "price" => 0.59,
            "image" => "matrix.jpg"

        ]);
    }
}
