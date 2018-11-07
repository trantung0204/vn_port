<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['title','slug', 'thumbnail', 'description', 'status', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
