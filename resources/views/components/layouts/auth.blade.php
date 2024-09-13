<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title> {{ $title }} &#183; {{ config('app.name') }}</title>
  
  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
  <link rel="manifest" href="site.webmanifest">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-base-url="{{url('/')}}">
  <script src="{{ asset('assets/js/spinner.js') }}"></script>

  <div class="main-wrapper" id="app">
    <div class="page-wrapper full-page">
      {{$slot}}
    </div>
  </div>

  <script src="{{ asset('assets/js/app.js') }}"></script>

</body>
</html>