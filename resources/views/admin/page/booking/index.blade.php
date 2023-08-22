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
                                 {{-- <th>STATUS</th>
                                 <th>Action</th> --}}
                                 <!-- <th>STATUS</th>
                                 <th>Action</th> -->
                                    </tr>
                                </thead>
                                @foreach ($booking as $key => $bookings)
                                <tr>
                                <td class="1">{{ $key + 1 }}</td>
                                <td class="2">{{ $bookings->name }}</td>
                                <td class="3">{{ $bookings->email }}</td>
                                <td class="4">{{ $bookings->phone }}</td>
                                <td class="5">{{ $bookings->date }} ( {{ $bookings->time }})</td>
                                <td class="6">{{ $bookings->persons }}</td>
                                <td class="7">{!! \Illuminate\Support\Str::limit(strip_tags($bookings->comments)) !!}</td>
                                <td class="hidden" style="display:none"> @if ($bookings->status == 0)<div class="mt-sm-1 d-block"> <span class="badge badge-warning">Pending</span>  </div> @elseif ($bookings->status == 1)<div class="mt-sm-1 d-block"> <span class="badge badge-success">Accept</span> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Rejact</span> </div> @endif </td>

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
