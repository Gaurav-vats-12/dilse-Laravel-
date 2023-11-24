<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use App\Modules\Users\Http\Requests\Auth\LoginRequest;
use http\Url;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {


        session()->put('url_session',url()->previous());
        return view('user.auth.login');
    }

  /**
   * Handle an incoming authentication request.
   * @param LoginRequest $request
   * @return RedirectResponse
   * @throws ValidationException
   * @throws ContainerExceptionInterface
   * @throws NotFoundExceptionInterface
   */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();
        $request->session()->regenerate();
        session()->put('url_session',url()->previous());
        $login_redirct = session()->get('login_redirct');
        if($login_redirct){
            return redirect()->intended($login_redirct);
        }
        return redirect()->intended('/');
    }

  /**
   * Destroy an authenticated session.
   * @param Request $request
   * @return RedirectResponse
   */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.dashboard');
    }
}
