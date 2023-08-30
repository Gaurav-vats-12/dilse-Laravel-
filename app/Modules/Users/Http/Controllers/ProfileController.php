<?php

namespace App\Modules\Users\Http\Controllers;

use App\Modules\Users\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('user.profile.edit', [
            'user' => $request->user('user'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::guard('user')->user();
        $user->display_name = $request->display_name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->route('user.profile.edit')->with('message','Profile Update Successfully');
    }

    /**
     * Delete the user's account.
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
    public function confirmPass(){
        //return view('user.update-password-form');
        return view('user.profile.partials.update-password-form');


    }
}
