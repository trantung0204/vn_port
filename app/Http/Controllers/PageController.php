<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Post;
use App\User;

class PageController extends Controller
{
    public function index()
    {
    	$posts=Post::orderBy('id','desc')->paginate(8);
        return view('pages/home',compact('posts'));
    }
    public function post($id)
    {
    	$post=Post::find($id);
    	$author=User::find($post->user_id)->name;
        return view('pages/tinmoi',compact('post','author'));
    }
}
