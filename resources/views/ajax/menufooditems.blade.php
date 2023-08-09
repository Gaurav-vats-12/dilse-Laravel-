                    <input type="hidden" name="slug" id="slug" value="{{$slug}}">
                    @if (isset($FoodItem) && count($FoodItem) >0)
                        @foreach ( $FoodItem as $key => $FoodItemValue )
                        <div class="best_food_crd">
                            <div class="best_food_crd_img">
                                <img src="{{ url('/storage/products/'.$FoodItemValue->image.'') }}" alt="">
                            </div>
                            <div class="best_food_cntnt">
                                <div class="best_food_txt">
                                    <h3>{{ $FoodItemValue->name}}</h3>
                                    <h2>${{ $FoodItemValue->price}}</h2>
                                </div>
                                <div class="best_btn_food">
                                <a href="{{ route('cart.add', $FoodItemValue->id) }}" class="theme_btn btn-block text-center" role="button">Add to cart</a>

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
