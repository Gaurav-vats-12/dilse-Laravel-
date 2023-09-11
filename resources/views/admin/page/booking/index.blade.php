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
                                <th>EXPECTED PERSON </th>
                                <th>BOOKING DATE </th>
                                <th>BOOKING Time </th>
                                <th>COMMENTS </th>
                                <!-- <th>Status </th> -->
                                 </tr>
                                </thead>
                                <tbody>
                                @foreach($booking as $key=> $bookings)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{$bookings->name}}</td>
                                <td>{{$bookings->email}}</td>
                                <td>{{$bookings->phone}}</td>
                                <td>{{$bookings->persons}}</td>
                                <td>{{ __( date("d-M-Y", strtotime($bookings->date)) ) }}</td>
                                <td>{{ __($bookings->time) }}</td>
                                <td>{!! Str::limit(strip_tags($bookings->comments) ,30) !!}</td>
                                <!-- <td> <form method="POST" action="{{ route('admin.booking.updateStatus',) }}"> @csrf  <label class="switch" for="status"> <input type="checkbox" name="status" id="status" value="1" booking_id ="{{ $bookings->id}}"><span class="slider round"></span>  </label> </form></td> -->
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
