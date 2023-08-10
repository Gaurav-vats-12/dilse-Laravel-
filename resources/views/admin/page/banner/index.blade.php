<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Banner List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Banner List</li>
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
                <a href="{{ route('admin.banner.create')}}" type ="button" class="btn btn-success float-right" >Add Banner</a>
              </div>
                        <div class="card-body">
                            <table id="bannerTable" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>Sno</th>
                                        <th>Banner Title </th>
                                        <!-- <th>Banner Image </th> -->
                                        <th>Banner Type </th>
                                        <th>Banner Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($banner as $key => $value)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->banner_title }}</td>
                                <!-- <td><img src="{{ url('/storage/banner/'.$value->bannerImage.'')}}" style="height: 34px; width: auto;"></td> -->
                                <td>{{ ucfirst($value->banner_type )}}</td>
                                <td> @if ($value->status == 'active')<div class="mt-sm-1 d-block"> <span class="badge badge-success">Active</span>  </div> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Inactive</span> </div> @endif </td>
                                <td class="project-actions"><a class="btn btn-info btn-sm" href="{{ route('admin.banner.edit', $value->id) }}"><i class="fas fa-pencil-alt"></i> </a> <a class="btn btn-danger btn-sm" href="{{ route('admin.banner.destroy', $value->id) }}" data-confirm-delete="true"><i class="fas fa-trash"></i></a></td>

</tr>

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
