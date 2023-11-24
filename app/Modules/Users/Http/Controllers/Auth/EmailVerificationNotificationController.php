<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
  /**
   * Send a new email verification notification.
   * @param Request $request
   * @return RedirectResponse
   */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user('user')->hasVerifiedEmail()) {
            return redirect()->intended('/user');
        }

        $request->user('user')->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
