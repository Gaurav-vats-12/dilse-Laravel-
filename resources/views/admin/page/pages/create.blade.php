<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Pages</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Pages</li>
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
                                <form method="POST" action="{{ route('admin.manage-pages.store')}}"  accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <label for="page_title">Page Title*</label>
                                        <input type="hidden" name="pagesuuid" id="pagesuuid"
                                               value="{{ Str::random(10)}}">
                                        <input type="text" name="page_title" id="page_title" class="form-control"
                                               value="{{ old('page_title')}}">
                                        @error('page_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="page_slug">Page Slug*</label>
                                        <input type="text" class="form-control" name="page_slug" readonly id="page_slug"
                                               value="{{ old('page_slug')}}">
                                        @error('page_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="page_meta_title">Page Meta Title*</label>
                                        <input type="text" class="form-control" name="page_meta_title"
                                               id="page_meta_title" value="{{ old('page_meta_title')}}">
                                        @error('page_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="page_meta_description">Page Meta Description</label>
                                        <textarea name="page_meta_description" id="page_meta_description"
                                                  class="form-control">{{ old('page_meta_description')}}</textarea>
                                        @error('page_meta_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="page_content">Page Content</label>
                                        <textarea name="page_content" id="page_content"
                                                  class="form-control summernote">{{ old('page_content')}}</textarea>
                                        @error('page_content')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select status</option>
                                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                                Inactive
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
