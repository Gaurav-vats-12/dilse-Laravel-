
<div class="row">
    <div class="col-md-6">
        <div class="cusstom_input">
            <input type="hidden" name="order_type" value="{{ session('order_type') }}">
            <input type="hidden" name="delivery_charge" value="{{ (session('order_type') && session('order_type') == "delivery") ? 4.25: 0.00 }}">
            <label for="billing_first_name" class="">First name <span class="required" title="required">*</span></label>
            <input type="text" placeholder="First Name" class="form-control" name="billing_first_name" value="{{ Auth::guard('user')->check() ? old('billing_first_name' ,explode(' ',Auth::guard('user')->user()->name)[0])   : old('billing_first_name') }}">
            @error('billing_first_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_last_name" class="">Last name&nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="Last Name" name="billing_last_name"
                   value="{{ Auth::guard('user')->check() ?  old('billing_first_name' ,explode(' ',Auth::guard('user')->user()->name)[1])   : old('billing_first_name') }}">
            @error('billing_last_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_company" class="">Company name&nbsp;<span
                    class="optional">(optional)</span></label>
            <input type="text" placeholder="Enter  Company Name" name="billing_company"
                   value=" {{ Auth::guard('user')->check() ?  old('billing_company' ,Auth::guard('user')->user()->billing_company)   : old('billing_company') }}">
            @error('billing_company')
            <span class="text-danger">{{ $message }}</span>
            @enderror
                   value="{{ old('billing_company') }}">

        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_phone" class="">Phone&nbsp;<span class="required" title="required">*</span></label>
            <input type="tel" placeholder="Enter Phone Number" name="billing_phone" id="billing_phone" value=" {{ Auth::guard('user')->check() ? old('billing_phone' ,Auth::guard('user')->user()->phone)  : old('billing_phone') }} ">
            @error('billing_phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_email" class="">Email address&nbsp;<span class="required"  title="required">*</span></label>
            <input type="email" placeholder="Enter Email Address" name="billing_email" id="billing_email" value=" {{ Auth::guard('user')->check() ? old('billing_email' ,Auth::guard('user')->user()->email)  : old('billing_email') }} ">
            @error('billing_email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>   @include('ajax.user_address_form')


</div>
