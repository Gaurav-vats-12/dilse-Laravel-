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
                                <form method="POST" action="{{ route('admin.manage-attributes.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                                    <div class="form-group">
                                        <label for="attributes_name"> {{ __('Name') }}<span
                                                class="required"></span></label>
                                        <input type="text" name="attributes_name" id="attributes_name"
                                            class="form-control" placeholder="Name"
                                            value="{{ old('attributes_name') }}">
                                        @error('attributes_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="attributes_type" id="type" class="form-control form-select">
                                            <option value="">Select Type </option>
                                            <option value="unit"
                                                {{ old('attributes_type') == 'unit' ? 'selected' : '' }}>Unit</option>
                                            <option value="other"
                                                {{ old('attributes_type') == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                        @error('attributes_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status"> {{ __('status') }}</label>
                                        <select name="status" id="status" class="form-control form-select">
                                            <option value="">Select status</option>
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
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
