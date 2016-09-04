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
        return view('admin.articles.list.articles');
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

    public function validateArticle(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|between:5,150',
            'content' => 'required|min:30',
            'category' => 'required|numeric',
            'authors' => 'required'
        ]);
    }

    public function postCreateArticle(Request $request)
    {
        $this->validateArticle($request);

        $title = $request->title;
        $content = $request->content;
        $category_id = $request->category;
        $img_url = $request->img_url;

        $article = new Article();
        $article->title = $title;
        $article->url = $this->convert_title_to_url($title);
        $article->img_url = $img_url ? $img_url : $this->make_article_img_url($content);
        $article->content = $content;
        $article->category_id = $category_id;
        $article->save();

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
        return response()->json([
            'message' => 'Create successful.',
            'article' => $this->getArticleJSON($article->id)
        ]);
    }

    public function postRemoveArticle(Request $request)
    {
        $id = $request->id;
        $article = $this->getArticleJSON($id);
        Article::where('id', $id)->delete();
        return response()->json([
            'message' => 'Remove successful.',
            'article' => $article
        ]);
    }

    public function postUpdateArticle(Request $request)
    {
        $this->validateArticle($request);

        $id = $request->id;
        $title = $request->title;
        $content = $request->content;
        $category_id = $request->category;
        $url = $this->convert_title_to_url($title);
        $img_url = $request->img_url ? $request->img_url : $this->make_article_img_url($content);

        Article::where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id,
            'url' => $url,
            'img_url' => $img_url
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

        return response()->json([
            'message' => 'Update successful.',
            'article' => $this->getArticleJSON($id)
        ]);
    }

    public function postRemoveTag(Request $request)
    {
        $tag_id = $request->tag_id;
        $article_id = $request->article_id;
        $tag = Tag::find($tag_id);
        DB::table('tag_article')->where('article_id', $article_id)->where('tag_id', $tag_id)->delete();
        return response()->json([
            'message' => 'Delete ' . $tag->name . ' successful.',
            'article'=>$this->getArticleJSON($article_id)
        ]);
    }

    public function postRemoveAuthor(Request $request)
    {
        $author_id = $request->author_id;
        $article_id = $request->article_id;
        $author = Author::find($author_id);
        DB::table('author_article')->where('article_id', $article_id)->where('author_id', $author_id)->delete();
        return response()->json([
            'message' => 'Delete' . $author->user->name . ' successful.',
            'article'=>$this->getArticleJSON($article_id)
        ]);
    }

    public function getArticleContentJSON($id)
    {
        $content = Article::find($id)->content;
        return response()->json([
            'message' => 'Get Content successful.',
            'content' => $content
        ]);
    }

    public function getArticleJSON($id = null)
    {
        if ($id) {
            $article = Article::find($id);

            $tags = array();
            $authors = array();
            foreach (DB::table('tag_article')->where('article_id', $article->id)->get() as $tag)
                array_push($tags, $tag->tag_id);
            foreach (DB::table('author_article')->where('article_id', $article->id)->get() as $author)
                array_push($authors, $author->author_id);

            $article = [
                'id' => $article->id,
                'updated_at' => $article->updated_at,
                'url' => $article->url,
                'title' => $article->title,
                'category_id' => $article->category->id,
                'tags_id' => $tags,
                'authors_id' => $authors
            ];

            return $article;
        } else {
            $articles = array();
            foreach (Article::orderBy('updated_at','desc')->get() as $article) {
                $tags = array();
                $authors = array();
                foreach (DB::table('tag_article')->where('article_id', $article->id)->get() as $tag)
                    array_push($tags, $tag->tag_id);
                foreach (DB::table('author_article')->where('article_id', $article->id)->get() as $author)
                    array_push($authors, $author->author_id);

                array_push($articles, [
                    'id' => $article->id,
                    'updated_at' => $article->updated_at,
                    'url' => $article->url,
                    'title' => $article->title,
                    'category_id' => $article->category->id,
                    'tags_id' => $tags,
                    'authors_id' => $authors
                ]);
            }

            return $articles;
        }
    }
    public function getContentJSON($id = null){
        if($id)
            return response()->json([
                'message' => 'Get Content Successful.',
                'content' => Article::find($id)->content
            ]);
        return response()->json([
            'message' => 'Unknown error.'
        ]);
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
        $str = str_replace(" ", "-", str_replace("?", "", str_replace(",", "", str_replace(".", "", str_replace(":", "", $str)))));
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
