<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContectController extends Controller
{
    public function store(Request $request){
        $validator = \Validator::make($request->all(), [
            'first_name' => 'required|max:50',
            'lastname' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|numeric|min:10',
            'message' => 'required|max:500'
               ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        dd('asdsad');

    }
}
