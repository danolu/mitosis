<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? '' }} &#183; {{ $site->name }}</title>  
  
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">

  <link rel="stylesheet" href="{{ asset('css/website.css') }}" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900&amp;display=swap" rel="stylesheet" type="text/css" />
  <script src="{{ asset('js/jquery.js') }}"></script>
</head>

<body class="stretched">
  <div id="wrapper" class="clearfix">
    <livewire:headers.site />   
    {{ $slot }}
    @persist('site_footer')
    <livewire:footers.site />   
    @endpersist
  </div>

  <div id="gotoTop" class="icon-angle-up">
  </div>


  <script src="{{ asset('js/plugins.min.js') }}"></script>
  <script src="{{ asset('js/functions.js') }}"></script>

  <script>
    document.addEventListener('languageChanged', function(e){
        location.reload();
    });
  </script>

</body>
</html>