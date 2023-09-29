<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Customer </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Customer</li>
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
              </div>
                        <div class="card-body">
                            <table id="view_customer_table" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                 <th>Sno </th>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                 <th>STATUS</th>
                                 <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($user as $key => $users)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td> @if ($users->status == 1)<div class="mt-sm-1 d-block"> <span class="badge badge-success">Active</span>  </div> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Inactive</span> </div> @endif </td>

                                <td class="project-actions">
                                    <a class="btn btn-info btn-sm" href="{{ route('admin.manage-customer.view', $users->id) }}"><i class="fa-solid fa-eye"></i>  </a>
                                    <form method="POST"
                                                  action="{{ route('admin.manage-customer.control', $users->id) }}">  @csrf @method('PUT')
                                                  <a href="javascript:void(0)" class="btn text-warning btn-sm" id="user_status" data-bs-toggle="tooltip" user_status="{{ $users->status == 1 ? 'active' : 'inactive' }}"><i class="fa-solid fa-user-large-slash"></i></a>
                                            </form>
                                </tr>
                                    @endforeach
                                <tbody>

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
