<?php

namespace App\Modules\Users\Http\Controllers\Auth;

use App\Modules\Users\Http\Controllers\Controller;
use App\Modules\Users\Http\Requests\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user('user')->hasVerifiedEmail()) {
            return redirect()->intended('/user?verified=1');
        }

        if ($request->user('user')->markEmailAsVerified()) {
            event(new Verified($request->user('user')));
        }

        return redirect()->intended('/user?verified=1');
    }
}
