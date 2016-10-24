<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleView;
use App\Category;
use App\CategoryAdvance;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomePageController extends Controller
{
    public function getIndex(){
        return view('homepage.index');
    }
    public function getHomePage()
    {
        return view('homepage.home.index');
    }

    public function getArticle()
    {
        return view('homepage.articles.single_article');
    }

    public function getSingleCategory()
    {
        return view('homepage.categories.single_category');
    }

    public function getTag()
    {
        return view('homepage.tags.single_tag');
    }
}