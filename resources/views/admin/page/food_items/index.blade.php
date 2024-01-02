@php use Illuminate\Support\Str; @endphp
<x-admin-app-layout :title="' - Page Title'">
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><a href="{{ route('admin.food-items.create')}}" type="button"
                                                    class="btn btn-success float-right">Add Food Items</a>
                        </div>
                        <div class="card-body">
                            <table id="food_items" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Menu</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Featured</th>
                                    <th>Exta Items</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($foodItems as $key => $foodItem)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td> @if(strpos($foodItem->image, "https://") !== false)
                                                <img src="{{$foodItem->image}}" alt="" style="width:60px; height:60px;">
                                            @else
                                                <img src="{{ url('/storage/products/'.$foodItem->image.'') }}" alt=""
                                                     style="width:60px; height:60px;">
                                            @endif </td>
                                        <td>{{$foodItem->name}}</td>
                                        <td>{{$foodItem->menu->menu_name}}</td>
                                        <td>{!! Str::limit(strip_tags($foodItem->description)) !!}</td>
                                        <td>{{$foodItem->price}}</td>
                                        <td> @if ($foodItem->status == 1)
                                                <div class="mt-sm-1 d-block"><span
                                                            class="badge badge-success">Active</span></div>
                                            @else
                                                <div class="mt-sm-1 d-block"><span
                                                            class="badge badge-danger  ">Inactive</span></div>
                                            @endif </td>
                                        <td>@if($foodItem->featured)
                                                {{'Yes'}}
                                            @else
                                                {{'No'}}
                                            @endif</td>
                                        <td>@if($foodItem->extra_items)
                                                {{'Yes'}}
                                            @else
                                                {{'No'}}
                                            @endif</td>
                                        <td class="project-actions">
                                       
                                            <a class="btn btn-info btn-sm" href="{{ route('admin.food-items.edit', $foodItem->id) }}">
                                                <i class="fas fa-pencil-alt"></i> </a>
                                                <a class="btn btn-info btn-sm" href="javascript:void(0)" id="product_url" copy_url_id ="{{ route('menudetails' , $foodItem->slug)}}">
                                        <i class="fa-solid fa-copy"></i></a>
                                            <form method="POST"
                                                  action="{{ route('admin.food-items.destroy', $foodItem->id) }}">  @csrf @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'><i
                                                            class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

</x-admin-app-layout>
