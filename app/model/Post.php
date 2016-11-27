<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function admin()
    {
        return $this->belongsTo(\App\Admin::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }
}
