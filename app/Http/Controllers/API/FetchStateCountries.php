<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\State;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class FetchStateCountries extends Controller
{

  /**
   * @param Request $request
   * @return Application|View|Factory|\Illuminate\Contracts\Foundation\Application
   */
  public function fetch_state_cities(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $selected = $request->selected_billing_state;

        if ($request->type === 'country') {
            $state = State::where("country_id", $request->country_uid)->get(["name", "id"]);
        }
        return view('ajax.state_dependency_country_list', compact('state', 'selected'));
    }
}
