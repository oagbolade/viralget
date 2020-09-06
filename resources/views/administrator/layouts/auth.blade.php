<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Viralget Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('static/assets/administrator/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('static/assets/administrator/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
  @yield('content')
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('static/assets/administrator/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('static/assets/administrator/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('static/assets/administrator/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('static/assets/administrator/js/sb-admin-2.min.js') }}"></script>

</body>
@yield('scripts')
</html>