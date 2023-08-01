<x-admin-guest-layout>
<div class="login-box">
  <div class="login-logo">
  <img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : '' }}" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
      @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
    <form method="POST" action="{{ route('admin.verification.send') }}">  @csrf

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block"> {{ __('Resend Verification Email') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login.html">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</x-admin-guest-layout>
