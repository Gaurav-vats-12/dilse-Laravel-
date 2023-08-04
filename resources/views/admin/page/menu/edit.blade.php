<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Pages</li>
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
                    <form method="POST" action="{{ route('admin.menu.update' ,$Menu->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                        @method('PUT')
                    <div class="form-group">
                            <label for="menu_name">Name</label>
                            <input type="text" name="menu_name"  class="form-control" value="{{ old('menu_name' ,$Menu->menu_name)}}">
                            @error('menu_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="menu_slug">Slug</label>
                            <input type="text" readonly name="menu_slug"   class="form-control" value="{{ old('menu_slug' ,$Menu->menu_slug)}}">
                            <small><i class="fa-solid fa-circle-question"></i> Menu Slug cannot be changed</small>

                            @error('menu_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value="active" {{ old('status' ,$Menu->status) == 'active' ? 'selected' : '' }}>Active</option>
                             <option value="inactive" {{ old('status' ,$Menu->status) == 'inactive' ? 'selected' : '' }}>Inactive
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
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
