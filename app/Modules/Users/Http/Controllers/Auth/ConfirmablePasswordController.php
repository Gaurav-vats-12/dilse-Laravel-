<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
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
        return view('user.auth.confirm-password');
    }

  /**
   * Confirm the user's password.
   * @param Request $request
   * @return RedirectResponse
   * @throws ValidationException
   */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('user')->validate([
            'email' => $request->user('user')->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }
        $request->session()->put('user.auth.password_confirmed_at', time());

        return redirect()->intended('/user');
    }
}
