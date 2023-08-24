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
                            <table id="manage_orders" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                 <th>Sno </th>
                                <th>FULL NAME</th>
                                        <th>Price</th>

                                 <th>STATUS</th>
                             <th>Payment Status</th>
                                 <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($orders as $key=>  $order)


                                        <tr order_uid ="{{ $order->id }}">
                                            <td  >{{ $key + 1 }}</td>
                                            <td>{{ $order->full_name }}</td>
                                            <td>
                                                @if(isset($order) && isset($order->payment) && isset($order->payment->payment_amount))
                                                    $ {{ $order->payment->payment_amount }}
                                                @else
                                                    Not Available
                                                @endif
                                            </td>
                                            <td>@if($order->status){{ $order->status }}@else  @endif</td>

                                            <td>
                                                @if(isset($order) && isset($order->payment) && isset($order->payment->payment_amount))
                                                    {{ $order->payment->payment_method }}
                                                @endif
                                            </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{ route('admin.order.show' , $order->id) }}"><i class="fa-solid fa-eye"></i>  </a>

                                            @if( $order->status =='Pending')
                                                <a href="javascript:void(0)" id="append_pop_ups"  class="btn btn-info btn-sm" order_uid = "{{ $order->id }}">
                                                    <i class="fa-solid fa-plus" title="Accept" ></i>
                                                </a>
                                                @endif
                                                @if( $order->status =='Processing')
                                                    <input type="hidden" name="ajax_value" id="ajax_value" value="{{ route('admin.order.ChangeOrderStatus') }}">
                                                        <a href="javascript:void(0)" id="ChangeOrderStatus"  class="btn btn-info btn-sm" order_uid = "{{ $order->id }}">
                                                            <i class="fa-solid fa-minus" title="Accept" ></i>
                                                        </a>
                                                @endif
                                            <div class="order_data">
                                                @include('admin.page.order.includes.order_accept')

                                            </div>
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
