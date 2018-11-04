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
    	$introduce=OptionValue::where('option_id',2)->where('value',0)->first()->name;
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
    	$introduce=OptionValue::where('option_id',2)->where('value',0)->update(['name'=> $request->introduce]);
    	return redirect()->route('introduce.index')->with('success_msg', 'Cập nhật thành công');
    }
}
