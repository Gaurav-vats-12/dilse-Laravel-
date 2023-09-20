<div class="product_checkout">
    @foreach ( $extra_items as $key => $extra_item )
            <div class="product_box">
                <div class="product_img">
                    <img src="{{ url('/storage/products/'.$extra_item->image.'') }}" alt="{{ $extra_item->name}}">
                </div>
                <div class="product_cont">
                    <div class="title_cost">
                        <h3>{{$extra_item->name}}</h3>
                    </div>

                    <input type="hidden" name="ajax_url" id="extra_ajax_url" value="{{ route('cart.add') }}" >
                    <input type="hidden" name="product_price" id="product_price__{{$extra_item->id}}" value="{{ $extra_item->price }}">
                    <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                    <div class="cost_p">
                        <h6>    {{ setting('site_currency')}}{{ $extra_item->price }}</h6>
                        <input type="hidden" name="product_quntity" id="product_quntity_{{$extra_item->id}}" value="1">
                        <input type="hidden" name="is_spisy" id="is_spisy_{{$extra_item->id}}" value="{{($extra_item->menu->menu_slug =='desserts' || $extra_item->menu->menu_slug =='drinks' ||$extra_item->menu->menu_slug =='breads' ) ? 'true' : 'false'}}">
                        <a href="javascript:void(0)" class="view_product theme_btn btn-block text-center add-to-cart-button" id="add_to_cart_extra" role="button" cart_ajax_url ="{{ route('cart.add') }}"  product_uid ="{{ $extra_item->id }}">  <span class="add-to-cart">Add to cart</span>
                            <span class="added-to-cart">Added to cart</span>
                        </a>
                    </div>

                </div>
            </div>
    @endforeach
</div>
