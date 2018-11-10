<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Post;
use App\Admin\Charge;
use App\User;
use App\Admin\OptionValue;
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
    public function info($slug)
    {
        $title=null;
        $content_html=null;
        switch ($slug) {
            case 'lich-su':
                $title='Lịch sử hình thành';
                $content_html=OptionValue::where('option_id',2)->where('value',1)->first()->name;
                break;
            case 'tam-nhin':
                $title='Tầm nhìn và sứ mệnh';
                $content_html=OptionValue::where('option_id',2)->where('value',2)->first()->name;
                break;
            case 'to-chuc':
                $title='Sơ đồ tổ chức';
                $content_html=OptionValue::where('option_id',2)->where('value',3)->first()->name;
                break;
            case 'lanh-dao':
                $title='Ban lãnh đạo';
                $content_html=OptionValue::where('option_id',2)->where('value',4)->first()->name;
                break;
            case 'luong-lach':
                $title='Hệ thống luồng lạch';
                $content_html=OptionValue::where('option_id',2)->where('value',5)->first()->name;
                break;
            case 'cau-cang':
                $title='Cầu cảng';
                $content_html=OptionValue::where('option_id',2)->where('value',6)->first()->name;
                break;
            case 'kho-bai':
                $title='Kho bãi';
                $content_html=OptionValue::where('option_id',2)->where('value',7)->first()->name;
                break;
            case 'thiet-bi':
                $title='Hệ thống thiết bị';
                $content_html=OptionValue::where('option_id',2)->where('value',8)->first()->name;
                break;
            case 'chung-nhan':
                $title='Các giấy chứng nhận đã được cấp';
                $content_html=OptionValue::where('option_id',2)->where('value',9)->first()->name;
                break;
            case 'nang-luc':
                $title='Năng lực tiếp nhận tàu';
                $content_html=OptionValue::where('option_id',2)->where('value',10)->first()->name;
                break;
            case 'dich-vu':
                $title='Dịch vụ';
                $content_html=OptionValue::where('option_id',2)->where('value',11)->first()->name;
                break;
            
            default:
                abort(404);
                break;
        }
        return view('pages/gioithieu',compact('title','content_html'));
    }
}
