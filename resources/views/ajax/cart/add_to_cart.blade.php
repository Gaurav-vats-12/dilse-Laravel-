
                          @php  $subtotal = 0; @endphp
                            @foreach(session('cart') as $id => $details)
                                @php  $subtotal = $subtotal + $details["price"] *  $details["quantity"]@endphp
                                <div class="shoping_main_top" id="cart_products-{{$id}}">
                                    <div class="shopping_items_main">
                                        <ul class="shopping_items" data-custom-attr="{{ $details['is_spisy']}}">
                                            <li>
                                                <div class="shoping_imge">
                                                    <img src="{{ url('/storage/products/'.$details['image'].'') }}" alt="{{ $details['image']}}">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shoping_datas">
                                                    <h6>{{ $details['name']}}</h6>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shop_item_quantity qty-input">
                                                    <div id='myform' method='POST' class='quantity update-cart-qty'>
                                                        <a  class='qtyminus minus qty-count qty-count--minus update-qty' field='quantity' quantity-type ="minus" productoid ="{{$id}}" >-</a>
                                                        <input type='text' name='quantity' min="0" max="50" readonly  value='{{ $details["quantity"]}}' class='qty product-qty' product__price ="{{ $details['price']}}" />
                                                        <input type="hidden" name="product_price" id="product_price__{{$id}}" value="{{ $details['price']}}">
                                                        <input type="hidden" name="product_quantity" id="product_quntity__{{$id}}" value="1">
                                                        <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.update') }}" >
                                                        <a class='qty-plus plus qty-count qty-count--add update-qty' quantity-type ="plus" field='quantity' productoid ="{{ $id}}" >+</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="shope_price">
                                                    <div class="shope_p_tag"><span class="text-green-500 !leading-none">{{setting('site_currency')}}{{ $details['price']}}</span>
                                                    </div>
                                                    <div class="price"><h6> <span id="product_quantity_price__{{$id}}">{{setting('site_currency')}}{{  round($details['price']  * $details["quantity"] ,2)   }}</span></h6></div>
                                                    <div class="remove_price">
                                                        <form method="POST"  action="{{ route('cart.destroy', $id) }}">  @csrf @method('POST')
                                                            <input type="hidden" name="is_spicy" value="{{ $details['is_spisy']}}">
                                                            <input type="hidden" name="delete_ajax_url" id="delete_ajax_url" value="{{ route('cart.destroy' ,$id) }}">
                                                            <a class="theme_btn" href="javascript:void(0)" id ="remove_add_to_Cart" produc_id ="{{ $id }}" is_spicy ="{{ $details['is_spisy']}}">Remove</a></form>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                   @endforeach
