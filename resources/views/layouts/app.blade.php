<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="site_currency" content="{{setting('site_currency')}}">
  <meta name="tax" content="{{setting('tax')}}">
    @yield('meta')
<title>@yield('title', 'Default Title')</title>
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