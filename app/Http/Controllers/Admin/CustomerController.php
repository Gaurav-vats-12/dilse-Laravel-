<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Users\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
  /**
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $user = User::orderBy('name')->get();
        return view('admin.page.customer.index', ['user' => $user]);
    }

  /**
   * @param string $id
   * @return View|\Illuminate\Foundation\Application|Factory|Application
   */
  public function show(string $id): View|\Illuminate\Foundation\Application|Factory|Application
    {

        return view('admin.page.customer.view')->with('user', User::findOrFail($id));
    }

  /**
   * @param Request $request
   * @param string $id
   * @return RedirectResponse
   */
  public function control(Request $request, string $id): RedirectResponse
    {
        $User = User::findOrFail($id);
        $staus = $User->status;
        if ($staus == 1) {
            User::where('id', $id)->where('status', 1)->update(['status' => 0]);
            Auth::guard('user')->logout();

            notyf()->duration(2000)->addSuccess('Customer successfully banned');

            return redirect()->route('admin.manage-customer.index');

        } else {
            User::where('id', $id)->where('status', 0)->update(['status' => 1]);
            notyf()->duration(2000)->addSuccess('Customer successfully unbanned');
            return redirect()->route('admin.manage-customer.index');

        }
    }
}
