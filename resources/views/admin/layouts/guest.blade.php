<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/x-icon" href="{{ setting('Favicon') != null ? setting('Favicon') : url('frontend/img/fav.png') }}">
        <title>{{ setting('site_title', 'LaraStarter') }}</title>
        @include('admin.partials.header_style')
    </head>
    <body class="hold-transition login-page">
    {{ $slot }}
        @include('admin.partials.footer_scripts')
    </body>
</html>
