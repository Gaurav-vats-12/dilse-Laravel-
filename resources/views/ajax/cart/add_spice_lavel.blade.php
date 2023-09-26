<h3>Add spice level</h3>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="spicy_lavel" id="spicy_lavel" value="{{ session('spicy_lavel')}}" show_form= "true">
                                <div class="input-group">
                                    <select name="spicy_lavel" id="spicy_lavel" class="form-control" ajax_value ="{{ route('cart.update_details')}}" location_Type="spicy">
                                        <option value="">Choose Spice level</option>
                                        @foreach(getattribute('other') as $key=> $attribuite)
                                        <option value="{{$attribuite->attributes_name}}" {{ $attribuite->attributes_name == session('spicy_lavel')? 'selected' : '' }}>{{ $attribuite->attributes_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
