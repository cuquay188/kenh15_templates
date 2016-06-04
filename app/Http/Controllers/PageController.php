<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;


class PageController extends Controller
{
    public function getIndex()
    {
        $articles = Article::all(); // SELECT * FROM articles
        return view("index", ['articles' => $articles]);
    }

    public function getAbout()
    {
        $authors = Author::all();
        return view('about', ['authors' => $authors]);
    }

    public function getCategory()
    {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function getCreateArticle()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('create.create_article', [
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function postCreateArticle(Request $request)
    {
        $title = $request->title;
        $content = $request->data;
        $author_id = $request->author_id;
        $category_id = $request->category_id;

        $article = new Article();
        $article->title = $title;
        $article->content = $content;
        $article->author_id = $author_id;
        $article->category_id = $category_id;
        $article->save();

        return $this->getCreateArticle();
    }

    public function getCreateCategory()
    {
        return view('create.create_category');
    }

    public function postCreateCategory(Request $request)
    {
        $name = $request->category;

        $category = new Category();
        $category->name = $name;

        $category->save();

        return $this->getCreateCategory();
    }

    public function getCreateAuthor()
    {
        return view('create.create_author');
    }

    public function postCreateAuthor(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;

        $author = new Author();
        $author->name = $name;
        $author->age = $age;
        $author->address = $address;

        $author->save();

        return $this->getCreateAuthor();
    }
}

