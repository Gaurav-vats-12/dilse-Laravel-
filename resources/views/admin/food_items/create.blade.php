<x-admin-app-layout>
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
               <div class="col-12">
                <div class="card col-12 m-3">
                    <div class="card-header">
                      <h3 class="card-title col-8">Food Item Details</h3>
                    </div>
                    <div class="card-body col-md-8">
                      <form  method="POST" action="{{route('admin.food-items.store')}}" enctype="multipart/form-data">
                          
                          @csrf
                          <div class="col-md-12 form-group">
                              <label>Name</label>
                              <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{old('name')}}">
                             
                              @error('name')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>

                          <div class="col-md-12 form-group">
                              <label>Menu</label>
                              <select name="menu_id" class="form-control">
                                  <option value=""> Select Menu</option>
                                  @foreach( $menus as  $key=> $menu)
                                      <option value="{{$key}}" >{{ $menu->menu_name}}</option>
                                  @endforeach
                              </select>
                             
                              @error('restaurant_id')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                
                         
                          <div class="row col-md-12 form-group">
                              <label>Logo Image :</label><br/>
                              <div class="col-md-12 form-control">
                                  <input type="file" name="logo_image" accept="image/png, image/jpeg">
                              </div>
                
                              @error('logo_image')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                         
                          <div class="row col-md-12 form-group">
                              <label>Description</label>
                              <textarea name="description" class="form-control" placeholder="Enter Description">{{Request::old('description')}}</textarea>
                             
                              @error('description')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                
                          <div class="row col-md-12 form-group">
                              <label>Price</label>
                              <input type="number" class="form-control" min="1" max="1000" name="price" placeholder="Enter Price" value="{{old('price')}}" >                                
                              @error('price')
                                  <span class="text-danger">{{$message}}</span>
                              @enderror
                          </div>
                
                
                
                          <div class="row col-md-12 ">
                              <div class="col-md-6 form-group">
                                  <label>Featured  </label>
                                  <input type="checkbox" value="1" name="featured">
                
                                  @error('featured')
                                      <span class="text-danger">{{$message}}</span>
                                  @enderror
                              </div>
                          </div>
                
                
                          <button type="submit" class="btn btn-primary col-md-2 offset-md-5">Submit</button>
                        </form>
                  </div>
                </div>
                </div>
            </div>
        </div>
</section>    
</x-admin-app-layout>