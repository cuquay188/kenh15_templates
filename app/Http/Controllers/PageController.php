<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;


class PageController extends Controller
{
    public function getArticle()
    {
        $articles = Article::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('article', [
            'articles' => $articles,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function getAuthor()
    {
        $authors = Author::all();
        return view('author', ['authors' => $authors]);
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

        return redirect()->back();
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

        return redirect()->back();
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

        return redirect()->back();
    }

    public function postDeleteArticle(Request $request)
    {
        $id = $request->article_id;
        Article::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateArticle(Request $request)
    {
        $id = $request->article_id;
        $title = $request->title;
        $content = $request->data;
        $category_id = $request->category_id;
        $author_id = $request->author_id;

        Article::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id,
            'author_id' => $author_id
        ]);

        return redirect()->back();
    }

    public function postDeleteAuthor(Request $request)
    {
        $id = $request->author_id;
        Author::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateAuthor(Request $request)
    {
        $id = $request->author_id;
        $name = $request->name;
        $age = $request->age;
        $address = $request->address;
        Author::where('id', $id)->update([
            'name' => $name,
            'age' => $age,
            'address' => $address
        ]);
        return redirect()->back();
    }

    public function postDeleteCategory(Request $request)
    {
        $id = $request->category_id;
        Category::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateCategory(Request $request)
    {
        $id = $request->category_id;
        $name = $request->name;
        Category::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }
}

