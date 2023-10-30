<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Coupons</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">All Coupons</li>
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
                            <a href="{{ route('admin.manage-coupon.create')}}" type="button" class="btn btn-success float-right">Add
                                Coupons</a>
                        </div>
                        <div class="card-body">
                            <table id="blog_table" class="table table-bordered table-hover">
                                <thead class="text-uppercase">
                                <tr>
                                    <th>Sno</th>
                                    <th>Coupon Code </th>
                                    <th>Discount Type </th>
                                    <th>coupon Type </th>
                                    <th>Coupon Value  </th>
                                    <th>Start date</th>
                                    <th>End date</th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Coupon as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $value->code }}</td>
                                        <td>{{ $value->type }}</td>
                                        <td>{{ $value->coupon_type }}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td>{{ $value->start_date }}</td>
                                        <td>{{ $value->end_date }}</td>
                                        <td> @if ($value->status == '1')<div class="mt-sm-1 d-block"> <span class="badge badge-success">Active</span>  </div> @else <div class="mt-sm-1 d-block"> <span class="badge badge-danger  ">Inactive</span> </div> @endif </td>
                                        <td class="project-actions"><a class="btn btn-info btn-sm"
                                                                 href="{{ route('admin.manage-coupon.edit', $value->id) }}">
                     <i class="fas fa-pencil-alt"></i> </a>
                 <form method="POST"
                       action="{{ route('admin.manage-coupon.destroy', $value->id) }}">  @csrf @method('DELETE')
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
