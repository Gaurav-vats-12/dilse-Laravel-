@extends('layouts.app')
@section('title', 'Discount and Coupons')
@section('frontcontent')
<section
        class="inner_bannner bg_style"
        style="background-image: url('{{asset('frontend/img/gift-card.jpg')}}')"
      >
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1>Discount and Coupons</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="gallery_pics gift_crd py_8">
        <div class="container">
          <div class="row">
            <div class="col-md-10 mx-auto">
              <div class="row">
                <div class="col-md-6">
                  <div class="gallery_pics_crd">
                    <div class="gallery_crd_img')}}">
                      <img src="{{asset('frontend/img/gift-crd.jpg')}}" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="gallery_pics_crd">
                    <div class="gallery_crd_img">
                      <img src="{{asset('frontend/img/gift-crd.jpg')}}" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="gallery_pics_crd">
                    <div class="gallery_crd_img">
                      <img src="{{asset('frontend/img/gift-crd.jpg')}}" alt="" />
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="gallery_pics_crd">
                    <div class="gallery_crd_img">
                      <img src="{{asset('frontend/img/gift-crd.jpg')}}" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
@endsection
