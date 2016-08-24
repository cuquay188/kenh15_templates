<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\CategoryAdvance;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomePageController extends Controller
{
    public function getHomePage()
    {
        $articles_top = Article::skip(0)->take(5)->get();
        $article_first = Article::orderBy('id', 'desc')->first();
        $articles_latest = Article::orderBy('id', 'desc')->skip(1)->take(4)->get();
        $hot_categories = CategoryAdvance::where('is_hot', '1')->get();
        return view('homepage.index.index', [
            'articles_top' => $articles_top,
            'article_first' => $article_first,
            'articles_latest' => $articles_latest,
            'hot_categories' => $hot_categories
        ]);
    }

    public function getArticle($id)
    {
        $article = Article::find($id);
        $related_articles = Article::where('category_id', $article->category->id)->orderBy('id', 'desc')->take(6)->get();
        return view('homepage.articles.single_article', [
            'related_articles' => $related_articles,
            'article' => $article
        ]);
    }

    public function getSingleCategory($id)
    {
        $category = Category::find($id);
        $article_first = Article::where('category_id', $id)->orderBy('id', 'desc')->first();
        $hot_articles = Article::where('category_id', $id)->orderBy('id', 'desc')->take(6)->skip(1)->get();
        $related_articles = Article::where('category_id', $id)->orderBy('id', 'desc')->take(10)->skip(7)->get();
        return view('homepage.categories.single_category', [
            'related_articles' => $related_articles,
            'hot_articles' => $hot_articles,
            'article_first' => $article_first,
            'category' => $category
        ]);
    }
}
