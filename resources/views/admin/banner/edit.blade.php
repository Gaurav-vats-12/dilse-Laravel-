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
            <li class="breadcrumb-item active">Create Banner</li>
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
                    {!!  Form::open(array('url' => route('admin.banner.update', $Banner->id), 'method'=>'put', 'files' => true))!!}
                        <div class="form-group">
                            {!!Form::label('banner_title', 'Banner Title*');!!}
                            {!! Form::text('banner_title',old('banner_title' ,$Banner->banner_title) , array('class' => 'form-control','placeholder'=>'Banner title') );!!}
                            @error('banner_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!!Form::label('banner_heading', 'Banner Heading*');!!}
                            {!! Form::text('banner_heading',old('banner_heading' ,$Banner->banner_heading) , array('class' => 'form-control','placeholder'=>'Banner Heading') );!!}
                            @error('banner_heading')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        {!!Form::label('banner_discription', 'Banner Discription');!!}
                        {!! Form::textarea('banner_discription',old('banner_discription' ,$Banner->banner_discription) , array('class' => 'form-control','placeholder'=>'Banner Discription') );!!}
                            @error('banner_discription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            {!!Form::label('banner_image', 'Banner Image');!!}
                            {!! Form::hidden('upload_url',old('upload_url') );!!}
                            {!! Form::file('banner_image', array('id' => 'banner_image','class'=>'dropify' ,'data-max-file-size'=>'1M','data-max-height'=>'1000','data-errors-position'=>'outside','data-allowed-file-extensions'=>'png jpg' ,'data-default-file'=>url('/storage/banner/'.$Banner->bannerImage.'')) );!!}
                            @error('banner_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
</div> -->
                        <div class="form-group">
                           {!!Form::label('banner_type', 'Banner Type');!!}
                           {!! Form::select('banner_type', array('' => 'Select banner Type', 'home' => 'Home' , 'popup' => 'Popup' , 'promo' => 'Promo' , 'sales' => 'Sales'), old('banner_type' ,$Banner->banner_type)  , array('class' => 'form-control form-select' ,'id'=>'banner_type') )!!}
                            @error('banner_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div id="dependency">
                            @if ($Banner->banner_type =='home')
                            <div class= "banner_type__home">
                                <div class="form-group">
                                {!!Form::label('home_banner_button_url', 'Home Banner Url');!!}
                                {!! Form::url('home_banner_button_url',old('home_banner_button_url' ,$Banner->banner_details1) , array('class' => 'form-control','placeholder'=>'Home Banner Url') );!!}
                                    @error('home_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('home_banner_button_name', 'Home Banner Name');!!}
                                {!! Form::text('home_banner_button_name',old('home_banner_button_name' ,$Banner->banner_details2) , array('class' => 'form-control','placeholder'=>'Home Banner Name') );!!}
                                    @error('home_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @else
                            <div class= "banner_type__home">
                                <div class="form-group">
                                {!!Form::label('home_banner_button_url', 'Home Banner Url');!!}
                                {!! Form::url('home_banner_button_url',old('home_banner_button_url') , array('class' => 'form-control','placeholder'=>'Home Banner Url') );!!}
                                    @error('home_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('home_banner_button_name', 'Home Banner Name');!!}
                                {!! Form::text('home_banner_button_name',old('home_banner_button_name') , array('class' => 'form-control','placeholder'=>'Home Banner Name') );!!}
                                    @error('home_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif
                            @if ($Banner->banner_type =='popup')
                            <div class= "banner_type__popup">
                                <div class="form-group">
                                {!!Form::label('popup_banner_button_url', 'Popup Banner Url');!!}
                                {!! Form::url('popup_banner_button_url',old('popup_banner_button_url',$Banner->banner_details1  ) , array('class' => 'form-control','placeholder'=>'pop up Banner Url') );!!}
                                    @error('popup_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('popup_banner_button_name', 'Popup Banner Name');!!}
                                {!! Form::text('popup_banner_button_name',old('popup_banner_button_name' ,$Banner->banner_details1) , array('class' => 'form-control','placeholder'=>'popup Banner Name') );!!}
                                    @error('popup_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @else
                            <div class= "banner_type__popup">
                                <div class="form-group">
                                {!!Form::label('popup_banner_button_url', 'Popup Banner Url');!!}
                                {!! Form::url('popup_banner_button_url',old('popup_banner_button_url'   ) , array('class' => 'form-control','placeholder'=>'pop up Banner Url') );!!}
                                    @error('popup_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('popup_banner_button_name', 'Popup Banner Name');!!}
                                {!! Form::text('popup_banner_button_name',old('popup_banner_button_name') , array('class' => 'form-control','placeholder'=>'popup Banner Name') );!!}
                                    @error('popup_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif
                            @if ($Banner->banner_type =='promo')
                            <div class= "banner_type__promo">
                                <div class="form-group">
                                {!!Form::label('promo_banner_button_url', 'Promo Banner Url');!!}
                                {!! Form::url('promo_banner_button_url',old('promo_banner_button_url' ,$Banner->banner_details1 ) , array('class' => 'form-control','placeholder'=>'Promo Banner Url') );!!}
                                    @error('promo_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('promo_banner_button_name', '    Promo Banner Name');!!}
                                {!! Form::text('promo_banner_button_name',old('promo_banner_button_name' ,$Banner->banner_details2 ) , array('class' => 'form-control','placeholder'=>'promo Banner Name') );!!}
                                    @error('promo_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @else
                            <div class= "banner_type__promo">
                                <div class="form-group">
                                {!!Form::label('promo_banner_button_url', 'Promo Banner Url');!!}
                                {!! Form::url('promo_banner_button_url',old('promo_banner_button_url') , array('class' => 'form-control','placeholder'=>'Promo Banner Url') );!!}
                                    @error('promo_banner_button_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('promo_banner_button_name', '    Promo Banner Name');!!}
                                {!! Form::text('promo_banner_button_name',old('promo_banner_button_name') , array('class' => 'form-control','placeholder'=>'promo Banner Name') );!!}
                                    @error('promo_banner_button_name')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif
                            @if ($Banner->banner_type =='sales')

                            <div class= "banner_type__sales">
                                <div class="form-group">
                                {!!Form::label('banner_sales_start_date', 'Banner Sale Banner Start date');!!}
                                    <input type="datetime-local" class="form-control" id="banner_sales_start_date" name="banner_sales_start_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_start_date' ,$Banner->banner_details1) }}">
                                    @error('banner_sales_start_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('banner_sales_end_date', 'Banner Sale Banner End date');!!}
                                    <input type="datetime-local" class="form-control" id="banner_sales_end_date" name="banner_sales_end_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_end_date',$Banner->banner_details2) }}">
                                    @error('banner_sales_end_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @else
                            <div class= "banner_type__sales">
                                <div class="form-group">
                                {!!Form::label('banner_sales_start_date', 'Banner Sale Banner Start date');!!}
                                    <input type="datetime-local" class="form-control" id="banner_sales_start_date" name="banner_sales_start_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_start_date') }}">
                                    @error('banner_sales_start_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                {!!Form::label('banner_sales_end_date', 'Banner Sale Banner End date');!!}
                                    <input type="datetime-local" class="form-control" id="banner_sales_end_date" name="banner_sales_end_date" placeholder="Start Sale  Date" value="{{ old('banner_sales_end_date') }}">
                                    @error('banner_sales_end_date')  <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                        {!!Form::label('status', 'Banner status');!!}
                        {!! Form::select('status', array('' => 'Select banner status', 'active' => 'Active' , 'inactive' => 'Inactive' ), old('status',$Banner->status)  , array('class' => 'form-control form-select' ,'id'=>'status') )!!}

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Update Banner </button>
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
