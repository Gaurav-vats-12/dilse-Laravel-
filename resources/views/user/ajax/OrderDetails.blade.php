

@if (isset($OrderDetails) && count($OrderDetails) >0)

    @foreach($OrderDetails as $key => $orders)
        <div class="wap-lis" order_uiod = {{ $orders->id }}>
            <div class="stat d-flex ">
                <h6 class="ser-infh"><b>Order No.</b>{{ $orders->id }}</h6>
                <h6 class="ser-infh pla"> <b>Order Date</b>
                    :{{   date("d/m/Y", strtotime($orders->order_date))  }} ({{  DateTime::createFromFormat('H:i:s',explode(' ', $orders->order_date)[1])->format('h:i:s A')  }})
                    &nbsp;| &nbsp; <b>Status:</b>
                    <span id="OrderStatus">{{ $orders->status }}</span>
                    @if($orders->status =='Pending')|
                    <form method="POST" class="order_cancel" id="OrderCencelled_Form" action="{{ route('user.order-cancelled', $orders->id) }}">  @csrf @method('PUT')
                    <a href="javascript:void(0)"  ajax_url ="{{ route('user.order-cancelled' ,$orders->id) }}" class="btn-danger show_confirm">Cancel Order</a></form>
                    @endif
                </h6>

            </div>
            <div class="franchies-wap table-responsive orders-table-wrapper mt-3">
                <hr>
                <table class="table orders-table table-borderless">
                    <thead>
                    <tr>
                        <th style="width:130px">S.N.</th>
                        <th>Item Name</th>
                        <th style="width:150px" class="text-center">Price</th>
                        <th style="width:150px" class="text-center">Qty</th>
                        <th style="width:100px" class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php  $subtotal = 0; @endphp
                    @foreach ($orders->orderItems as $keys=>  $items)
                        @php  $subtotal = $subtotal + $items["price"] *  $items["quantity"]@endphp

                        <tr>
                            <td  >{{ $keys + 1 }}</td>
                            <td>{{ $items->product->name }}</td>
                            <td>{{ $items->product->price  }}</td>
                            <td>{{ $items->quantity }}</td>
                            <td>{{ $items->price * $items->quantity }}</td>
                        </tr>
                    @endforeach
                    <div class="subtotal_Order">
                        <tr class="last-tqab">
                            <td><span class="do">Sub Total: </span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{$subtotal}}</span>
                            </td>
                        </tr>
                        <tr class="last-tqab">
                            <td><span class="do">Discount </span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{$orders->discount_price}}</span>
                            </td>
                        </tr>

                        <tr class="last-tqab">
                            <td><span class="do">Shipping Cost:</span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{$orders->shipping_charge}} (Tip :{{ setting('site_currency')}}{{$orders->delivery_tip}})</span>
                            </td>
                        </tr>
                        <tr class="last-tqab">
                            <td><span class="do">Total : </span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{$subtotal - $orders->discount_price  + $orders->shipping_charge }} </span>
                            </td>
                        </tr>
                        <tr class="last-tqab">
                            <td><span class="do">Tax : </span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{$orders->tax}} </span>
                            </td>
                        </tr>

                        <tr class="last-tqab">
                            <td><span class="do">Grand  Total:</span></td>
                            <td><span class="totals">{{ setting('site_currency')}}{{ $subtotal - $orders->discount_price  + $orders->shipping_charge + $orders->tax }}</span>
                            </td>
                        </tr>
                    </div>
                    </tbody>
                </table>
                <div class="Reorder_Class">
                    @if($orders->status =='Delivered')
                        <a class="" href="{{ route('user.OrderReorder' ,$orders->id) }}"> Reorder Order</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="no-order-message taxt-center">
        <h2>No Orders Found</h2>
    </div>
    <div class="back-to-home">
        <a href="{{ route('menu','appetizers') }}">Back to Menu</a>
    </div>
@endif
