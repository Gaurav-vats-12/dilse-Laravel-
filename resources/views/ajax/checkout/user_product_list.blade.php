<div class="cart-table table-responsive">
    <table class="table table-bordered table-responsive">
        <thead class="text-left">
        <tr>
            <th>S.no </th>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Sub total price</th>
        </tr>
        </thead>
        <tbody class="text-left">
        @php
            $key = 1;
            $subtotal = 0;
        @endphp
        @foreach (session('cart') as $id => $details)
            @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
            <tr>
                <td>{{ $key++ }}</td>
                <td>
                    <h6>{{ $details['name'] }}</h6>
                </td>
                <td>{{ $details['quantity'] }}</td>
                <td>{{setting('site_currency')}}{{ round($details['price'], 2) }}</td>
                <td>{{setting('site_currency')}}{{ round($details['price'] * $details['quantity'], 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
