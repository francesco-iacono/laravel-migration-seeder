<?php

use Illuminate\Database\Seeder;
use App\Article;
use Faker\Generator as Faker;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $data = $faker->dateTime();

            $article = new Article();
            $article->title = $faker->sentence(4);
            $article->subtitle = $faker->sentence(8);
            $article->author = $faker->name(3);
            $article->text = $faker->text(800);
            $article->img_path = $faker->imageUrl(640, 480, 'food');
            $article->genre = $faker->word(10);
            $article->created_at = $data;
            $article->updated_at = $data;

            
            $article->save();
        }
    }
}
