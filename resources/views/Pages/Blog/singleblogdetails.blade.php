@extends('layouts.app')
@section('title', $blog->blog_title)
@section('frontcontent')
    <section class="about_se py_8">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                    <div class="about_img">
                        <img src="{{ url('/storage/blog/'.$blog->blog_image.'') }}" alt="{{ $blog->blog_image}}" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mb-4 mb-xl-0">
                    <div class="about_cntnt">
                        <h2>  {{ __($blog->blog_title) }}</h2>
                        <p> Posted on {{ $blog->created_at->format('M d, Y') }} by {{ $blog->author }}</p>
                        <p>
                            {!!$blog->blog_content !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
