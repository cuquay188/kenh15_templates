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
    public function getHomePage()
    {
        /*Check match articles in: articles_top and articles_latest*/
        $articles = Article::orderBy('id', 'desc')->get();
        $articles_topview = ArticleView::orderBy('views', 'desc')->take(5)->get();
        $articles_top = array();
        for ($i = 0; $i < count($articles_topview); $i++) {
            $article_top = Article::where('id', $articles_topview[$i]->article_id)->first();
            array_push($articles_top, $article_top);
        }

        $mismatch_articles = array();
        $count = 0;
        for ($i = 0; $i < count($articles); $i++) {
            for ($j = 0; $j < count($articles_top); $j++) {
                if ($articles_top[$j]->id != $articles[$i]->id) {
                    $count++;
                }
            }
            if ($count == count($articles_top)) {
                array_push($mismatch_articles, $articles[$i]);
            }
            $count = 0;
        }

        $articles_latest = array();
        $article_first = array();
        for ($i = 0; $i < count($mismatch_articles); $i++) {
            if ($i == 0) {
                array_push($article_first, $mismatch_articles[$i]);
            } else {
                if ($i > 0 && $i < 5) {
                    array_push($articles_latest, $mismatch_articles[$i]);
                }
            }
        }
        /*End check*/

        $hot_categories = CategoryAdvance::where('is_hot', '1')->get();

        for ($i = 0; $i < count($hot_categories) - 1; $i++) {
            for ($j = $i + 1; $j < count($hot_categories); $j++) {
                if (count($hot_categories[$j]->category->articles) >= count($hot_categories[$i]->category->articles)) {
                    $temp = $hot_categories[$j];
                    $hot_categories[$j] = $hot_categories[$i];
                    $hot_categories[$i] = $temp;
                }
            }
        }

        return view('homepage.index.index', [
            'articles_top' => $articles_top,
            'article_first' => $article_first,
            'articles_latest' => $articles_latest,
            'hot_categories' => $hot_categories
        ]);
    }

    public function getArticle($url)
    {
        $article = Article::where('url', $url)->first();
        $article_view = ArticleView::where('article_id', $article->id)->first();
        $article_views = $article_view->views;
        $views = ArticleView::where('article_id', $article->id)->update(['views' => $article_views + 1]);
        $views_update = ArticleView::where('article_id', $article->id)->first();

        $related_articles = Article::where('category_id', $article->category->id)->orderBy('id', 'desc')->take(6)->get();
        return view('homepage.articles.single_article', [
            'related_articles' => $related_articles,
            'article' => $article,
            'views_update' => $views_update
        ]);
    }

    public function getSingleCategory($id)
    {
        $category = Category::find($id);

        /*Get Newest Article*/
        $article_first = Article::where('category_id', $id)->orderBy('id', 'desc')->first();
        /*End*/

        /*Get Hot Articles (Top view) by Category*/
        $articles_topview = ArticleView::orderBy('views', 'desc')->where('views', '<>', 0)->get();
        $hot_articles = array();
        for ($i = 0; $i < count($articles_topview); $i++) {
            $valid_article = [
                'id' => $articles_topview[$i]->article_id
            ];
            $article_top = Article::where($valid_article)->first();
            array_push($hot_articles, $article_top);
        }
        $hot_articles_by_category = array();
        if ($article_first) {
            for ($i = 0; $i < count($hot_articles); $i++) {
                if ($hot_articles[$i]->category->name == $article_first->category->name) {
                    array_push($hot_articles_by_category, $hot_articles[$i]);
                    if (count($hot_articles_by_category) == 10) {
                        break;
                    }
                }
            }
        } else {
            echo "Sorry! No Article";
        }
        /*End*/

        /*Related Articles (không trùng với tin đầu tiên)*/
        $related_articles = Article::where('category_id', $id)->orderBy('id', 'desc')->paginate(5);
        $mismatch_articles = array();
        for ($i = 0; $i < count($related_articles); $i++) {
            if ($related_articles[$i]->id != $article_first->id) {
                array_push($mismatch_articles, $related_articles[$i]);
            }
        }
        /*End*/

        return view('homepage.categories.single_category', [
            'related_articles' => $related_articles,
            'mismatch_articles' => $mismatch_articles,
            'hot_articles_by_category' => $hot_articles_by_category,
            'article_first' => $article_first,
            'category' => $category
        ]);
    }

    public function getTag($url)
    {
        $tag = Tag::where('url', $url)->first();
        $articles_by_tag = Article::whereHas('tags', function ($query) use ($tag){
            $query->where('tag_id', $tag->id);
        })->paginate(5);
        return view('homepage.tags.single_tag',[
            'articles_by_tag' => $articles_by_tag,
            'tag' => $tag,
        ]);
    }
}
