<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\Author;
use App\Tag;

class ArticleController extends Controller
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

    public function postCreateArticle1(Request $request)
    {
        $title = $request->title;
        $content = $request->data;
        $category_id = $request->category_id;

        $article = new Article();
        $article->title = $title;
        $article->content = $content;
        $article->category_id = $category_id;
        $article->save();

        $article = Article::orderBy('id', 'desc')->first();
        $tags = $request->tags;
        $authors = $request->authors;
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $article->tags()->attach($tag);
            }
        }
        if (!empty($authors)) {
            foreach ($authors as $author) {
                $article->authors()->attach($author);
            }
        }
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

        Article::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id
        ]);
        $article = Article::find($id);
        $tags = $request->tags;
        $authors = $request->authors;
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $article->tags()->attach($tag);
            }
        }
        if (!empty($authors)) {
            foreach ($authors as $author) {
                $article->authors()->attach($author);
            }
        }

        return redirect()->back();
    }

    public function postDeleteTagArticle(Request $request)
    {
        $tag_id = $request->tag_id;
        $article_id = $request->article_id;
        DB::table('tag_article')->where('tag_id', $tag_id)->where('article_id', $article_id)->delete();
        return redirect()->back();
    }
}
