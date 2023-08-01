<x-admin-guest-layout>
<div class="login-box">
    <div class="login-logo">
    <img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : '' }}" alt="">
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">  {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
        <form method="POST" action="{{ route('admin.password.email') }}"> @csrf
        <div class="mb-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
       </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">  {{ __('Email Password Reset Link') }}</button>
            </div>
          </div>
        </form>
        <p class="mt-3 mb-1">
          <a href="{{route('admin.login')}}">Login</a>
        </p>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</x-admin-guest-layout>
