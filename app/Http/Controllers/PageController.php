<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Post;
use App\Admin\Charge;
use App\User;
use Auth;

class PageController extends Controller
{
    public function index()
    {
        $posts=Post::orderBy('id','desc')->where('status',0)->paginate(8);
        return view('pages/home',compact('posts'));
    }
    public function privatePost()
    {
    	$posts=Post::orderBy('id','desc')->where('status',1)->paginate(8);
        return view('pages/noibo',compact('posts'));
    }
    public function post($slug)
    {
        $post=Post::where('slug',$slug)->firstOrFail();
        if (($post->status==1)&&(!Auth::check())) {
            abort(404);
        }
        $author=User::find($post->user_id)->name;
        return view('pages/tinmoi',compact('post','author'));
    }
    public function charge()
    {
        $charges=Charge::orderBy('id','desc')->get();
        return view('pages/bieucuoc',compact('charges'));
    }
    // public function info($slug)
    // {
    // 	$charges=Charge::orderBy('id','desc')->get();
    //     return view('pages/bieucuoc',compact('charges'));
    // }
}
