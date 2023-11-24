<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
  /**
   * Update the user's password.
   * @param Request $request
   * @return RedirectResponse
   */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password:user'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user('user')->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('message', 'User Password Successfully');
    }
}
