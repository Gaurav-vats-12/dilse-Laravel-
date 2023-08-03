<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All testimonial</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">All testimonial</li>
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
                    <div class="card-header">
                <a href="{{ route('admin.testimonial.create')}}" type ="button" class="btn btn-success float-right" >Add testimonial</a>
              </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Description</th>
                                        <th>Customber Name</th>
                                        <th>Customber image </th>
                                        <th>Rating </th>
                                        <th>Status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($Testimonial as $key => $value)
                                <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{!! $value->custumber_name !!}</td>
                                <td class="">{!! $value->testimonial_description !!}</td>
                                <td><img src="{{ url('/storage/testimonial/'.$value->testonomailsImage.'')}}" style="height: 34px; width: auto;"></td>
                                <td class="testimonial_user_txt "> <ul>@for($i=1; $i<=$value->rating; $i++)  <li><img src="{{asset('frontend/img/stars-1.png')}}" alt="" /></li> @endfor</ul></td>
                                <td> @if ($value->status == 'active')<div class="mt-sm-1 d-block"> <span class="badge badge-success">Active</span>  </div> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Inactive</span> </div> @endif </td>
                                <td class="project-actions">
                          <a class="btn btn-info btn-sm" href="{{ route('admin.testimonial.edit', $value->id) }}">
                              <i class="fas fa-pencil-alt">
                              </i>
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{ route('admin.testimonial.destroy', $value->id) }}" data-confirm-delete="true">
                              <i class="fas fa-trash">
                              </i>
                          </a>
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
