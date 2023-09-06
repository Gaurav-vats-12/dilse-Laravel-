@php use App\Models\Admin\Gallery; @endphp
<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Create Gallery</li>
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
                                <form method="POST" action="{{ route('admin.manage-gallery.store')}}"
                                      accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <label for="image_title">   {{ __('Title *') }}</label>
                                        <input type="text" name="image_title" id="image_title" class="form-control"
                                               placeholder="Image title" value="{{ old('image_title') }}">
                                        @error('image_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gallery_image">   {{ __('Image') }}</label>
                                        <input type="file" name="gallery_image" id="gallery_image"
                                               class="form-control dropify">
                                        @error('gallery_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="image_postion">   {{ __('Short Order') }}</label>
                                        <input type="number" name="image_postion" id="image_postion"
                                               class="form-control" min="0" max="{{Gallery::count()}}"
                                               placeholder="Short Order" value="{{ old('image_postion',0) }}">
                                        @error('image_postion')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">   {{ __('Gallery status') }}</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select status</option>
                                            <option value='1' {{ old('status') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value=0 {{ old('status') == '0' ? 'selected' : '' }}>Inactive
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
