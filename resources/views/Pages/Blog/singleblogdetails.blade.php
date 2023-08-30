@extends('layouts.app')
@section('title', $blog->blog_title)
@section('frontcontent')
<section class="inner_bannner bg_style" style="background-image: url('{{asset('frontend/img/about_banner-image.png') }}')">
        <div class="about_banner_section">
          <div class="home-slider-main">
            <div class="container">
              <div class="home-slider-content">
                <h1> {{ $blog->blog_title}}</h1>
                  <p class="meta">Posted on {{ $blog->created_at->format('M d, Y') }} by {{ $blog->author }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="featured_posts">
        <div class="container">
            <main>
                <div class="post_img">
                    <img src="{{ url('/storage/blog/'.$blog->blog_image.'') }}" alt="{{ $blog->blog_image}}" />
                </div>
                <article>
                    {!!$blog->blog_content !!}
                </article>
            </main>

        </div>
      </section>
@endsection
