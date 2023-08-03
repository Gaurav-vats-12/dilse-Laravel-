@extends('layouts.app')
@section('meta')
<meta property="og:title" content="{{ __($pagdata->page_meta_title) }}">
<meta property="og:description" content="{{ __($pagdata->page_meta_description) }}">
<meta name="title" content="{{ __($pagdata->page_meta_title) }}">
<meta name="description" content="{{ __($pagdata->page_meta_description) }}">
@endsection
@section('title', 'Term and Condition')
@section('frontcontent')
<section
        class="inner_bannner bg_style"
        style="background-image: url('{{asset('frontend/img/gift-card.jpg')}}')"
      >
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1> {{ __($pagdata->page_title) }}</h1>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="gallery_pics gift_crd py_8">
        <div class="container">
        {!! __($pagdata->page_content) !!}

        </div>
      </section>


@endsection
