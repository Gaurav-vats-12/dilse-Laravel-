<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Blog</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                <a href="{{ route('admin.blog.create')}}" type ="button" class="btn btn-success float-right" >Add Blog</a>
              </div>
                        <div class="card-body">
                            <table id="bannerTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Blog  Title </th>
                                        <th>Blog Slug </th>
                                        <th>Blog  Content </th>
                                        <th>Blog  Meta Title </th>
                                        <th>Blog  Meta Description </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ( $blog as $key => $value )
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->blog_title }}</td>
                                <td>{{ $value->blog_slug }}</td>
                                <td>{!! $value->blog_content !!}</td>
                                <td>{{ $value->blog_meta_title }}</td>
                                <td>{{ $value->blog_meta_description }}</td>
                                <td>{{ $value->status}}</td>
                                <td class="project-actions"><a class="btn btn-info btn-sm" href="{{ route('admin.blog.show', $value->id) }}"><i class="fa-solid fa-eye"></i> </a><a class="btn btn-info btn-sm" href="{{ route('admin.blog.edit', $value->id) }}"><i class="fas fa-pencil-alt"></i> </a> <a class="btn btn-danger btn-sm" href="{{ route('admin.blog.destroy', $value->id) }}" data-confirm-delete="true"><i class="fas fa-trash"></i></a></td>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</x-admin-app-layout>
