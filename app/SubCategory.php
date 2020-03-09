<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = ['id'];

    public function relCategory()
    {
        return $this->belongsTo('App\Category','cat_id','id');
    }

}
