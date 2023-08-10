@extends('layouts.app')
@section('meta')
<meta property="og:title" content="@if(isset($pagdata->page_meta_title)) {{ __($pagdata->page_meta_title) }} @endif">
<meta property="og:description" content="@if(isset($pagdata->page_meta_description)) {{ __($pagdata->page_meta_description) }} @endif">
<meta name="title" content="@if(isset($pagdata->page_meta_title)) {{ __($pagdata->page_meta_title) }} @endif">
<meta name="description" content="@if(isset($pagdata->page_meta_description)) {{ __($pagdata->page_meta_description) }} @endif">
@endsection
@section('title', $pagdata->page_title)
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
      <section class="ds_content py_8">
        <div class="container">
        {!! __($pagdata->page_content) !!}

        </div>
      </section>


@endsection
