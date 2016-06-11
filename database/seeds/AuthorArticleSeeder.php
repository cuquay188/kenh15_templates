<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Article;

class AuthorArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::find(1)->articles()->attach(1);
        Author::find(1)->articles()->attach(3);
        Author::find(2)->articles()->attach(1);
        Author::find(2)->articles()->attach(2);
        Author::find(3)->articles()->attach(3);
        Author::find(3)->articles()->attach(1);
        Author::find(4)->articles()->attach(3);
        Author::find(4)->articles()->attach(3);

        Article::find(1)->authors()->attach(1);
        Article::find(1)->authors()->attach(1);
        Article::find(2)->authors()->attach(3);
        Article::find(2)->authors()->attach(4);
        Article::find(3)->authors()->attach(2);
        Article::find(3)->authors()->attach(3);
    }
}
