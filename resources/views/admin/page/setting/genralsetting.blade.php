<x-admin-app-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">General Setting</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">General Setting </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('admin.setting.genralstore', setting('id')) }}"
                                accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                 @method('PUT')
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="site_title">Site Tile *</label>
                                        <input type="text" name="site_title" id="site_title" class="form-control"
                                            value="{{ old('site_title', setting('site_title')) }}">
                                        <small><i class="fa-solid fa-circle-question"></i> Please Enter the Site
                                            Title</small>
                                        @error('site_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="site_email">Default Email *</label>
                                    <input type="text" name="site_email" id="site_title"  class="form-control" value="{{ old('site_email',setting('site_email'))}}">
                                     <small><i class="fa-solid fa-circle-question"></i>Default email will be used by your customer by contacting you</small>
                                     @error('site_email')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="phone">Phone Number *</label>
                                   <input type="text" name="phone" id="phone"  class="form-control" value="{{ old('phone',setting('phone'))}}">
                                <small><i class="fa-solid fa-circle-question"></i> Please Enter the valid phone number</small>
                               @error('phone')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                    <label for="copyright_text">Copyright Text </label>
                                    <input type="text" name="copyright_text" id="copyright_text"  class="form-control" value="{{ old('copyright_text',setting('copyright_text'))}}">
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter copyright text</small>
                                    @error('copyright_text')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="site_currency">Default Currency (In Symbol)</label>
                                    <input type="text" name="site_currency" id="site_currency"  class="form-control" value="{{ old('site_currency',setting('site_currency'))}}">
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter Site Currency</small>
                                    @error('site_currency')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="site_location">Location</label>
                                    <select name="site_location[]" id="site_location" class="form-control select2" multiple>
                                        <option value="">choose location</option>

                                        @php
                                            $selectedLocations = old('site_location', explode(',', setting('site_location'))  ?: []);

                                            if (!is_array($selectedLocations)) {
                                                $selectedLocations = [$selectedLocations];  // Ensure we have an array
                                            }
                                        @endphp

                                        <option value="Toronto" {{ in_array('Toronto', $selectedLocations) ? 'selected' : '' }}>Toronto</option>
                                        <option value="Bramptonn" {{ in_array('Bramptonn', $selectedLocations) ? 'selected' : '' }}>Bramptonn</option>
                                    </select>

                                    @error('site_location')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <!-- <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" id="logo" class="dropify" data-max-file-size="1M" data-max-height="1000"  data-errors-position="outside" data-allowed-file-extensions="png jpg svg" data-default-file="{{ url('/storage/site/logo/'.setting('logo').'')  }}" >
                                    @error('logo')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="Favicon">Favicon</label>
                                    <input type="file" name="Favicon" id="Favicon" class="dropify" data-max-file-size="1M" data-max-height="1000"  data-errors-position="outside" data-allowed-file-extensions="png jpg svg" data-default-file="{{ url('/storage/site/Favicon/'.setting('favicon').'') }}" >
                                     @error('Favicon')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div> -->
                                <!-- <div class="row py-2">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                    <label for="footer_logo"> Footer Logo</label>
                                    <input type="file" name="footer_logo" id="footer_logo" class="dropify" data-max-file-size="1M" data-max-height="1000"  data-errors-position="outside" data-allowed-file-extensions="png jpg svg" data-default-file="{{ url('/storage/site/logo/'.setting('footer_logo').'') }}" >
                                    @error('logo')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div> -->
                                <div class="row py-2">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="address"> Address</label>
                                <textarea name="address" id="address"  class="form-control" cols="10" rows="4">{{old('address',setting('address')) }}</textarea>
                                     @error('address')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="opening_hour"> Opening Hours *</label>
                                    <input type="text" name="opening_hour" id="opening_hour"  class="form-control" value="{{ old('opening_hour',setting('opening_hour'))}}">
                                     @error('opening_hour')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="facebook_url"> Facebook *</label>
                                    <input type="url" name="facebook_url" id="facebook_url"  class="form-control" value="{{ old('facebook_url',setting('facebook_url'))}}">
                                    @error('facebook_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="twitter_url"> Twitter </label>
                                    <input type="url" name="twitter_url" id="twitter_url"  class="form-control" value="{{ old('twitter_url',setting('twitter_url'))}}">
                                     @error('twitter_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="blogto_url"> Blog To Url</label>
                                    <input type="url" name="blogto_url" id="blogto_url"  class="form-control" value="{{ old('blogto_url',setting('blogto_url'))}}">
                                    @error('blogto_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="instagram_url"> Instagram </label>
                                    <input type="url" name="instagram_url" id="instagram_url"  class="form-control" value="{{ old('instagram_url',setting('instagram_url'))}}">

                                     @error('instagram_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-12 col-lg-6 col-6 form-group">
                                        <label for="tax">Minimum Order for Delivery</label>
                                        <input type="text" name="minimum_order_for_delivery" id="minimum_order_for_delivery"  class="form-control" value="{{ old('minimum_order_for_delivery',setting('minimum_order_for_delivery'))}}">
                                        @error('minimum_order_for_delivery')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-6 form-group">
                                    <label for="delivery_charge_within_5km"> Delivery Charge (Within 5 km)</label>
                                    <input type="text" name="delivery_charge_within_5km" id="delivery_charge_within_5km"  class="form-control" value="{{ old('delivery_charge_within_5km',setting('delivery_charge_within_5km'))}}">
                                     @error('delivery_charge_within_5km')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-6 form-group">
                                    <label for="delivery_charge_outside_5km"> Delivery Charge (Outside 5 km-15km)</label>
                                    <input type="text" name="delivery_charge_outside_5km" id="delivery_charge_outside_5km"  class="form-control" value="{{ old('delivery_charge_outside_5km',setting('delivery_charge_outside_5km'))}}">
                                     @error('delivery_charge_outside_5km')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-xl-12 col-lg-6 col-6 form-group">
                                        <label for="tax"> Tax ( %)</label>
                                        <input type="text" name="tax" id="tax"  class="form-control" value="{{ old('tax',setting('tax'))}}">
                                        <small><i class="fa-solid fa-circle-question"></i> Please Enter Tax</small>
                                        @error('tax')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
{{--                                <div class="row py-2">--}}
{{--                                    <div class="col-xl-12 col-lg-6 col-6 form-group">--}}
{{--                                        <label for="referrel_points_on_signup">Referral points</label>--}}
{{--                                        <input type="text" name="referrel_points_on_signup" id="referrel_points_on_signup"  class="form-control" value="{{ old('referrel_points_on_signup',setting('referrel_points_on_signup'))}}">--}}
{{--                                        @error('referrel_points_on_signup')  <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-12 form-group mg-t-8 mt-2">
                                        <button type="submit" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Update Settings</button>
                                    </div>
                            </form>

                        </div>
                    </div>


                </div>

            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
</x-admin-app-layout>
