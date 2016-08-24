<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_article');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'tag_article');
    }

    public function articleView()
    {
        return $this->hasMany('App\ArticleView');
    }

    public function comments()
    {
        return $this->hasMany('App\ArticleComment');
    }

    public function shorten_title($char)
    {
        $title = $this->title;
        if (strlen($title) > $char) {
            for($i=$char-1;$i>=0;$i--)
                if($title[$i]==' '){
                    return substr($title, 0, $i) . '...';
                }
        }
        return $this->title;
    }
    public function getContentHeader(){
        $start = strpos($this->content,'<h2>');
        $end = strpos($this->content,'</h2>',$start+4)+5;
        return substr($this->content,$start,$end);
    }
}
