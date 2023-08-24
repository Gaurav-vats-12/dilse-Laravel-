<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Booking  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Booking</li>
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
                            <input type="hidden" name="data_value" id="booking_ajx_file" value="{{ route('admin.booking.index') }}" >
                            <table id="manage_bookign_table" class="table table-bordered table-hover " >
                                <thead>
                                    <tr>
                               <th>S No </th>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE NUMBER </th>
                                <th>BOOKING DATE AND TIME </th>
                                <th>PART SIZE </th>
                                <th>COMMENTS </th>
                                    </tr>
                                </thead>
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
