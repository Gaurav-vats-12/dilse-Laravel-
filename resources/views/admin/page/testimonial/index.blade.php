@php use Illuminate\Support\Str; @endphp
<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Testimonial</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Testimonial</li>
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
                            <a href="{{ route('admin.testimonial.create') }}" type="button"
                                class="btn btn-success float-right">Add Testimonial</a>
                        </div>
                        <div class="card-body">
                            <table id="testonomails_table" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>Sno</th>
                                        <th> Name</th>
                                        <th> image</th>
                                        <th>Description</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Testimonial as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{!! $value->custumber_name !!}</td>
                                            <td><img src="{{ url('/storage/testimonial/' . $value->testonomailsImage . '') }}"
                                                    style="height: 34px; width: auto;"></td>
                                            <td>{!! Str::limit(strip_tags($value->testimonial_description), 40) !!}</td>
                                            <td class="testimonial_user_txt ">
                                                <ul>
                                                    @for ($i = 1; $i <= $value->rating; $i++)
                                                        <li><img src="{{ asset('frontend/img/stars-1.png') }}"
                                                                alt="" /></li>
                                                    @endfor
                                                </ul>
                                            </td>
                                            <td>
                                                @if ($value->status == 'active')
                                                    <div class="mt-sm-1 d-block"><span
                                                            class="badge badge-success">Active</span></div>
                                                @else
                                                    <div class="mt-sm-1 d-block"><span
                                                            class="badge badge-danger  ">Inactive</span></div>
                                                @endif
                                            </td>
                                            <td class="project-actions"><a class="btn btn-info btn-sm"
                                                    href="{{ route('admin.testimonial.edit', $value->id) }}">
                                                    <i class="fas fa-pencil-alt"></i> </a>
                                                <form method="POST"
                                                    action="{{ route('admin.testimonial.destroy', $value->id) }}"> @csrf
                                                    @method('DELETE')
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
