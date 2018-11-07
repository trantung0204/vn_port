<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Charge;
use Illuminate\Support\Facades\DB;
use DataTables;
use Auth;
use Illuminate\Support\Facades\Storage;

class ChargesController extends Controller
{
	public static function getListCharges()
    {
        $charges = Charge::orderBy('id', 'desc')->get();

        return DataTables::of($charges)
            ->addIndexColumn()
            ->addColumn('action', function ($charge) {
                $txt = "";

                $txt .= '<button data-id="' . $charge->id . '" href="#" type="button" class="btn btn-warning pd-0 wd-30 ht-20 btn-edit" data-tooltip="tooltip" data-placement="top" title="" style="margin-right:10px;"/><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</button>';
                $txt .= '<button data-id="' . $charge->id . '" href="#" type="button" class="btn btn-danger pd-0 wd-30 ht-20 btn-delete" data-tooltip="tooltip" data-placement="top" title=""/><i class="fa fa-trash" aria-hidden="true"></i> Xoá</button>';

                return $txt;
            })
            ->editColumn('created_at', function ($charge) {
                return date('H:i | d-m-Y', strtotime($charge->created_at));
            })
            ->editColumn('link', function ($charge) {

                return '<a href="'.Storage::url($charge->link).'" class="fa fa-cloud-download btn-download" aria-hidden="true"></a>';
            })
            ->editColumn('status', function ($charge){
                if ($charge->status==0) {
                    return '<i class="fa fa-toggle-off btn-off btn-status" data-id="'.$charge->id.'" aria-hidden="true"></i>';
                }
                return '<i class="fa fa-toggle-on btn-on btn-status" data-id="'.$charge->id.'" aria-hidden="true"></i>';
            })
            ->rawColumns(['action','status','link'])
            ->toJson();
    }
    public function status($id,$status)
    {
        $charge=Charge::find($id);
        if ($status==0) {
            $charge->update(['status'=>1]);
        }else{
            $charge->update(['status'=>0]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/charges/index');
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
                $temp['link'] = Storage::disk('local')->put('public/charges-files', $file);
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
                $temp['link'] = Storage::disk('local')->put('public/charges-files', $file);
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
