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
                            <table id="manage_bookign_table" class="table table-bordered table-hover " >
                                <thead>
                                    <tr>
                                 <th>Sno </th>
                                <th>FULL NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE NUMBER </th>
                                <th>BOOKING DATE AND TIME </th>
                                <th>PART SIZE </th>
                                <th>COMMENTS </th>
                                 <th>STATUS</th>
                                 <th>Action</th>
                                 <!-- <th>STATUS</th>
                                 <th>Action</th> -->
                                    </tr>
                                </thead>
                                @foreach ($booking as $key => $bookings)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $bookings->name }}</td>
                                <td>{{ $bookings->email }}</td>
                                <td>{{ $bookings->phone }}</td>
                                <td>{{ $bookings->date }} ( {{ $bookings->time }})</td>
                                <td>{{ $bookings->persons }}</td>
                                <td>{!! \Illuminate\Support\Str::limit(strip_tags($bookings->comments)) !!}</td>
                                <td> @if ($bookings->status == 0)<div class="mt-sm-1 d-block"> <span class="badge badge-warning">Pending</span>  </div> @elseif ($bookings->status == 1)<div class="mt-sm-1 d-block"> <span class="badge badge-success">Accept</span> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Rejact</span> </div> @endif </td>
                                <td class="project-actions"><a class="btn btn-info btn-sm" href="{{ route('admin.booking.show', $bookings->id) }}"><i class="fa-solid fa-eye"></i>

                            </td>
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
