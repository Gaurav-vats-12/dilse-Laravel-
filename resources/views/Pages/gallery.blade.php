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
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-1.jpg')}}" title="9.jpg">
					<img src="{{asset('frontend/img/gall-1.jpg')}}" alt="9.jpg" />
				</a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-4.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-4.jpg')}}" alt="" /></a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-4.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-4.jpg')}}" alt="" /></a>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-2.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-2.jpg')}}" alt="" /></a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-5.jpg')}}" title="9.jpg">

                  <img src="{{asset('frontend/img/gall-5.jpg')}}" alt="" />
</a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-8.jpg')}}" title="9.jpg">

                  <img src="{{asset('frontend/img/gall-8.jpg')}}" alt="" />
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-3.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-3.jpg')}}" alt="" /></a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-6.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-6.jpg')}}" alt="" /></a>
                </div>
              </div>
              <div class="gallery_pics_crd">
                <div class="gallery_crd_img">
                <a class="image-popup-vertical-fit" href="{{asset('frontend/img/gall-6.jpg')}}" title="9.jpg">
                  <img src="{{asset('frontend/img/gall-9.jpg')}}" alt="" /></a>
                </div>
              </div>
            </div>
          </div>
        </div>

</div>
      </section>
@endsection
