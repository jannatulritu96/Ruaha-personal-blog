<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded = ['id'];

    public function relPost()
    {
        return $this->hasMany('App\Post');
    }
    public function relSubCategory()
    {
        return $this->hasMany('App\SubCategory','cat_id','id');
    }
}
