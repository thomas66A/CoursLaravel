<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        \App\Category::truncate();
        for($i=0;$i<10;$i++){
               $title = ucfirst(implode($faker->words(2)));
               \App\Category::create(array(
                   'category'=>$title
               ));
            }
    }
}
