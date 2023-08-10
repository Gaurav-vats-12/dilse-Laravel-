<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Extra Food Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Manage Extra Food Items</li>
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
                    <div class="card-header"><a href="{{ route('admin.extra-items.create')}}" type ="button" class="btn btn-success float-right" >Add Extra Food Item</a>
              </div>
                        <div class="card-body">
                        <table id="extra_food_items" class="table table-bordered table-striped">
                                <thead class="text-uppercase">
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

                                @foreach($items as $key=> $Item)
                                    <tr>
                                    <td>{{ $key + 1 }}</td>                                        <td>
                                            <img src="{{ url('/storage/products/addon/'.$Item->image.'') }}" alt="" style="width:60px; height:60px;">
                                        </td>
                                        <td>{{$Item->name}}</td>
                                        <td class="">{!! $Item->description !!}</td>
                                        <td>{{$Item->price}}</td>
                                        <td> @if ($Item->status == 1)<div class="mt-sm-1 d-block"> <span class="badge badge-success">Active</span>  </div> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Inactive</span> </div> @endif </td>
                                        <td class="project-actions"><a class="btn btn-info btn-sm" href="{{ route('admin.extra-items.edit', $Item->id) }}"> <i class="fas fa-pencil-alt"></i> </a><form method="POST" action="{{ route('admin.extra-items.destroy', $Item->id) }}">  @csrf @method('DELETE') <button type="submit" class="btn btn-sm btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'><i class="fas fa-trash"></i></button> </form></td>


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
