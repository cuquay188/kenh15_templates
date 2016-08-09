<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller
{
    public function getHomePage()
    {
        $articles = Article::all();
        return view('view.info.home_page', [
            'articles' => $articles
        ]);
    }
}
