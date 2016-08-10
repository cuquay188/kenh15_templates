<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomePageController extends Controller
{
    public function getHomePage()
    {
        $articles_top = Article::skip(0)->take(10)->get();
        $article_first = Article::orderBy('id', 'desc')->first();
        $articles_latest = Article::orderBy('id', 'desc')->skip(1)->take(4)->get(); 
        $categories=Category::all();
        return view('view.info.home_page', [
            'articles_top' => $articles_top,
            'article_first' => $article_first,
            'articles_latest' => $articles_latest,
            'categories'=>$categories
        ]);
    }
}
