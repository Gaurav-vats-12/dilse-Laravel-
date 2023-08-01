<x-admin-guest-layout>
<div class="login-box">
        <div class="login-logo">
        <img src="{{ setting('logo') != null ? url('/storage/site/logo/'.setting('logo').'') : '' }}" alt="">
        </div>

        <div class="card">
            <div class="card-body login-card-body">
            <form method="POST" action="{{ route('admin.login') }}">  @csrf
  <div class="mb-3">
  <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
  </div>
  <div class="mb-3">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="form-control" type="password" name="password" autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>
  <div class="mb-3 form-check">
  <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
  </div>
  <button type="submit" class="btn btn-primary">   {{ __('Log in') }}</button>
</form>

                <p class="mb-1">
                @if (Route::has('admin.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                </p>

            </div>

        </div>
    </div>
</x-admin-guest-layout>
