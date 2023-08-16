<div class="row">

    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_first_name" class="">First name <span class="required" title="required">*</span></label>
            <input type="text" placeholder="First Name"  class="form-control" name ="billing_first_name" value="{{ old('billing_first_name') }}">
            @error('billing_first_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_last_name" class="">Last name&nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="Last Name" name="billing_last_name" value="{{ old('billing_last_name') }}">
            @error('billing_last_name')
            <span class="text-danger">{{ $message }}</span>
            @enderror                                        </div>
    </div>
    <div class="col-md-12">
        <div class="cusstom_input">
            <label for="billing_company" class="">Company name&nbsp;<span class="optional">(optional)</span></label>
            <input type="text" placeholder="Enter  Company Name" name="billing_company"  value="{{ old('billing_company')  }}">
            @error('billing_company')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_phone" class="">Phone&nbsp;<span class="required" title="required">*</span></label>
            <input type="tel" placeholder="Enter Phone Number" name="billing_phone" id="billing_phone"  value="{{ old('billing_phone')  }}">
            @error('billing_phone')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_email" class="">Email address&nbsp;<span class="required" title="required">*</span></label>
            <input type="email" placeholder="Enter Email Address" name="billing_email"  value="{{ old('billing_email')  }}">
            @error('billing_email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_address_1" class="">Address 1&nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="House number and street name" name="billing_address_1"  value="{{ old('billing_address_1') }}">
            @error('billing_address_1')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_address_2" class="">Address 2 &nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="Apartment, suite, unit, etc. (optional)" name="billing_address_2"  value="{{ old('billing_address_2') }}">
            @error('billing_address_2')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <input type="hidden" name="state_ajax" id="state_ajax" value="{{route('state')}}">
            <label for="billing_country" class="">Country  &nbsp;<span class="required" title="required">*</span></label>
            <select name="billing_country" id="billing_country" class="form-select">
                <option value="">Select Country</option>
                <option value="canada" country_uid = "39" selected >Canada</option>
            </select>
            @error('billing_country')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <input type="hidden" name="selected_billing_state" id="selected_billing_state" value="{{ old('billing_state') }}">
            <label for="billing_state" class="">Province&nbsp;<span class="required" title="required">*</span></label>
            <select name="billing_state" id="billing_state" class="form-select">
            </select>
            @error('billing_state')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_city" class="">Town / City&nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="" name="billing_city"  value="{{ old('billing_city') }}">
            @error('billing_city')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="cusstom_input">
            <label for="billing_postcode" class="">Postal code&nbsp;<span class="required" title="required">*</span></label>
            <input type="text" placeholder="" name="billing_postcode"  maxlength="7" value="{{ old('billing_postcode')  }}">

            @error('billing_postcode')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
</div>
