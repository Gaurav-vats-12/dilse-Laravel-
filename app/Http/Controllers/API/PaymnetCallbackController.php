<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymnetCallbackController extends Controller
{
    /**
     * @param Request $request
     * @param string $id
     * @return void
     */

    public function callback(Request $request ){
        return 'data';
//        dd('Data');

  }
}
