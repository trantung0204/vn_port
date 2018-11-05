<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\OptionValue;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins/contact/edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    	$contact=OptionValue::where('option_id',1)->get();
        return response()->json(['contact' => $contact[0]->name,'map'=> $contact[1]->name], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    	// dd($request->introduce);
    	OptionValue::where('option_id',1)->where('value',0)->update(['name'=> $request->contact]);
    	OptionValue::where('option_id',1)->where('value',1)->update(['name'=> $request->map]);
    	return redirect()->route('contact.index')->with('success_msg', 'Cập nhật thành công');
    }
}
