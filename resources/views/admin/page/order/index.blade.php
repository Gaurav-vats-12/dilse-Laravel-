<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Orders </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Orders</li>
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
                                <th>Company Name</th>
                                 <th>STATUS</th>
                                 <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($orders as $order)
                                <td>{{ $order->user_id  }}</td>
                                <td>{{ $order->full_name }}</td>
                                <td>{{ $order->company_name }}</td>
                                <td>  {{ $order->status }}</td>

                                <td class="project-actions">
                                    <a class="btn btn-info btn-sm" href=""><i class="fa-solid fa-eye"></i>  </a>
                                    <a href="{{ route('admin.manage-customer.control', $order->id) }}" class="btn text-warning btn-sm" data-bs-toggle="tooltip" data-bs-original-title="inactive"></a>
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
