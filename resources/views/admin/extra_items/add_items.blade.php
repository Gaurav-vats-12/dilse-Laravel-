<div class="card col-12 m-3">
    <div class="card-header">
      <h3 class="card-title col-8">Extra Food Items Details</h3>
    </div>
    <div class="card-body col-md-8">
      <form  method="POST" action="{{route('admin.extra-items.store')}}" enctype="multipart/form-data">
          
          @csrf
          
          <div class="col-md-12 form-group">
              <label>Name</label>
              <input type="text" name="name" class="form-control"  placeholder="Enter Name" value="{{old('name')}}">
             
              @error('name')
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
              <input type="number" class="form-control" min="1" max="1000" name="price" placeholder="Enter Price" value="{{old('price')}}">                               
              @error('price')
                  <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
        
          <button type="submit" class="btn btn-primary col-md-2 offset-md-5">Submit</button>
        </form>
  </div>
</div> 