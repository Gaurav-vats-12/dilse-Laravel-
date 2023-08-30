@extends('layouts.app')
@section('title', 'Blog')
@section('title', 'Blog')
@section('frontcontent')
<section class="inner_bannner bg_style" style="background-image: url('{{asset('frontend/img/about_banner-image.png') }}')">
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1>Blog</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="featured_posts">
        <div class="container">
          <div class="tittle_heading">
          </div>
          <div class="row">
            @if (isset($blog) && count($blog) >0)
            @foreach ($blog  as $blog )
            <div class="col-md-4">
              <div class="featured_card">
                  <a href="{{route('blogdetails' ,$blog->slug)}}">
                <div class="post_img">
                  <img src="{{ url('/storage/blog/'.$blog->blog_image.'') }}" alt="{{ $blog->blog_image}}" />
                </div>
                  </a>
                  
                <div class="post_txt">
                  <h3>
                    {{ $blog->blog_title}}
                  </h3>
                  <p>
                  {!! \Illuminate\Support\Str::limit(strip_tags($blog->blog_content)) !!}
                  </p>
                  <div class="post_btn">
                    <a href="{{route('blogdetails' ,$blog->slug)}}">READ MORE</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            @else
            <h4>No Blog Found</h4>
            @endif
          </div>
        </div>
      </section>

@endsection
