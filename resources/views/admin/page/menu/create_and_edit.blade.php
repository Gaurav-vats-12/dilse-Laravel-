<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> {{ isset($Menu) ?  'Update Pages' : 'Create Pages' }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">
            {{ isset($Menu) ?  'Update Pages' : 'Create Pages' }}

           </li>
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
                    <div class="card-body">
                    <form method="POST" action="{{ isset($Menu) ? route('admin.menu.update' ,$Menu->id) :route('admin.menu.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                        @if (isset($Menu))
                            @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="menu_name">Name</label>
                            <input type="text" name="menu_name" id="menu_name"  class="form-control" value="{{ isset($Menu) ? old('menu_name' ,$Menu->menu_name) :old('menu_name') }}">
                            @error('menu_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                        <div class="form-group">
                            <label for="menu_slug">Slug</label>
                            <input type="text" readonly name="menu_slug" id="menu_slug"  class="form-control" value="{{ isset($Menu) ? old('menu_slug' ,$Menu->menu_slug) :old('menu_slug') }}">
                            @error('menu_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                                @php
                                $status = isset($Menu) ?old('status' ,$Menu->status) :old('status');
                                @endphp
                            <option value="active"  {{  $status  == 'active' ? 'selected' : '' }}>Active</option>
                             <option value="inactive" {{ $status  == 'inactive' ? 'selected' : '' }}>Inactive
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2"> {{ isset($Menu) ?  'Update' : 'Create' }}</button>
                        </form>
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
