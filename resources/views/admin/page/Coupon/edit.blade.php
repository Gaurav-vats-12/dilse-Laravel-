<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Attribute</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Attribute</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.manage-coupon.update' ,$Coupon->id) }}"
                                    accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="coupon_code"> {{ __('Coupon  Code *') }}</label>
                                        <input type="text" name="coupon_code"  readonly class="form-control" placeholder="Coupon Code"  value="{{ old('coupon_code' ,$Coupon->code )}}">
                                        @error('coupon_code')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="coupon_description"> {{ __('Coupon  Discription (Optional)') }}</label>
                                        <textarea name="coupon_description" class="form-control" id="coupon_description" placeholder="" cols="2" rows="2">{{ old('coupon_description',$Coupon->coupon_description) }}</textarea>
                                        @error('coupon_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="discount_type"> {{ __('Discount type *') }}</label>
                                                <select name="discount_type" id="discount_type"
                                                    class="form-control form-select">
                                                    <option value="">Select Discount Type</option>
                                                    <option value="percentage"
                                                        {{ old('discount_type',$Coupon->type) == 'percentage' ? 'selected' : '' }}>
                                                        Percentage discount</option>
                                                    <option value="fixed_cart"
                                                        {{ old('discount_type',$Coupon->type) == 'fixed_cart' ? 'selected' : '' }}>
                                                        Fixed cart discount </option>
                                                </select>
                                                @error('discount_type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="coupon_amount"> {{ __('Coupon amount *') }}</label>
                                                <input type="number"inputmode="numeric" class="short form-control" name="coupon_amount"
                                                    id="coupon_amount" value="{{ old('coupon_amount',$Coupon->amount) }}"
                                                    placeholder="coupon_amount" max="1">
                                                    <small id="appemd_data_list"></small>

                                                    @error('coupon_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="minimum_amount"> {{ __('Minimum spend *') }}</label>
                                                <input type="text" class="short form-control" name="minimum_amount"
                                                    id="minimum_amount" value="{{ old('minimum_amount',$Coupon->minimum_spend) }}"
                                                    placeholder="No minimum">
                                                @error('minimum_amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="maximum_amount"> {{ __('Maximum spend') }}</label>
                                            <input type="text" class="form-control" name="maximum_amount"
                                                id="maximum_amount" value="{{ old('maximum_amount',$Coupon->maximum_spend) }}">
                                            @error('maximum_amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="coupon_type"> {{ __('Coupon  type *') }}</label>
                                            <select name="coupon_type" id="coupon_type"
                                                class="form-control form-select">
                                                <option value=""> Select Coupon Type </option>
                                                <option value="referral"
                                                    {{ old('coupon_type',$Coupon->coupon_type) == 'referral' ? 'selected' : '' }}>Referral
                                                </option>
                                                <option value="offer"
                                                    {{ old('coupon_type',$Coupon->coupon_type) == 'popup' ? 'selected' : '' }}> Offer
                                                </option>
                                            </select>
                                            @error('coupon_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="expiry_date"> {{ __('Coupon expiry date * ') }}</label>
                                                <input type="text" class="form-control" name="expiry_date"
                                                    id="expiry_date" value="{{ old('expiry_date',$Coupon->end_date) }}">
                                                @error('expiry_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status"> {{ __('Coupon  status') }}</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select status</option>
                                            <option value="active" {{ old('status',$Coupon->status) == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive" {{ old('status',$Coupon->status) == '0' ? 'selected' : '' }}>Inactive
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                        <button type="submit" class="btn btn-primary me-2">Update </button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>
