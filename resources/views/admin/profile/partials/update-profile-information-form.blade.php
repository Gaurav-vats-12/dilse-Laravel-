<div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                    {{ __("Update your account's profile information ") }}
                    </h3>
                </div>

                <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">  @csrf  @method('patch')

                    <div class="card-body">
                        <div class="form-group">
                        <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="form-group">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" name="email" type="email" class="form-control"  readonly  :value="old('email', $user->email)" required autocomplete="username" />
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>


                    <div class="card-footer">
                    <div class="flex items-center gap-4">
            <x-primary-button class="btn btn-primary" >{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
                    </div>
                </form></div>
            </div>
