
<div class="row">
<input type="hidden" name="order_type" id="order_type" value="{{ session('order_type') }}">
    <input type="hidden" name="store_location" id="store_location" value="{{ session('update_location')}}">
    <input type="hidden" name="spice_lavel" id="spice_lavel" value="{{ session('spicy_lavel')}}">
    <input type="hidden" name="shipping_charge" id="shipping_charge" value="{{ session('deliveryCost') }}" >

    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_full_name" class="">Full name <span class="required" title="required">*</span></label>
            <input type="text" placeholder="Full  Name"  name="billing_full_name" value="{{ Auth::guard('user')->check() ? old('billing_full_name' ,Auth::guard('user')->user()->name)   : old('billing_full_name') }}" >
            <span id="billing_full_name_error" class="text-danger"></span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_company" class="">Company name&nbsp;<span
                    class="optional">(optional)</span></label>
            <input type="text" placeholder="Enter  Company Name" name="billing_company" id="billing_company" value=" {{ (Auth::guard('user')->check() && Auth::guard('user')->user()->addresses )? old('billing_company',Auth::guard('user')->user()->addresses->billing_company)  : old('billing_company') }} ">

        </div>
    </div>
    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_full_name" class="">Phone Number <span class="required" title="required">*</span></label>
            <input type="text" placeholder="Enter phone number"  id="billing_phone" name="billing_phone" value="{{ Auth::guard('user')->check() ? old('billing_phone' ,Auth::guard('user')->user()->phone)   : old('billing_phone') }}"  >
        </div>
    </div>
    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_email" class="">Email address&nbsp;<span class="required"  title="required">*</span></label>
            <input type="email" placeholder="Enter Email Address" name="billing_email" id="billing_email" value=" {{ Auth::guard('user')->check() ? old('billing_email' ,Auth::guard('user')->user()->email)  : old('billing_email') }} ">
        </div>
    </div>   @include('ajax.user_address_form')
</div>
