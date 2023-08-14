<?php

namespace App\Http\Controllers\API;
use App\Models\{Country, State, City};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FetchStateCountries extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function fetch_state_cities(Request $request){
        if($request->type ==='country'){
            $data['states'] = State::where("country_id",$request->country_uid)->get(["name", "id"]);
        }
        return response()->json($data);

   }
}
