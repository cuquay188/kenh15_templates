<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    public function article()
    {
        return $this->belongsTo('App\ArticleView');
    }
}
