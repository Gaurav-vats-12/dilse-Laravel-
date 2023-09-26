
@if (isset($FoodItem) && count($FoodItem) >0)


@foreach ( $FoodItem as $key => $FoodItems)
    <input type="hidden" name="menu_id" id="menu_id" value="{{ $FoodItems->menu->id }}" >
<div class="best_food_crd" >
        <a href="{{ route('menudetails' , $FoodItems->slug)}}">
    <div class="best_food_crd_img">
    <img src="{{ url('/storage/products/'.$FoodItems->image.'') }}" alt="{{ $FoodItems->name}}">
    </div>
    </a>

    <div class="best_food_cntnt">
        <div class="best_food_txt">
            <a href="{{ route('menudetails' , $FoodItems->slug)}}"><h3> {{ $FoodItems->name}}</h3></a>
            <h2>{{setting('site_currency')}}{{ $FoodItems->price}}</h2>
        </div>
        <div class="best_food_btn">
            <input type="hidden" name="product_quntity" id="product_quntity_{{$FoodItems->id}}" value="1">
            <input type="hidden" name="is_spisy" id="is_spisy_{{$FoodItems->id}}" value="{{($FoodItems->menu->menu_slug =='desserts' || $FoodItems->menu->menu_slug =='drinks' ||$FoodItems->menu->menu_slug =='breads' ) ? 'true' : 'false'}}">
            <a href="javascript:void(0)" class="theme_btn btn-block text-center add-to-cart-button" id="add_to_cart" role="button" cart_ajax_url ="{{ route('cart.add') }}"  product_uid ="{{ $FoodItems->id }}"> <span class="add-to-cart">Add to cart</span>
                <span class="added-to-cart">Added to cart</span>
            </a>
        </div>
    </div>
</div>
@endforeach
@if(!empty($FoodItem) && $FoodItem->links())
    <div class="CustomPagination"  id="menu_items">
        {!! $FoodItem->links() !!}
    </div>
@endif

@else
<h4>No Food Item  Found</h4>
@endif
