<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View  customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">View customer</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                        <div class="card-header">
                <a href="{{ route('admin.manage-customer.index')}}" type ="button" class="btn btn-success float-left" >Back </a>
              </div>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Full Name') }}</label>
                        <p class="text">
                        {{ __($user->name) }}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Email Address') }}</label>
                        <p class="text">
                        {{ __($user->email) }}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Status') }}</label>
                        <p class="text">
                        @if ($user->status == 1)Active </div> @else Inactive @endif
                        </p>
                        </div>

                    </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>
