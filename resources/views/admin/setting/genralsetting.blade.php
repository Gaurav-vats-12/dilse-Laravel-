<x-admin-app-layout>
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Genral Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Genral Setting</li>
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
                    <h3 class="card-title">Genral  Setting </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        {!!  Form::open(array('url' => route('admin.setting.genralstore' ,setting('id') ),'method' => 'PUT', 'files' => true))!!}
                        <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('site_title', 'Site Title *');!!}
                                    {!! Form::text('site_title',old('site_title' ,setting('site_title')) , array('class' => 'form-control') );!!}
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter the Site Title</small>
                                    @error('site_title')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                     {!!Form::label('site_email', 'Default Email *');!!}
                                     {!! Form::email('site_email',old('site_email' ,setting('site_email')) , array('class' => 'form-control') );!!}
                                     <small><i class="fa-solid fa-circle-question"></i>Default email will be used by your customer by contacting you</small>
                                     @error('site_email')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('phone', 'Phone Number *');!!}
                                    {!! Form::text('phone',old('phone' ,setting('phone')) , array('class' => 'form-control') );!!}
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter the vaid phone number</small>
                                    @error('phone')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 form-group">
                                    {!!Form::label('copyright_text', 'Copyright Text');!!}
                                    {!! Form::text('copyright_text',old('copyright_text' ,setting('copyright_text')) , array('class' => 'form-control') );!!}
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter copyright text</small>
                                    @error('copyright_text')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('site_currency', 'Default Currency*');!!}
                                    {!! Form::text('site_currency',old('site_currency',setting('site_currency')) , array('class' => 'form-control') );!!}
                                    <small><i class="fa-solid fa-circle-question"></i> Please Enter Site Currency</small>

                                    @error('site_currency')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('site_location', 'Location*');!!}
                                    {!! Form::select('site_location[]',array(''=>'choose location' ,'Chandigarh'=>'chandigarh','Mohali'=>'mohali'), old('site_location',setting('site_location'))  , array('class' => 'form-control select2' ,'id'=>'site_location','multiple'=>'multiple') )!!}
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('logo', 'Logo  *');!!}
                                    {!! Form::file('logo', array('id' => 'logo','class'=>'dropify' ,'data-max-file-size'=>'1M','data-max-height'=>'1000','data-errors-position'=>'outside','data-allowed-file-extensions'=>'png jpg','data-default-file'=>url('/storage/site/logo/'.setting('logo').'')) );!!}
                                    @error('logo')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                     {!!Form::label('Favicon', 'Favicon');!!}
                                     {!! Form::file('Favicon', array('id' => 'logo','class'=>'dropify' ,'data-max-file-size'=>'1M','data-max-height'=>'1000','data-errors-position'=>'outside','data-allowed-file-extensions'=>'png jpg','data-default-file'=>url('/storage/site/Favicon/'.setting('Favicon').'')) );!!}
                                     @error('Favicon')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-12 form-group">
                                     {!!Form::label('site_title', 'Address *');!!}
                                     {!! Form::textarea('address',old('address',setting('address')  ) , array('class' => 'form-control' ,'cols'=>'10','rows'=>'4') );!!}
                                     @error('address')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('facebook_url', 'Facebook');!!}
                                    {!! Form::url('facebook_url',old('facebook_url' ,setting('facebook_url')) , array('class' => 'form-control') );!!}
                                    @error('facebook_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                     {!!Form::label('youtube_url', 'Youtube');!!}
                                     {!! Form::url('youtube_url',old('youtube_url' ,setting('youtube_url')) , array('class' => 'form-control') );!!}
                                     @error('youtube_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row py-2">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    {!!Form::label('linkedin_url', 'Linkedin' );!!}
                                    {!! Form::url('linkedin_url',old('linkedin_url' ,setting('linkedin_url')) , array('class' => 'form-control') );!!}
                                    @error('linkedin_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                     {!!Form::label('instagram_url', 'Instagram');!!}
                                     {!! Form::url('instagram_url',old('instagram_url' ,setting('instagram_url')) , array('class' => 'form-control') );!!}
                                     @error('instagram_url')  <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
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
