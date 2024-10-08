<?php

namespace App\Modules\Admins\Http\Controllers\Auth;

use App\Modules\Admins\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
  /**
   * Show the confirm password view.
   * @return View
   */
    public function show(): View
    {
        return view('admin.auth.confirm-password');
    }

  /**
   * Confirm the admin's password.
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('admin')->validate([
            'email' => $request->user('admin')->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('admin.auth.password_confirmed_at', time());

        return redirect()->intended('/admin');
    }
}
