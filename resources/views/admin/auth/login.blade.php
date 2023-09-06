<x-admin-guest-layout>
<div class="login-box">
        <div class="login-logo">
            <a><b>DilSe</b> Admin Panel</a>
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
        <button type="button" id="btnToggle" class="toggle_button" passwordType="password"><i id="eyeIcon" passwordType="password" class="fa fa-eye " style="font-size: 16px;"></i></button>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>
  <div class="row">
<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Sign In</button>
</div>
</div>

<div class="col-8">
<p class="mb-1">
                @if (Route::has('admin.password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('admin.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                </p>


</div>
</form>


            </div>

        </div>
    </div>
</x-admin-guest-layout>
