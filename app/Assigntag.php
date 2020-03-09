<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assigntag extends Model
{
    protected $table= 'assign_tags';
    protected $fillable = ['post_id','tag_id'];

    public function relPost()
    {
        return $this->belongsTo('App\Post','post_id','id');
    }
    public function tag_details()
    {
        return $this->hasOne('App\Tag','id','tag_id');
    }
}
