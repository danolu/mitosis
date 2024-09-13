<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? '' }} &#183; {{ config('app.name') }}</title>
    
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16') }}">
  <link rel="icon" type="image/ico" href="{{ asset('favicon.ico') }}">
  <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-base-url="{{url('/')}}">
    <script src="{{ asset('assets/js/spinner.js') }}"></script>
    
    <div class="main-wrapper" id="app">
        <livewire:sidebars.user />   
        <div class="page-wrapper">
            <livewire:headers.user /> 
                <div class="page-content">
                    {{ $slot }}
                </div>
            @persist('footer')
            <livewire:footers.user /> 
            @endpersist  
        </div>
    </div>

    <script type="module" src="{{ asset('assets/js/app.js') }}"></script>
    <script>
        document.addEventListener('notify', function(e){
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: e.detail[0].icon,
            title: e.detail[0].title
        });
        $(".response").show().delay(3000).fadeOut();
        });
    </script>

    <script>
        document.addEventListener('languageChanged', function(e){
            location.reload();
        });
    </script>

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'success',
            title: {{ session('success') }}
        });
        </script>
    @endif
    @if (session('alert'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: 'alert',
            title: {{ session('alert') }}
        });
        </script>
    @endif
</body>
</html>