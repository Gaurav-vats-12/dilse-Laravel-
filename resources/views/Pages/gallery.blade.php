@extends('layouts.app')
@section('meta')
<meta name="title" content="Home Page">
<meta name="url" content="{{url('/gallery')}}">
<meta name="description" content="Gallery Page">
  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="{{url('/gallery')}}">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Gallery Page">
  <meta property="og:description" content="Gallery Page">
  <meta property="og:image" content="">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{url('/gallery')}}">
  <meta property="twitter:domain" content="{{url('/gallery')}}">
  <meta name="twitter:title" content="Home Page">
  <meta name="twitter:description" content="Gallery Page">
  <meta name="twitter:image" content="">     
  <link rel="canonical" href="{{url('/gallery')}}">
@endsection
@section('title', 'About Us')
@section('title', 'Gallery')
@section('frontcontent')
<section class="inner_bannner bg_style" style="background-image: url('{{ asset('frontend/img/gallery.jpg') }}')">
    <div class="about_banner_section">
        <div class="home-slider-main">
            <div class="container">
                <div class="home-slider-content">
                    <h1>Gallery</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="gallery_pics py_8">
    <div class="container">
        <div class="row">
            @if (isset($gallery) && count($gallery) >0)
            @php $i = 0 @endphp
            @foreach ($gallery as $key => $gallery )
            @php $i++ @endphp
            @if($i == 1)
            <div class="col-md-4">
                @endif
                <div class="gallery_pics_crd">
                    <div class="gallery_crd_img">
                        <a class="image-popup-vertical-fit" href="{{ url('/storage/gallery/'.$gallery->image.'') }}"
                            title="{{$gallery->name}}">
                            <img src="{{ url('/storage/gallery/'.$gallery->image.'') }}" alt="{{$gallery->name}}" />
                        </a>
                    </div>
                </div>
                @if($i == 3)
            </div>
            @php $i= 0 @endphp
            @endif

            @endforeach
            @else
            <h4>No Gallery Found</h4>
            @endif
        </div>
    </div>

    </div>
</section>
@endsection
