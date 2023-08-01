<x-admin-guest-layout>
<div class="login-box">
  <div class="login-logo">
  <img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : '' }}" alt="">
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form method="POST" action="{{ route('admin.password.store') }}">  @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      <div class="mb-3">
      <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" readonly type="email" name="email" :value="old('email', $request->email)" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
       </div>
       <div class="mb-3">
       <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="form-control" type="password" name="password" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
       </div>
       <div class="mb-3">
       <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
       </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Change password</button>
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
