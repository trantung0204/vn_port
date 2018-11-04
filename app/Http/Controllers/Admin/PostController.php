<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Post;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * DataTables get list post
     */
    public static function getListPosts()
    {
        $posts = Post::orderBy('id', 'desc')->get();

        return DataTables::of($posts)
            ->addIndexColumn()
            ->addColumn('action', function ($posts) {
                $txt = "";

                $txt .= '<button data-id="' . $posts->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title=""/><i class="fa fa-pencil" aria-hidden="true"></i></button>';
                $txt .= '<button data-id="' . $posts->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title=""/><i class="fa fa-trash" aria-hidden="true"></i></button>';

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
            ->rawColumns(['action'])
            ->toJson();
    }
}
