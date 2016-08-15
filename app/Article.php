<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'user_article');
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

}
