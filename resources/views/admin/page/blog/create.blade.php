<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Blog</li>
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
                    <form method="POST" action="{{ route('admin.blog.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Blog Title *') }}</label>
                            <input type="text" name="blog_title" id="blog_title" class="form-control" placeholder ="Blog title" value="{{ old('blog_title') }}">
                            @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_image">   {{ __('Blog Image') }}</label>
                            <input type="file" name="blog_image" id="blog_image" class="form-control dropify" >
                            @error('blog_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_content"> {{ __('Blog Content') }}</label>
                        <textarea name="blog_content" id="blog_content" class="form-control summernote" placeholder="Blog Content" >{{ old('blog_content') }}</textarea>
                            @error('blog_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_title">   {{ __('Blog Meta Title  *') }}</label>
                            <input type="text" name="blog_meta_title" id="blog_meta_title" class="form-control"  placeholder ="Blog Meta Title" value="{{ old('blog_meta_title') }}">
                            @error('blog_meta_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_description"> {{ __('Blog Meta Description') }}</label>
                        <textarea name="blog_meta_description" id="blog_content" class="form-control" placeholder="Blog Content" >{{ old('blog_content') }}</textarea>
                            @error('blog_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Banner status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                             <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                             <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft
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
