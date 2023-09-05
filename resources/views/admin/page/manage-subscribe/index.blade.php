<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Subscriber  </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Subscriber</li>
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
                            <table id="view_subscribe_table" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Sno </th>
                                    <th>EMAIL</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>

                                @foreach ($subscribers as $key => $users)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $users->email_address }}</td>
                                        <td class="text-capitalize">{{ $users->status }}</td>

                                        <td class="project-actions">
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.manage-subscribers.view', $users->id) }}">Unsubscribe </a>
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
