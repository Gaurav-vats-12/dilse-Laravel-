<?php

namespace App\Modules\Admins\Http\Controllers;
use App\Modules\Admins\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
class ProfileController extends Controller
{
  /**
   * Display the admin's profile form.
   * @param Request $request
   * @return View
   */
    public function edit(Request $request): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user('admin'),
        ]);
    }

  /**
   * Update the admin's profile information.
   * @param ProfileUpdateRequest $request
   * @return RedirectResponse
   */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user('admin')->fill($request->validated());

        if ($request->user('admin')->isDirty('email')) {
            $request->user('admin')->email_verified_at = null;
        }

        $request->user('admin')->save();
        notyf()->duration(2000) ->addSuccess('Admin Profile Update Successfully');
        return redirect()->route('admin.profile.edit');
    }

  /**
   * Delete the admin's account.
   * @param Request $request
   * @return RedirectResponse
   */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password:admin'],
        ]);
        $admin = $request->user('admin');
        Auth::guard('admin')->logout();
        $admin->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect::to('/admin');
    }


}
