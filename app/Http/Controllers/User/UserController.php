<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserAddress\UpdateStroreRequest as UpdateStroreRequestAlias;
use App\Models\User\UserAddressManage as UserAddressManageAlias;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory as FactoryAlias;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application as ApplicationAlias1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function dashboard(){
       return view('user.dashboard');
    }

    /**
     * @return Application|FactoryAlias|View
     */
    public function user_address(){
        return view('user.profile.profileaddressedit');
    }

    /**
     * @param UpdateStroreRequestAlias $request
     * @return void
     */
    public function update_address(UpdateStroreRequestAlias $request ){
//        dd($request->all());

        $user_address = [
            'user_id' => $request->login_uer_id,
            'billing_address1' => $request->billing_address_1,
            'billing_address2' => $request->billing_address_2,
            'countryId' => $request->billing_country,
            'statesid' => $request->billing_state,
            'city' => $request->billing_city,
            'pincode' => $request->billing_postcode,
            'created_at' => now(),
            'updated_at' => now()
        ];
        UserAddressManageAlias::updateOrCreate(['user_id'=>$request->login_uer_id],$user_address );
        return Redirect::back()->withToastSuccess('User  Address Updated');
    }
}
