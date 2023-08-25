<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;
class CustomerController extends Controller
{
    public function index()
    {
        $user = User::orderBy('name')->get();
        return view('admin.page.customer.index', ['user' => $user]);
    }
    public function show(string $id)
    {
        return view('admin.page.customer.view')->with('user',User::findOrFail($id));
    }
    public function control(string $id)
    {
        $User = User::findOrFail($id);
        $staus = $User->status;
        if($staus ==1){
            User::where('id',  $id)->where('status',1)->update([ 'status' =>0]);
          return redirect()->route('admin.manage-customer.index')->withWarning('Customer successfully banned',500);
         }else{
            User::where('id',  $id)->where('status',0)->update([ 'status' =>1]);
            return redirect()->route('admin.manage-customer.index')->withSuccess('Customer successfully unbanned',500);
             }
    }
}
