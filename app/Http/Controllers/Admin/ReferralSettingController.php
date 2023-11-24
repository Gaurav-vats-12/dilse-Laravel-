<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting\Referral;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;

class ReferralSettingController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
       return view('admin.page.setting.reffralsetting');
    }

  /**
   * @param Request $request
   * @param $id
   * @return RedirectResponse
   */
  public function update(Request $request  , $id): RedirectResponse
    {
        Referral::findOrFail($id)->update(array('referral_status' => $request->referral_status ?? 0,
            'referral_points' => $request->referral_points ?? 0,
            'referral_privacy_policy' => $request->referral_privacy_policy,
            'updated_at' => now()));
        notyf()->duration(2000)->addSuccess('Referral Setting  Updated');
        return redirect()->route('admin.setting.referral');

    }

}
