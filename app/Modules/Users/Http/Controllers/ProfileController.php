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
        $request->user('user')->fill($request->validated());

        if ($request->user('user')->isDirty('email')) {
            $request->user('user')->email_verified_at = null;
        }

        $request->user('user')->save();

        return Redirect::route('user.profile.edit')->with('status', 'profile-updated');
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
}
