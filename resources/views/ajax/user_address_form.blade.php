<div class="col-md-12">
    <div class="cusstom_input">
        <label for="billing_address_1" class="">Address 1&nbsp;<span class="required" title="required">*</span></label>
        <input type="text" placeholder="House number and street name"  id="billing_address_1" name="billing_address_1"  value="{{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses )? old('billing_address_1',Auth::guard('user')->user()->addresses->billing_address1)  : old('billing_address_1') }}" >
        <span id="billing_address_1-error" class="text-danger"></span>
    </div>
</div>
<div class="col-md-12">
    <div class="cusstom_input">
        <label for="billing_address_2" class="">Address 2</label>
        <input type="text" placeholder="House number and street name" name="billing_address_2"  value="{{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses )? old('billing_address_2',Auth::guard('user')->user()->addresses->billing_address2)  : old('billing_address_2') }}">
    </div>
</div>
<div class="col-md-12">
    <div class="cusstom_input">
        <input type="hidden" name="state_ajax" id="state_ajax" value="{{ route('state') }}">
        <label for="billing_country" class="">Country &nbsp;<span class="required" title="required">*</span></label>
        <select name="billing_country" id="billing_country" class="form-select">
            <option value="">Select Country</option>
            <option value="39" country_uid="39" selected>Canada</option>
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="cusstom_input">
        <input type="hidden" name="selected_billing_state" id="selected_billing_state"
               value="{{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses ) ?old('billing_state' ,Auth::guard('user')->user()->addresses->statesid)    : old('billing_state') }}">
        <label for="billing_state" class="">Province&nbsp;<span class="required" title="required">*</span></label>
        <select name="billing_state" id="billing_state" class="form-select">
        </select>
    </div>
</div>
<div class="col-md-12">
    <div class="cusstom_input">
    <label for="billing_city" class="">Town / City&nbsp;<span class="required"  title="required">*</span></label>
        <input type="text" placeholder="Testing City"  id="billing_city" name="billing_city"  value="{{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses )? old('billing_city',Auth::guard('user')->user()->addresses->city)  : old('billing_city') }}" >
    </div>
</div>
<div class="col-md-12">
    <div class="cusstom_input 53454">
    <label for="billing_postcode" class="">Postal code&nbsp;<span class="required" title="required">*</span></label>
        <input type="text" placeholder="10000" maxlength="7"  id="billing_postcode" name="billing_postcode"  value="{{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses )? old('billing_postcode',Auth::guard('user')->user()->addresses->pincode)  : old('billing_postcode') }}" >
    </div>
</div>

