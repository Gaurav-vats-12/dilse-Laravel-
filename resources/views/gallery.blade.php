@extends('layouts.app')
@section('title', 'Gallery')
@section('frontcontent')
<section  class="inner_bannner bg_style" style="background-image: url('{{asset('frontend/img/gallery.jpg')}}')" >
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
            <div class="col-md-4">
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-1.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-4.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-7.jpg')}}" alt="" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-2.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-5.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-8.jpg')}}" alt="" />
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-3.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-6.jpg')}}" alt="" />
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                  <img src="{{asset('frontend/img/gall-9.jpg')}}" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
