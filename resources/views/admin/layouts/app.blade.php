<!DOCTYPE html>
@props(['title'])

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel')  }}</title>
        @include('admin.partials.header_style')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
    @include('admin.partials.navigation')
    @include('admin.partials.sidebar')
</div>
<div class="content-wrapper">
{{ $slot }}
</div>
<footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="/">dilse.ca</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
        @include('admin.partials.footer_scripts')
    </body>
</html>
