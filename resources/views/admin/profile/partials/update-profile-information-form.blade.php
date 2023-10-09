<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            {{ __("Update your account's profile information ") }}
        </h3>
    </div>
    <form method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6"> @csrf @method('patch')
        <div class="card-body">
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)"
                    autofocus autocomplete="name" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" name="email" type="email" class="form-control" readonly
                    :value="old('email', $user->email)" autocomplete="username" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </div>
    </form>
</div>
</div>
