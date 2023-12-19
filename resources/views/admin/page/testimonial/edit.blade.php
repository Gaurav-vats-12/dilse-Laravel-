<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Testomonials</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Pages</li>
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
                                <form method="POST" action="{{ route('admin.testimonial.update', $Testimonial->id) }}"
                                    accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="custumber_name">Customer Full Name</label>
                                        <input type="text" name="custumber_name" id="custumber_name"
                                            class="form-control"
                                            value="{{ old('custumber_name', $Testimonial->custumber_name) }}">
                                        @error('custumber_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="google_testonomails_link">Google Testomonial Link</label>
                                        <input type="url" readonly name="google_testonomails_link" id="google_testonomails_link"
                                            class="form-control" value="{{ old('google_testonomails_link', $Testimonial->google_testonomails_link) }}">
                                        @error('google_testonomails_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonial_description">Discription</label>
                                        <textarea name="testimonial_description" id="testimonial_description" class="form-control summernote">{!! old('testimonial_description', $Testimonial->testimonial_description) !!}</textarea>
                                        <small><i class="fa-solid fa-circle-question"></i> Please Enter testonomials
                                            description</small>
                                        @error('testimonial_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="testonomailsImage">Customer Image</label>
                                        <input type="file" name="testonomailsImage" id="testonomailsImage"
                                            class="dropify" data-max-height="80" data-max-width="80"
                                            data-errors-position='outside' data-allowed-file-extensions="png jpg jpng"
                                            data-default-file="{{ url('/storage/testimonial/' . $Testimonial->testonomailsImage . '') }}">
                                        <small><i class="fa-solid fa-circle-question"></i>Please Choose your image
                                            supported forment<b>png jpng ,jpg</b>image must by 80 *80 pixal</small>
                                        @error('testonomailsImage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="rating">Rating</label>
                                        <select name="rating" id="rating" class="form-control form-select">
                                            <option value="">Select Rating</option>
                                            <option value="1"
                                                {{ old('rating', $Testimonial->rating) == '1' ? 'selected' : '' }}>1
                                            </option>
                                            <option value="2"
                                                {{ old('rating', $Testimonial->rating) == '2' ? 'selected' : '' }}>2
                                            </option>
                                            <option value="3"
                                                {{ old('rating', $Testimonial->rating) == '3' ? 'selected' : '' }}>3
                                            </option>
                                            <option value="4"
                                                {{ old('rating', $Testimonial->rating) == '4' ? 'selected' : '' }}>4
                                            </option>
                                            <option value="5"
                                                {{ old('rating', $Testimonial->rating) == '5' ? 'selected' : '' }}>5
                                            </option>
                                        </select>
                                        @error('rating')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select status</option>
                                            <option value="active"
                                                {{ old('status', $Testimonial->status) == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ old('status', $Testimonial->status) == 'inactive' ? 'selected' : '' }}>
                                                Inactive
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
