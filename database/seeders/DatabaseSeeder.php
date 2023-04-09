<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\ArticleTag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        ArticleTag::factory(20)->create();

        Article::factory(20)->create()->each(function ($article){
            $article->article_tags()->syncWithoutDetaching(ArticleTag::inRandomOrder()->take(rand(1, 10))->get());
        });
    }
}
