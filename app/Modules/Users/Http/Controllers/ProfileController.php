<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Users\Http\Requests\ProfileUpdateRequest;
use App\Modules\Users\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
  /**
   * Display the user's profile form.
   * @param Request $request
   * @return View
   */


    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user('user'),
        ]);
    }

  /**
   * Update the user's profile information.
   * @param ProfileUpdateRequest $request
   * @return RedirectResponse
   */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::guard('user')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();
        notyf()->duration(2000) ->addSuccess('Your Profile Update Successfully');
        return redirect()->route('user.profile.edit');
    }

  /**
   * Delete the user's account.
   * @param Request $request
   * @return RedirectResponse
   */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password:user'],
        ]);
        $user = $request->user('user');
        Auth::guard('user')->logout();
        $user->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/user');
    }

  /**
   * @return \Illuminate\Contracts\View\View|Application|Factory|\Illuminate\Contracts\Foundation\Application
   */
  public function confirmPass(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
      return view('user.profile.partials.update-password-form');
    }
}
