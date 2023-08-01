<x-admin-app-layout :title="' - Page Title'">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit  Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit  Pages</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card">
                    <div class="card-body">
                       {!!  Form::open(array('url' => route('admin.manage-pages.update' ,$page->id), 'method'=>'PUT','files' => true))!!}
                        <div class="form-group">
                            {!!Form::label('page_title', 'Page Title*');!!}
                            {!! Form::text('page_title',old('page_title' ,$page->page_title) , array('class' => 'form-control','placeholder'=>'Page  title') );!!}
                            @error('page_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {!!Form::label('page_slug', 'Page Slug*');!!}
                            {!! Form::text('page_slug',old('page_slug',$page->page_slug) , array('class' => 'form-control' ,'readonly'=>'true') );!!}
                            @error('page_slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        {!!Form::label('page_content', 'Page Content');!!}
                        {!! Form::textarea('page_content',old('page_content',$page->page_content) , array('class' => 'form-control','placeholder'=>'Page Content' ,'id'=>'page_content') );!!}
                            @error('page_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                        {!!Form::label('status', 'status');!!}
                        {!! Form::select('status', array('' => 'Select banner status', 'active' => 'Active' , 'inactive' => 'Inactive' ), old('status',$page->status)  , array('class' => 'form-control form-select' ,'id'=>'status') )!!}

                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>


</x-admin-app-layout>
