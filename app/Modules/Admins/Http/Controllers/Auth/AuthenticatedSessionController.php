<?php

namespace App\Modules\Admins\Http\Controllers\Auth;

use App\Modules\Admins\Http\Controllers\Controller;
use App\Modules\Admins\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as AuthAlias;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
  /**
   * Display the login view.
   * @return View
   */
    public function create(): View
    {
        return view('admin.auth.login');
    }

  /**
   * Handle an incoming authentication request.
   * @param LoginRequest $request
   * @return RedirectResponse
   * @throws ValidationException
   */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        notyf()->duration(2000) ->addSuccess('Login Successfully as a Admin');
        return redirect()->intended('/admin/dashboard');
    }

  /**
   * Destroy an authenticated session.
   * @param Request $request
   * @return RedirectResponse
   */
    public function destroy(Request $request): RedirectResponse
    {
        AuthAlias::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.dashboard');
    }
}
