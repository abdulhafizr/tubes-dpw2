<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Starter</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    {{--  Custom CSS  --}}
    @yield('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Main content -->
    <div class="content">
        @yield("content")
    </div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

{{-- Sweet Alert --}}

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>
<!-- AdminLTE Demo -->
<!-- App -->
<script src="{{ asset('js/app.js') }}"></script>

@include('sweetalert::alert')

{{-- Custom Javascript --}}
@yield('script')
</body>
</html>
