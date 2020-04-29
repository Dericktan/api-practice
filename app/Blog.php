<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'content'];

    public function comments()
    {
        return $this->hasMany('App\Comments', 'blog_id');
    }
}
