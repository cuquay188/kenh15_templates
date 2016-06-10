<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use DB;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;


class PageController extends Controller
{
    public function getArticle()
    {
        $articles = Article::all();
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('article', [
            'articles' => $articles,
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags
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

    public function getTag()
    {
        $tags = Tag::all();
        return view('tag', ['tags' => $tags]);
    }

    public function getCreateArticle()
    {
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('create.create_article', [
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags
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

        $article = Article::orderBy('id', 'desc')->first();

//        $article->tags()->attach(1);  // gắn tag1 vào article cuối cùng
        $tags = $request->tags;
        if (!empty($tags))
//            for ($i=0;$i<count($tags);$i++)
//                $article->tags()->attach($tags[$i]);

            foreach ($tags as $tag)
                $article->tags()->attach($tag);

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

    public function getCreateTag()
    {
        return view('create.create_tag');
    }

    public function postCreateTag(Request $request)
    {
        $name = $request->name;
        $tag = new Tag();
        $tag->name = $name;
        $tag->save();
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
        $article = Article::find($id);
        $tags = $request->tags;
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $article->tags()->attach($tag);
            }
        }

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

    public function postUpdateTag(Request $request)
    {
        $id = $request->tag_id;
        $name = $request->name;
        Tag::where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->back();
    }

    public function postDeleteTag(Request $request)
    {
        $id = $request->tag_id;
        Tag::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postDeleteTagArticle(Request $request)
    {
        $tag_id=$request->tag_id;
        $article_id=$request->article_id;
        DB::table('tag_article')->where('tag_id', $tag_id)->where('article_id', $article_id)->delete();
        return redirect()->back();
    }
}

