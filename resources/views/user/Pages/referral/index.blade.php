@extends('layouts.app')
@section('title', 'User Edit Profile Update ')
@section('frontcontent')

    <section class="menu_main1 py_8">
        <div class="container">
            <div class="tittle_heading">
                <h2>User dashboard</h2>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    @include('user.layouts.partials.user_sidebar')
                </div>
                <div class="col-lg-9">
                    @if (isset($Coupon))
                    <div class="wap-order">

                        <div class="col-md-12">
                            <div class="cusstom_input">
                                <label for="reffrel_code" class="">Your referral Code </span></label>
                                <input type="text"  id="reffrel_code" name="reffrel_code"  value="{{ $Coupon->code }}" readonly >
                            </div>
                        </div>
                        <span class="text-bold"> List of User Which have used Referral </span>
                        <div class="franchies-wap table-responsive orders-table-wrapper mt-3">
                            <hr>
                            <table class="table orders-table table-borderless">
                                <thead>
                                <tr>
                                    <th style="width:130px">S.N.</th>
                                    <th>Reffreal name</th>
                                    <th style="width:150px" class="text-center">Coupon Code </th>
                                    <th style="width:150px" class="text-center">Start date</th>
                                    <th style="width:150px" class="text-center">End  date</th>
                                    <th style="width:100px" class="text-center">Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reffral  as $keys=>  $reffral_list)
                                    {{-- @dd($reffral_list) --}}
                                    <tr>
                                        <td  >{{ $keys + 1 }}</td>
                                    </tr>
                                    @endforeach
                                {{-- @php  $subtotal = 0; @endphp
                                @foreach ($orders->orderItems as $keys=>  $items)
                                    @php  $subtotal = $subtotal + $items["price"] *  $items["quantity"]@endphp

                                    <tr>
                                        <td  >{{ $keys + 1 }}</td>
                                        <td>{{ $items->product->name }}</td>
                                        <td>{{ $items->product->price }}</td>
                                        <td>{{ $items->quantity }}</td>
                                        <td>{{ $items->price    }}</td>
                                    </tr>
                                @endforeach --}}
                                {{-- <div class="subtotal_Order">
                                    <tr class="last-tqab">
                                        <td><span class="do">Sub Total: </span></td>
                                        <td><span class="totals">${{$subtotal}}</span>
                                        </td>
                                    </tr>
                                    <tr class="last-tqab">
                                        <td><span class="do">Shipping Cost:</span></td>
                                        <td><span class="totals">${{$orders->shipping_charge}}</span>
                                        </td>
                                    </tr>
                                    <tr class="last-tqab">
                                        <td><span class="do">Order Total:</span></td>
                                        <td><span class="totals">${{ $subtotal + $orders->shipping_charge }}</span>
                                        </td>
                                    </tr>
                                </div> --}}
                                </tbody>
                            </table>
                            <div class="Reorder_Class">
                                {{-- @if($orders->status =='Delivered')
                                    <a class="" href="{{ route('user.OrderReorder' ,$orders->id) }}"> Reorder Order</a>
                                @endif --}}
                            </div>
                        </div>
                    </div>


                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
