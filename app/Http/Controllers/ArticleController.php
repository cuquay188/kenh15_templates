<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Category;
use App\Author;
use App\Tag;

class ArticleController extends Controller
{
    public function getArticleList()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);

        $articles = Article::all();
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.list.articles', [
            'articles' => $articles,
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function getSingleArticle($url)
    {
        if (!Auth::check())
            return redirect()->back()->with(['fail' => 'Required login.']);

        $article = Article::where('url', $url)->first();
        return view('admin.articles.single.article', [
            'article' => $article
        ]);
    }

    public function getCreateArticle()
    {
        if (!Auth::check())
            return redirect()->route('login')->with(['fail' => 'Required login.']);
        if (!Auth::getUser()->author && !Auth::getUser()->admin)
            return redirect()->back()->with(['fail' => 'You dont have permission to submit an article']);
        $authors = Author::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.create.create_article', [
            'authors' => $authors,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function postValidateArticle(Request $request)
    {
        $this->validate($request, [
            'create_article_title' => 'required|between:5,150',
            'create_article_data' => 'required|min:30',
            'create_article_category_id' => 'numeric',
            'create_article_authors' => 'required'
        ]);
        if($request->is_continue){
            return $this->postCreateArticle($request);
        }
        return response()->json([
            'message' => 'Validate successfully',
        ]);
    }

    public function postCreateArticle(Request $request)
    {
        $title = $request->create_article_title;
        $content = $request->create_article_data;
        $category_id = $request->create_article_category_id;
        $img_url = $request->create_article_img_url;

        $article = new Article();
        $article->title = $title;
        $article->url = $this->convert_title_to_url($title);
        $article->img_url = $img_url ? $img_url : $this->make_article_img_url($content);
        $article->content = $content;
        $article->category_id = $category_id;
        $article->save();

        $article = Article::orderBy('id', 'desc')->first();
        $tags = $request->create_article_tags;
        $authors = $request->create_article_authors;
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
        return response()->json([
            'message' => 'Create successfully',
        ]);
    }

    public function postDeleteArticle(Request $request)
    {
        $id = $request->article_id;
        Article::where('id', $id)->delete();
        return redirect()->back();
    }

    public function postUpdateArticle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|between:5,150',
            'data' => 'required|min:30',
            'category_id' => 'numeric'
        ]);

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
            DB::table('tag_article')->where('article_id', $id)->delete();
            foreach ($tags as $tag) {
                $article->tags()->attach($tag);
            }
        }
        if (!empty($authors)) {
            DB::table('author_article')->where('article_id', $id)->delete();
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
        DB::table('tag_article')->where('article_id', $article_id)->where('tag_id', $tag_id)->delete();
        return redirect()->back();
    }

    public function postDeleteAuthorArticle(Request $request)
    {
        $author_id = $request->author_id;
        $article_id = $request->article_id;
        DB::table('author_article')->where('article_id', $article_id)->where('author_id', $author_id)->delete();
        return redirect()->back();
    }

    public function getArticleJSON($id)
    {
        $article = Article::find($id);
        $article->shorten_title = $article->shorten_title(100);

        $tags = array();
        foreach($article->tags as $tag)
            array_push($tags,$tag->id);
        $article->tags = $tags;

        $authors = array();
        foreach($article->authors as $author)
            array_push($authors,$author->id);
        $article->authors = $authors;
        return $article;
    }

    public function refreshDatabase()
    {
        foreach (Article::all() as $article) {
            Article::where('id', $article->id)->update(['url' => $this->convert_title_to_url($article->title)]);
            Article::where('id', $article->id)->update(['img_url' => $this->make_article_img_url($article->content)]);
        }
        return redirect()->route('article');
    }

    static function convert_title_to_url($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = str_replace(" ", "-", str_replace("?", "", $str));
        return $str;
    }

    static function make_article_img_url($str)
    {
        $pos = strpos($str, "src=");
        $end = strpos($str, "\"", $pos + 5) - $pos - 5;
        $str = substr($str, $pos + 5, $end);
        return $str;
    }
}
