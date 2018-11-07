<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public static function getListUsers()
    {
        $users = User::orderBy('id', 'desc')->get();

        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('action', function ($user) {
                $txt = "";

                $txt .= '<button data-id="' . $user->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="" style="margin-right:10px;"/><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>';
                $txt .= '<button data-id="' . $user->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title=""/><i class="fa fa-trash" aria-hidden="true"></i> Xoá</button>';

                return $txt;
            })
            ->editColumn('created_at', function ($user) {
                return date('H:i | d-m-Y', strtotime($user->created_at));
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/users/index');
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
            if($file=$request->file('link')){
                $temp['link'] = Storage::disk('local')->put('public/users-files', $file);
            }
            $temp['name'] = $request['name'];
            $temp['status'] = 1;
            Charge::create($temp);
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
        $charge=Charge::find($id);
        return response()->json(['data' => $charge]);
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
            $charge=Charge::find($request['id']);
            $temp = [];
            if($file=$request->file('link')){
                $temp['link'] = Storage::disk('local')->put('public/users-files', $file);
            }
            $temp['name'] = $request['name'];
            $charge->update($temp);

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
            Charge::find($id)->delete();

            DB::commit();
            return response()->json([ 'err' => false, 'msg' =>  'Đã xoá biểu cước']);

        } catch (\Exception $e) {
            return response()->json(['err'  =>  true, 'msg' =>  $e->getMessage()]);
        }
    }
}
