<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function articles()
    {
        return $this->belongsToMany('App\Article', 'author_article');
    }
    public function user(){
        return $this->belongsTo('\App\User');
    }
}
