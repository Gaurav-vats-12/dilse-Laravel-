@extends('layouts.app')
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
            @foreach ($gallery  as $key => $gallery )
                <div class="col-md-4">
                    <div class="gallery_pics_crd">
                        <div class="gallery_crd_img">
                            <a class="image-popup-vertical-fit" href="{{ url('/storage/gallery/'.$gallery->image.'') }}"
                                title="{{$gallery->name}}">
                                <img src="{{ url('/storage/gallery/'.$gallery->image.'') }}" alt="{{$gallery->name}}" />
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
            <h4>No Gallery Found</h4>
            @endif
            </div>
        </div>

        </div>
    </section>
@endsection
