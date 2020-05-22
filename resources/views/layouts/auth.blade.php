<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ViralGet</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,800i,900" rel="stylesheet">
    <link href="{{ asset('static/assets/css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('static/assets/img/favicon.png') }}">
    <link rel="icon" href="{{ asset('static/assets/img/favicon.png') }}">



  </head>

  <body class="layout-centered bg-primary">

      
  @yield('content')



    <!-- Scripts -->
    <script src="{{ asset('static/assets/js/page.min.js') }}"></script>
    <script src="{{ asset('static/assets/js/script.js') }}"></script>
    <!-- <script src="{{ asset('static/assets/js/particles.js') }} "></script> -->
    @yield('scripts')
  </body>
</html>
