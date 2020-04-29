<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = ['content', 'blog_id'];

    public function blog()
    {
        return $this->belongsTo('App\Blog', 'blog_id');
    }
}
