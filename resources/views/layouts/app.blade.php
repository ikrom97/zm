<!DOCTYPE html>
<html class="page" lang="{{ app()->currentLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex">

  <link rel="icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" href="{{ asset('favicons/favicon.svg') }}" type="image/svg+xml">
  <link rel="apple-touch-icon" href="{{ asset('favicons/180x180.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  @yield('links')

  <title>Авторский сайт Зафара Мирзо</title>
</head>

<body class="page__body">
  @include('layouts.header')

  @yield('content')

  @include('layouts.footer')

  <x-search-modal />

  @yield('scripts')
</body>

</html>
