<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\State;
use Illuminate\Http\Request;

class FetchStateCountries extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\JsonResponse
     */

    public function fetch_state_cities(Request $request)
    {
        $selected = $request->selected_billing_state;

        if ($request->type === 'country') {
            $state = State::where("country_id", $request->country_uid)->get(["name", "id"]);
        }

        return view('ajax.state_dependency_country_list', compact('state', 'selected'));
    }
}
