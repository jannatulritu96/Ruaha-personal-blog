<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded = ['id'];
    public function relPost()
    {
        return $this->hasmany('App\Post');
    }
}
