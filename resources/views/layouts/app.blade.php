<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')
        <title>{{ setting('site_title', 'Dilse') }} | @yield('title')</title>
        <link rel="icon" type="image/x-icon" href="{{ setting('favicon') != null ? url('/storage/site/Favicon/'.setting('favicon').'') : url('frontend/img/fav.png') }}">
    @include('layouts.partials.header_style')
</head>
<body>
    @include('layouts.partials.navigate')
<div class="wrapper">

  @yield('frontcontent')
  </div>
@include('layouts.partials.footer')

