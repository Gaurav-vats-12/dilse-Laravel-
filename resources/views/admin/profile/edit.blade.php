<x-admin-app-layout>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('admin.profile.partials.update-profile-information-form')
            </div>
            <div class="col-md-12">
                @include('admin.profile.partials.update-password-form')
            </div>
        </div>
    </div>

</x-admin-app-layout>
