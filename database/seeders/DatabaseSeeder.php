<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for($i=0;$i<7;$i++) {
            Category::create([
                'name' => $faker->word,
            ]);
        }
        for($i=0;$i<10;$i++){
           $post= Post::create([
                'title'=>$faker->word,
                'description'=>$faker->sentence,
            ]);
           $post->categories()->attach(Category::all()->where('id',random_int(1,6))->first->id);
        }
        }

}
