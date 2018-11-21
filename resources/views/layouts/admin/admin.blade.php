<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin | {{ config('app.name', 'Laravel') }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  {{-- Dropzone --}}
  <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css') }}">
  {{-- lightgallery --}}
  <link rel="stylesheet" href="{{ asset('plugins/lightgalleryjs/css/lightgallery.css') }}">
  {{-- app --}}
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
  {{-- toastrjs --}}
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav" style="opacity: .0">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  @include('layouts.admin.sidebar')

  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer" style="display:none">
    <!-- To the right -->
    <div class="float-right d-none d-sm-block-down">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
{{-- toastrjs --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  toastr.options.closeButton = true;
  toastr.options.closeMethod = 'fadeOut';
  toastr.options.closeDuration = 300;
  toastr.options.closeEasing = 'swing';
  toastr.options.progressBar = true;
</script>
@include('layouts.admin.js')

<!-- OPTIONAL SCRIPTS -->
{{-- <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script> --}}
{{-- <script src="{{ asset('dist/js/demo.js') }}"></script> --}}
{{-- <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script> --}}
</body>
</html>
