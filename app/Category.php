<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function articles(){
        return $this->hasMany('App\Article');
    }
    public function advance(){
        return $this->hasOne('App\CategoryAdvance');
    }
}
