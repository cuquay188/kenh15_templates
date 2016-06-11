<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article = new Article();
        $article->title='Lorem';
        $article->content='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniam';
//        $article->author_id=2;
        $article->category_id=2;
        $article->save(); 


        $article = new Article();
        $article->title='Lorem';
        $article->content='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniam';
//        $article->author_id=1;
        $article->category_id=1;
        $article->save(); 

        $article = new Article();
        $article->title='Lorem';
        $article->content='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniamLorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur dignissimos doloremque hic magnam minus
        odit placeat repellat sed totam vitae. Aut cupiditate dignissimos esse harum in, maxime minima nisi veniam';
//        $article->author_id=4;
        $article->category_id=1;
        $article->save(); 
        
    }
}
