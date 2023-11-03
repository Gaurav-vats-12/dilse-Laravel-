<x-admin-app-layout>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Referral Setting</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Referral Setting</li>
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
                    <h3 class="card-title">Referral Setting </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('admin.setting.referralstore', reffrelsetting('id')) }}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf @method('PUT')
                                <div class="form-group">
                                    <h6>  Enable Referral Setting </h6>
                                    <label class="switch" for="referral_status">
                                        <input type="checkbox" name="referral_status" id="referral_status" value="1" {{ old('referral_status',reffrelsetting('referral_status')) == 1 ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div id="reffral_dependent">
                                    <div class="row py-2">
                                        <div class="col-xl-12 col-lg-6 col-6 form-group">
                                            <label for="referral_points">Referral Points ( %)</label>
                                            <input type="text" name="referral_points" id="referral_points"  class="form-control" value="{{ old('referral_points',reffrelsetting('referral_points'))}}">
                                            @error('referral_points')  <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <!-- <div class="row py-2">
                                        <div class="col-xl-12 col-lg-6 col-6 form-group">
                                            <label for="referral_privacy_policy">Referral Privacy policy </label>
                                            <textarea name="referral_privacy_policy" id="referral_privacy_policy" class="form-control summernote" placeholder="Enter Description" >{{ old('referral_privacy_policy',reffrelsetting('referral_privacy_policy')) }}</textarea>
                                            @error('referral_privacy_policy')  <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div> -->
                                </div>
                                <div class="col-12 form-group mg-t-8 mt-2">
                                    <button type="submit" class="btn btn-primary"><i class="fe fe-plus-circle"></i> Update</button>
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
