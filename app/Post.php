<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function relUser()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function relCategory()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
