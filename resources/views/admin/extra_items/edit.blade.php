<x-admin-app-layout>
<section class="content">  
        <div class="container-fluid">
            <div class="row">
               <div class="col-12">
                    <div class="card col-12">
                      <div class="card-header text-center">
                        <h3 class="card-title col-8 text-center ">Extra Food Items Details</h3>
                      </div>
                      <div class="card-body col-md-8">
                        <form  method="POST" action="{{route('admin.extra-items.update',$extraItem->id)}}"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{$extraItem->name}}">
                               
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                            <div class="row col-md-12 form-group">
                                <label>Logo Image :</label><br/>
                                <div class="col-md-12 form-control">
                                    <input type="file" name="logo_image" accept="image/png, image/jpeg">
                                    <input type="hidden" name="old_image" value="{{$extraItem->image}}">
                                </div>

                                @error('logo_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row col-md-12 form-group">
                               <img src="{{asset('storage/extraitems').'/'.$extraItem->image}}" alt="" style="width:100px; height:100px;">   
                            </div>
                           
                            <div class="row col-md-12 form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" placeholder="Enter Description">{{$extraItem->description}}</textarea>
                               
                                @error('description')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row col-md-12 form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" min="0" max="1000" name="price" placeholder="Enter Price" value="{{$extraItem->price}}">                               
                                @error('price')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row col-md-12  form-control">
                                <label>Status</label>
                                <input type="radio" value="1" name="status" @if($extraItem->status) checked @endif> Active
                                <input type="radio" value="0" name="status" @if(!$extraItem->status) checked @endif> In-Active

                                @error('status')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary col-md-2 offset-md-5">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
</section>    
</x-admin-app-layout>