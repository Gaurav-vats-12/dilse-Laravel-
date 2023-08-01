<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta cnmzxc')
        <title>{{ setting('site_title', 'LaraStarter') }}</title>
    @include('layouts.partials.header_style')
</head>
<body>
    @include('layouts.partials.navigate')
<div class="wrapper">
  @yield('frontcontent')
  </div>
@include('layouts.partials.footer')

