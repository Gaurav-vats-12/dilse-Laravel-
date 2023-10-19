<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="site_currency" content="{{setting('site_currency')}}">
    <meta name="tax" content="{{setting('tax')}}">
      <meta name="description" content="Dils Se ">

  <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://dilse.exoticaitsolutions.com/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Dil Se | Home">
  <meta property="og:description" content="Dils Se ">
  <meta property="og:image" content="https://dilse.exoticaitsolutions.com/frontend/img/footer-logo.svg">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="dilse.exoticaitsolutions.com">
  <meta property="twitter:url" content="https://dilse.exoticaitsolutions.com/">
  <meta name="twitter:title" content="Dil Se | Home">
  <meta name="twitter:description" content="Dils Se ">
  <meta name="twitter:image" content="https://dilse.exoticaitsolutions.com/frontend/img/footer-logo.svg">

  <!-- Meta Tags Generated via https://www.opengraph.xyz -->
        
    @yield('meta')
        <title>{{ setting('site_title', 'Dilse') }} | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ setting('favicon') != null ? url('/storage/site/Favicon/'.setting('favicon').'') : url('frontend/img/fav.png') }}">
    @include('layouts.partials.header_style')
</head>
<body>
<a id="button"></a>

    @include('layouts.partials.navigate')
    @include('layouts.partials.responsive_header')
<div class="wrapper">
  @yield('frontcontent')
  </div>
@include('layouts.partials.footer')
