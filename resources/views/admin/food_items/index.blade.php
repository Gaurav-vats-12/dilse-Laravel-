<x-admin-app-layout>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All Food Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Manage Food Items</h3>
                        <a href="{{route('admin.food-items.create')}}" class="btn btn-primary" style="float:right;">Add New Food Item</a>
                      </div>
                      <div class="card-body">
                        @if($foodItems->count()> 0)
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Menu</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Featured</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                @foreach($foodItems as $foodItem)
                                    <tr>
                                        <td>{{$foodItem->id}}</td>
                                        <td>
                                            @if(strpos($foodItem->image, "https://") !== false)
                                                <img src="{{$foodItem->image}}" alt="" style="width:60px; height:60px;">
                                            @else
                                                <img src="{{asset('storage/food-items').'/'.$foodItem->image}}" alt="" style="width:60px; height:60px;">
                                            @endif
                                        </td>
                                        <td>{{$foodItem->name}}</td>
                                        <td>{{$foodItem->menu->menu_name}}</td>
                                        <td>{{$foodItem->description}}</td>
                                        <td>{{$foodItem->price}}</td>
                                        <td>@if($foodItem->status) Active @else In-Active @endif</td>
                                        <td>@if($foodItem->featured) {{'Yes'}} @else {{'No'}} @endif</td>
                                        <td>
                                            <a href="{{route('admin.food-items.edit',$foodItem->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{route('admin.food-items.destroy',$foodItem->id)}}" onsubmit="return confirm('Are you sure? You want to delete.')" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" ><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                       
                                    </tr>
                                @endforeach      
                                </tbody>
                            </table>  
                        @else
                            <h5 class="text-center">No Record Found</h5>
                        @endif  
                    </div>
                </div>
            </div>
        </div>
</section>    
</x-admin-app-layout>