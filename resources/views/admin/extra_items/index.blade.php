<x-admin-app-layout>
<section class="content"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Manage Extra Food Items</h3>
                        <a href="{{route('admin.extra-items.create')}}" class="btn btn-primary" style="float:right;">Add Extra Food Item</a>
                      </div>
                      <div class="card-body">
                        @if($items->count()> 0)
                            <table id="datatable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @foreach($items as $Item)
                                    <tr>
                                        <td>{{$Item->id}}</td>
                                        <td>
                                            <img src="{{asset('storage/extraitems').'/'.$Item->image}}" alt="" style="width:60px; height:60px;">
                                        </td>
                                        <td>{{$Item->name}}</td>
                                        <td>{{$Item->description}}</td>
                                        <td>{{$Item->price}}</td>
                                        <td>@if($Item->status) Active @else In-Active @endif</td>
                                        <td>
                                            <a href="{{route('admin.extra-items.edit',$Item->id)}}" class="btn"><i class="fa fa-edit"></i></a>
                                            <form action="{{route('admin.extra-items.destroy',$Item->id)}}" onsubmit="return confirm('Are you sure? You want to delete.')" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit" ><i class="fa fa-trash"></i></button>
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

<!-----------------------EndModal ------------------------->
</section>    
</x-admin-app-layout>