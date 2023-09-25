<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Users\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function control(Request $request ,string $id)
    {
        $User = User::findOrFail($id);
        $staus = $User->status;
        if($staus ==1){
            User::where('id',  $id)->where('status',1)->update([ 'status' =>0]);
            Auth::guard('user')->logout();

            notyf()->duration(2000) ->addSuccess('Customer successfully banned');

            return redirect()->route('admin.manage-customer.index');

         }else{
            User::where('id',  $id)->where('status',0)->update([ 'status' =>1]);
            notyf()->duration(2000) ->addSuccess('Customer successfully unbanned');
            return redirect()->route('admin.manage-customer.index');

             }
    }
}
