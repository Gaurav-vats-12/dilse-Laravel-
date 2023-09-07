<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Attributes List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Attributes List</li>
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
                     <a href="{{ route('admin.manage-attributes.create')}}" type ="button" class="btn btn-success float-right" >Add Attributes</a>
              </div>
                        <div class="card-body">
                            <table id="attribute_bootrapp_ytable" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>Sno</th>
                                        <th>Name </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ( $Attributes as $key => $value )
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->attributes_name }}</td>
                                <td> @if ($value->status == 1) <div class="mt-sm-1 d-block"><span class="badge badge-success">Active</span></div> @else<div class="mt-sm-1 d-block"><span class="badge badge-danger  ">Inactive</span></div> @endif </td>
                                <td class="project-actions"><a class="btn btn-info btn-sm"
                                                                       href="{{ route('admin.manage-attributes.edit', $value->id) }}">
                                                <i class="fas fa-pencil-alt"></i> </a>
                                            <form method="POST"
                                                  action="{{ route('admin.manage-attributes.destroy', $value->id) }}">  @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'><i
                                                            class="fas fa-trash"></i></button>
                                            </form>
                                        </td>


                                </tr>


                                @endforeach

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
