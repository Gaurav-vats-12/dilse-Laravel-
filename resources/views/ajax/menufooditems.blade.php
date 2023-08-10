                    <input type="hidden" name="slug" id="slug" value="{{$slug}}">
                    @if (isset($FoodItem) && count($FoodItem) >0)
                        @foreach ( $FoodItem as $key => $FoodItems)
                        <div class="best_food_crd">
                            <div class="best_food_crd_img">
                            <img src="{{ url('/storage/products/'.$FoodItems->image.'') }}" alt="{{ $FoodItems->name}}">
                            </div>
                            <div class="best_food_cntnt">
                                <div class="best_food_txt">
                                    <a href="{{ route('menudetails' , $FoodItems->slug)}}" target="_blank"><h3> {{ $FoodItems->name}}</h3></a>

                                    <h2>${{ $FoodItems->price}}</h2>
                                </div>
                                <div class="best_btn_food">
                                <input type="hidden" name="ajax_url" id="ajax_url" value="{{ route('cart.add') }}" >
                            <input type="hidden" name="product_price" id="product_price__{{$FoodItems->id}}" value="{{ $FoodItems->price }}">
                            <input type="hidden" name="product_quntity" id="product_quntity_{{$FoodItems->id}}" value="1">
                             <a href="javascript:void(0)" class="theme_btn btn-block text-center" id="add_to_cart" role="button" product_uid = "{{$FoodItems->id }}">Add to cart</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="d-flex justify-content-center CustomPagination">
                {!! $FoodItem->links() !!}
            </div>
                    @else
                    <h4>No Food Item  Found</h4>
                    @endif
