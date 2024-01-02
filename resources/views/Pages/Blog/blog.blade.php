@php use Illuminate\Support\Str; @endphp
@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('/blog')}}">
<meta name="description" content="blog Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('/blog')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="blog Page">
  <meta property="og:description" content="blog Page">
  <meta property="og:image" content="blog">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('/blog')}}">
  <meta property="twitter:domain" content="{{url('/blog')}}">
  <meta name="twitter:title" content="blog Page">
  <meta name="twitter:description" content="blog Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('/blog')}}">
@endsection
@section('title', 'Blog')
@section('frontcontent')
    <section class="inner_bannner bg_style"
             style="background-image: url('{{asset('frontend/img/about_banner-image.png') }}')">
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
    <section class="featured_posts py_8">
        <div class="container">

            <div class="row">
                @if (isset($blog) && count($blog) >0)
                    @foreach ($blog  as $blog )
                        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                            <div class="featured_card">
                                <a href="{{route('blogdetails' ,$blog->slug)}}" class="">
                                    <div class="post_img">
                                        <img src="{{ url('/storage/blog/'.$blog->blog_image.'') }}"
                                             alt="{{ $blog->blog_image}}"/>
                                    </div>
                                </a>
                                <div class="post_txt">
                                    <h3>
                                        {{ $blog->blog_title}}
                                    </h3>
                                    <p>
                                      <!-- {!! Str::limit(strip_tags($blog->blog_short_content),50) !!} -->
                                    </p>
                                    <div class="post_btn">
                                        <a href="{{route('blogdetails' ,$blog->slug)}}" class="theme_btn">Read More</a>
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
