<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Extra Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Extra  Food Items</li>
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
                    <form method="POST" action="{{ route('admin.extra-items.update' ,$extraItem->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf @method('put')
                        <div class="form-group">
                        <label for="name">   {{ __('Name *') }}</label>
                        <input type="text" name="name" id="name" class="form-control summernote" placeholder ="Blog Name" value="{{ old('name' ,$extraItem->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="extra_product_image">   {{ __('Logo Image') }}</label>
                            <input type="file" name="extra_product_image" id="extra_product_image"  class="form-control dropify" data-default-file="{{ url('/storage/products/addon/'.$extraItem->image.'') }}" >
                            @error('extra_product_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="description"> {{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Enter Description" >{{ old('description',$extraItem->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="price">   {{ __('Price') }}</label>
                        <input type="number" class="form-control" min="1" max="1000" name="price" placeholder="Enter Price" value="{{old('price',$extraItem->price)}}" >
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value= '1' {{ old('status' ,$extraItem->status) == '1' ? 'selected' : '' }}>Active</option>
                             <option value=0 {{ old('status' ,$extraItem->status) == '0' ? 'selected' : '' }}>Inactive
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
