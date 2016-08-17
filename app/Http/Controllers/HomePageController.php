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
        $articles_top = Article::skip(0)->take(5)->get();
        $article_first = Article::orderBy('id', 'desc')->first();
        $articles_latest = Article::orderBy('id', 'desc')->skip(1)->take(4)->get();
        $categories = Category::all();
        return view('homepage.index.index', [
            'articles_top' => $articles_top,
            'article_first' => $article_first,
            'articles_latest' => $articles_latest,
            'categories' => $categories
        ]);
    }

    public function getArticle($id)
    {
        $categories = Category::all();
        $article = Article::find($id);
        $related_articles = Article::where('category_id', $article->category->id)->orderBy('id', 'desc')->take(6)->get();
        return view('homepage.articles.single_article', [
            'related_articles' => $related_articles,
            'article' => $article,
            'categories' => $categories
        ]);
    }

    public function getCategoriesMenu()
    {
        $categories = Category::all();
        return view('homepage.categories.menu', [
            'categories' => $categories
        ]);
    }
}
