<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Post;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/post/index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try { 
            // dd($request);
            $temp = [];
            if($file=$request->file('thumbnail')){
                $temp['thumbnail'] = Storage::disk('local')->put('public/post-thumbnail', $file);
            }
            $temp['title'] = $request['title'];
            $temp['slug'] = str_slug($request['title']).time();
            $temp['description'] = $request['description'];
            $temp['content'] = $request['content'];
            $temp['user_id'] = Auth::user()->id;
            $temp['status'] = 1;
            $post=Post::create($temp);
            $post->update(['slug'=>str_slug($post->title).strtotime($post->created_at)]);
            DB::commit();
            return response()->json(['err' => false, 'msg' => 'Thêm mới thành công']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
        return response()->json(['data' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();

        try { 
            // dd($request);
            $post=Post::find($request['id']);
            $temp = [];
            if($file=$request->file('thumbnail')){
                $temp['thumbnail'] = Storage::disk('local')->put('public/post-thumbnail', $file);
            }
            $temp['title'] = $request['title'];
            $temp['slug'] = str_slug($request['title']).strtotime($post->created_at);
            $temp['description'] = $request['description'];
            $temp['content'] = $request['content'];
            $post->update($temp);

            DB::commit();
            return response()->json(['err' => false, 'msg' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['err' => true, 'msg' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            Post::find($id)->delete();

            DB::commit();
            return response()->json([ 'err' => false, 'msg' =>  'Đã xoá bài viết']);

        } catch (\Exception $e) {
            return response()->json(['err'  =>  true, 'msg' =>  $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id,$status)
    {
        $post=Post::find($id);
        if ($status==0) {
            $post->update(['status'=>1]);
        }else{
            $post->update(['status'=>0]);
        }
    }

    /**
     * DataTables get list post
     */
    public static function getListPosts()
    {
        $posts = Post::orderBy('id', 'desc')->with('user')->get();

        return DataTables::of($posts)
            ->addIndexColumn()
            ->addColumn('action', function ($posts) {
                $txt = "";

                $txt .= '<button data-id="' . $posts->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="" style="margin-right:10px;"/><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>';
                $txt .= '<button data-id="' . $posts->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title=""/><i class="fa fa-trash" aria-hidden="true"></i> Xoá</button>';

                return $txt;
            })
            ->editColumn('created_at', function ($posts) {
                return date('H:i | d-m-Y', strtotime($posts->created_at));
            })
            ->editColumn('status', function ($posts){
                if ($posts->status==0) {
                    return "Công khai";
                }
                return "Nội bộ";
            })
            ->editColumn('thumbnail', function ($posts){

                return '<img style="width:70px;" src="'.Storage::url($posts->thumbnail).'">';
            })
            ->editColumn('user_id', function ($posts){

                return $posts->user->name;
            })
            ->editColumn('status', function ($posts){
                if ($posts->status==0) {
                    return '<i class="fa fa-check-circle-o btn-public btn-status" data-id="'.$posts->id.'" aria-hidden="true"></i>';
                }
                return '<i class="fa fa-circle-o btn-private btn-status" data-id="'.$posts->id.'" aria-hidden="true"></i>';
            })
            ->rawColumns(['action','thumbnail','status'])
            ->toJson();
    }
}
