<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">View  Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">View Blog</li>
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
                <a href="{{ route('admin.blog.index')}}" type ="button" class="btn btn-success float-left" >Back </a>
              </div>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="blog_title">   {{ __('Blog Title') }}</label>
                        <p class="text">
                        {{ __($blog->blog_title) }}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_slug">   {{ __('Blog Slug *') }}</label>
                        <p class="text">
                        {{ __($blog->blog_slug) }}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_content"> {{ __('Blog Content') }}</label>
                        <p class="text">
                        {!! __($blog->blog_content) !!}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_content"> {{ __('Blog Image') }}</label>
                        <p class="text">
                        <img src="{{ url('/storage/blog/'.$blog->blog_title.'/'.$blog->blog_image.'') }}" alt="" width="100px">
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_title">   {{ __('Blog Meta Title  *') }}</label>
                        <p class="text">
                        {!! __($blog->blog_meta_title) !!}
                        </p>
                        </div>
                        <div class="form-group">
                        <label for="blog_meta_description"> {{ __('Blog Meta Description') }}</label>
                        <p class="text">
                        {!! __($blog->blog_meta_description) !!}
                        </p>
                        <div class="form-group">
                        <label for="status">   {{ __('Banner status') }}</label>
                        <p class="text">
                        {!! __($blog->status) !!}
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
