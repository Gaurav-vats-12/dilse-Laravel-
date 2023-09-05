@php use Illuminate\Support\Str; @endphp
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
                            <a href="{{ route('admin.blog.create')}}" type="button" class="btn btn-success float-right">Add
                                Blog</a>
                        </div>
                        <div class="card-body">
                            <table id="blog_table" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Sno</th>
                                    <th>Image</th>
                                    <th> Title</th>
                                    <th>Content</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ( $blog as $key => $value )
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ url('/storage/blog/'.$value->blog_image.'') }}" alt=""
                                                 width="100px"></td>
                                        <td>{{ $value->blog_title }}</td>
                                        <td>{!! Str::limit(strip_tags($value->blog_content) ,30) !!}</td>
                                        <td class="text-capitalize">{{ $value->status}}</td>
                                        <td class="project-actions"><a class="btn btn-info btn-sm"
                                                                       href="{{ route('admin.blog.show', $value->id) }}"><i
                                                        class="fa-solid fa-eye"></i> </a><a class="btn btn-info btn-sm"
                                                                                            href="{{ route('admin.blog.edit', $value->id) }}">
                                                <i class="fas fa-pencil-alt"></i> </a>
                                            <form method="POST"
                                                  action="{{ route('admin.blog.destroy', $value->id) }}">  @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'><i
                                                            class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                        @endforeach
                                    </tr>
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
