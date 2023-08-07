<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Pages</h1>
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
                    <form method="POST" action="{{ route('admin.manage-pages.update',$page->id )}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf @method('PUT')
                        <div class="form-group">
                            <label for="page_title">Page Title*</label>
                            <input type="text" name="page_title"  class="form-control" value="{{ old('page_title' ,$page->page_title )}}">
                            @error('page_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="page_slug">Page Slug*</label>
                            <input type="text" class="form-control" name="page_slug" readonly value="{{ old('page_slug' ,$page->page_slug)}}">
                            <small><i class="fa-solid fa-circle-question"></i> Page Slug cannot be changed</small>

                            @error('page_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="page_meta_title">Page Meta Title*</label>
                            <input type="text" class="form-control" name="page_meta_title"  id="page_meta_title" value="{{ old('page_meta_title' ,$page->page_meta_title)}}">
                            @error('page_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="page_meta_description">Page Meta Description</label>
                        <textarea name="page_meta_description" id="page_meta_description" class="form-control">{{ old('page_meta_description' ,$page->page_meta_description)}}</textarea>
                            @error('page_meta_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="page_content">Page Content</label>
                        <textarea name="page_content"  class="form-control summernote">{{ old('page_content' ,$page->page_content)}}</textarea>
                            @error('page_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value="active" {{ old('status' ,$page->status) == 'active' ? 'selected' : '' }}>Active</option>
                             <option value="inactive" {{ old('status' ,$page->status) == 'inactive' ? 'selected' : '' }}>Inactive
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Update</button>
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
