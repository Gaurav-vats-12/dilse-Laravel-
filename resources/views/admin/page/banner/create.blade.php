<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Banner</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Banner abc</li>
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
                    <form method="POST" action="{{ route('admin.banner.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                        <label for="banner_title">   {{ __('Banner Title') }}</label>
                            <input type="text" name="banner_title" id="banner_title" class="form-control" placeholder ="Banner title" value="{{ old('banner_title') }}">
                            @error('banner_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="banner_heading">Banner Heading*</label>
                        <input type="text" name="banner_heading" id="banner_heading" class="form-control" placeholder ="Banner Heading" value="{{ old('banner_heading') }}">
                            @error('banner_heading')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="banner_discription">Banner Description</label>
                        <textarea name="banner_discription" id="banner_discription" class="form-control" placeholder="Banner Description" >{{ old('banner_discription') }}</textarea>
                            @error('banner_discription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="banner_type">Banner Type</label>
                        <select name="banner_type" id="banner_type" class="form-control form-select">
                            <option value="">Select banner Type </option>
                            <option value="home" {{ old('banner_type') == 'home' ? 'selected' : '' }}>Home</option>
                             <option value="popup" {{ old('banner_type') == 'popup' ? 'selected' : '' }}>Popup</option>
                             <option value="promo" {{ old('banner_type') == 'promo' ? 'selected' : '' }}>Promo</option>
                             <option value="sales" {{ old('banner_type') == 'sales' ? 'selected' : '' }}>Sales</option>
                     </select>
                            @error('banner_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="dependency">
                            <div class= "banner_type__home">
                                <div class="form-group">
                                <label for="home_banner_button_url">Home Banner Url</label>
                                <input type="url" name="home_banner_button_url" id="home_banner_button_url" class="form-control" placeholder="Home Banner Url" value="{{ old('home_banner_button_url') }}">

                                    @error('home_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="home_banner_button_name">Home Banner Name</label>
                                <input type="text" class="form-control" name="home_banner_button_name"  placeholder ="Home Banner Name" id="home_banner_button_name" value="{{ old('home_banner_button_name')}}">
                                    @error('home_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class= "banner_type__popup">
                                <div class="form-group">
                                <label for="popup_banner_button_url">Popup Banner Url</label>
                                <input type="url" name="popup_banner_button_url" id="popup_banner_button_url" class="form-control" placeholder="pop up Banner Url" value="{{ old('popup_banner_button_url') }}">
                                    @error('popup_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="popup_banner_button_name">Popup Banner Name</label>
                                <input type="text" class="form-control" name="popup_banner_button_name"  placeholder ="popup Banner Name" id="popup_banner_button_name" value="{{ old('popup_banner_button_name')}}">
                                    @error('popup_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class= "banner_type__promo">
                                <div class="form-group">
                                <label for="promo_banner_button_url">Promo Banner Url</label>
                                <input type="url" name="promo_banner_button_url" id="promo_banner_button_url" class="form-control" placeholder="Promo Banner Url" value="{{ old('promo_banner_button_url') }}">
                                    @error('promo_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="promo_banner_button_name">Promo Banner Name</label>
                                <input type="text" class="form-control" name="promo_banner_button_name"  placeholder ="promo Banner Name" id="promo_banner_button_name" value="{{ old('promo_banner_button_name')}}">
                                    @error('promo_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class= "banner_type__sales">
                                <div class="form-group">
                                <label for="banner_sales_start_date">   {{ __('Banner Sale Banner Start date') }}</label>
                                    <input type="datetime-local" class="form-control" id="banner_sales_start_date" name="banner_sales_start_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_start_date') }}">
                                    @error('banner_sales_start_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                <label for="banner_sales_end_date">   {{ __('Banner Sale Banner End date') }}</label>

                                    <input type="datetime-local" class="form-control" id="banner_sales_end_date" name="banner_sales_end_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_end_date') }}">
                                    @error('banner_sales_end_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Banner status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                             <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive
                            </select>

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>
