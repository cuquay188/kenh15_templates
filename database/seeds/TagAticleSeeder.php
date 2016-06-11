<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Article;

class TagAticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::find(1)->articles()->attach(2);
        Tag::find(1)->articles()->attach(3);
        Tag::find(1)->articles()->attach(1);
        Tag::find(2)->articles()->attach(2);
        Tag::find(2)->articles()->attach(1);
        Tag::find(2)->articles()->attach(3);
        Tag::find(3)->articles()->attach(1);
        Tag::find(3)->articles()->attach(2);


        Article::find(1)->tags()->attach(1);
        Article::find(1)->tags()->attach(2);
        Article::find(3)->tags()->attach(4);
        Article::find(1)->tags()->attach(6);
        Article::find(2)->tags()->attach(1);
    }
}
