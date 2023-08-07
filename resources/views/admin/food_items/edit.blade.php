<x-admin-app-layout>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Food Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">
        <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                    <div class="card col-12">
                      <div class="card-header">
                        <h3 class="card-title col-8 ">Food Items Details</h3>
                      </div>
                      <div class="card-body col-md-8">
                        
                        <form  method="POST" action="{{route('admin.food-items.update',$foodItem->id)}}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{$foodItem->name}}">
                               
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 form-group">
                                <label>Menu</label>
                                <select name="menu_id" class="form-control">
                                    <option value=""> Select menu</option>
                                    @foreach( $menus as  $key=> $category)
                                        <option value="{{$key}}" @if($foodItem->menu->id == $key) selected @endif>{{ $category}}</option>
                                    @endforeach
                                </select>
                               
                                @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <div class="row col-md-12 form-group">
                                <label>Logo Image :</label><br/>
                                <div class="col-md-12 form-control">
                                    <input type="file" name="logo_image" accept="image/png, image/jpeg">
                                    <input type="hidden" name="old_image" value="{{$foodItem->image}}">
                                </div>
                            </div>

                            <div class="row col-md-12 form-group">

                                @if(strpos($foodItem->image, "https://") !== false)
                                    <img src="{{$foodItem->image}}" alt="" style="width:100px; height:100px;">
                                @else
                                    <img src="{{asset('storage/food-items').'/'.$foodItem->image}}" alt="" style="width:100px; height:100px;">
                                @endif
                        
                            </div>
                           
                            <div class="row col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter Description">{{$foodItem->description}}</textarea>
                               
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row col-md-12 form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" min="0" max="1000" name="price" placeholder="Enter Price" value="{{$foodItem->price}}">                               
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>



                            <div class="row col-md-12 ">
                                <div class="col-md-6 form-group">
                                    <label>Status</label>
                                    <input type="radio" value="1" name="status" @if($foodItem->status) checked @endif> Active
                                    <input type="radio" value="0" name="status" @if(!$foodItem->status) checked @endif> In-Active

                                    @error('status')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Featured</label>
                                    <input type="checkbox" value="1" name="featured"  @if($foodItem->featured) checked @endif>
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
</section>    
</x-admin-app-layout>