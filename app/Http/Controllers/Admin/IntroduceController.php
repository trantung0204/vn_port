<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\OptionValue;

class IntroduceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/introduce/edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	$introduce=OptionValue::where('option_id',2)->select('name')->get();
        return response()->json(['data' => $introduce], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	// dd($request->introduce);
        OptionValue::where('option_id',2)->where('value',0)->update(['name'=> $request->introduce]);
        OptionValue::where('option_id',2)->where('value',1)->update(['name'=> $request->history]);
        OptionValue::where('option_id',2)->where('value',2)->update(['name'=> $request->duty]);
        OptionValue::where('option_id',2)->where('value',3)->update(['name'=> $request->organization]);
        OptionValue::where('option_id',2)->where('value',4)->update(['name'=> $request->host]);
        OptionValue::where('option_id',2)->where('value',5)->update(['name'=> $request->stream]);
        OptionValue::where('option_id',2)->where('value',6)->update(['name'=> $request->bridge]);
        OptionValue::where('option_id',2)->where('value',7)->update(['name'=> $request->storage]);
        OptionValue::where('option_id',2)->where('value',8)->update(['name'=> $request->equipment]);
        OptionValue::where('option_id',2)->where('value',9)->update(['name'=> $request->degree]);
    	OptionValue::where('option_id',2)->where('value',10)->update(['name'=> $request->capacity]);
    	return redirect()->route('introduce.index')->with('success_msg', 'Cập nhật thành công');
    }
}
