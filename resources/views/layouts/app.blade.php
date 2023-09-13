<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="site_currency" content="{{setting('site_currency')}}">
    <meta name="tax" content="{{setting('tax')}}">
    @yield('meta')
        <title>{{ setting('site_title', 'Dilse') }} | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ setting('favicon') != null ? url('/storage/site/Favicon/'.setting('favicon').'') : url('frontend/img/fav.png') }}">
    @include('layouts.partials.header_style')
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/ef3584d822e3060c8cdb4139f/e030a1a2fb366d50e1638334e.js");</script>
</head>
<body>
<a id="button"></a>

    @include('layouts.partials.navigate')
    @include('layouts.partials.responsive_header')
<div class="wrapper">
  @yield('frontcontent')
  </div>
@include('layouts.partials.footer')
