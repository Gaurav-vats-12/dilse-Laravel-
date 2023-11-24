<?php

namespace App\Modules\Admins\Http\Controllers\Auth;

use App\Modules\Admins\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
  /**
   * Update the admin's password.
   * @param Request $request
   * @return RedirectResponse
   */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password:admin'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);
        $request->user('admin')->update([
            'password' => Hash::make($validated['password']),
        ]);
        notyf()->duration(2000) ->addSuccess('Password Update Successfully');
        return redirect()->route('admin.login');
    }
}
