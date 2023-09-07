<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Food Items</li>
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
                    <form method="POST" action="{{ route('admin.food-items.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                        <label for="Name">   {{ __('Name *') }}</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder ="Name" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="menu">   {{ __(' Menu') }}</label>
                        <select name="menu" id="menu" class="form-control form-select">
                        <option value=""> Select Menu</option>
                           @foreach( $menus as  $key=> $menu)
                            <option value="{{$menu->id}}" >{{ $menu->menu_name}}</option>
                              @endforeach

                            </select>

                            @error('menu')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                        <label for="spicy_lavel">   {{ __('Spice level') }}</label>
                        <select name="spicy_lavel[]" id="spicy_lavel" class="form-control select2" multiple>
                        <option value=""> Select Spice Lavel</option>
                           @foreach( $attribuite as  $key=> $attribuite)
                            <option value="{{$attribuite->id}}"  >{{ $attribuite->attributes_name}}</option>
                              @endforeach
                            </select>
                            @error('spicy_lavel')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                        <label for="product_image">   {{ __('Logo Image') }}</label>
                            <input type="file" name="product_image" id="product_image"  class="form-control dropify" >
                            @error('product_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="description"> {{ __('Description') }}</label>
                        <textarea name="description" id="description" class="form-control summernote" placeholder="Enter Description" >{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="price">   {{ __('Price') }}</label>
                        <input type="text" class="form-control" min="1" max="1000" name="price" placeholder="Enter Price" value="{{old('price')}}" >
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>  {{ __('Featured') }}</h6>
                          <label class="switch" for="featured">
                        <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') == 1 ? 'checked' : '' }}>
                        <span class="slider round"></span>
                        </label>
                            @error('featured')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>  {{ __('Extra Items') }}</h6>
                          <label class="switch" for="extra_items">
                        <input type="checkbox" name="extra_items" id="extra_items" value="1" {{ old('extra_items') == 1 ? 'checked' : '' }}>
                        <span class="slider round"></span>
                        </label>

                            @error('extra_items')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="status">   {{ __('Status') }}</label>
                        <select name="status" id="status" class="form-control form-select">
                            <option value="">Select status</option>
                            <option value= '1' {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
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
