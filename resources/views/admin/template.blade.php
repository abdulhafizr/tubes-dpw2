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
    <style>
        .text-nav-item {
            color: #fff !important;
        }

        .main-sidebar, .main-sidebar::before {
            transition: margin-left .3s ease-in-out, width .3s ease-in-out;
            width: 380px;
        }

        .sidebar-mini.sidebar-collapse .main-sidebar:not(.sidebar-no-expand).sidebar-focused, .sidebar-mini.sidebar-collapse .main-sidebar:not(.sidebar-no-expand):hover {
            width: 380px;
        }

        body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .content-wrapper, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-footer, body:not(.sidebar-mini-md):not(.sidebar-mini-xs):not(.layout-top-nav) .main-header {
            transition: margin-left .3s ease-in-out;
            margin-left: 380px;
        }

        .sidebar-mini .main-sidebar .nav-link, .sidebar-mini-md .main-sidebar .nav-link, .sidebar-mini-xs .main-sidebar .nav-link {
            width: 100%;
            transition: width ease-in-out .3s;
        }

        .sidebar-collapse.sidebar-mini .main-sidebar.sidebar-focused:not(.sidebar-no-expand) .nav-link, .sidebar-collapse.sidebar-mini .main-sidebar:hover:not(.sidebar-no-expand) .nav-link, .sidebar-collapse.sidebar-mini-md .main-sidebar.sidebar-focused:not(.sidebar-no-expand) .nav-link, .sidebar-collapse.sidebar-mini-md .main-sidebar:hover:not(.sidebar-no-expand) .nav-link, .sidebar-collapse.sidebar-mini-xs .main-sidebar.sidebar-focused:not(.sidebar-no-expand) .nav-link, .sidebar-collapse.sidebar-mini-xs .main-sidebar:hover:not(.sidebar-no-expand) .nav-link {
            width: 100%;
        }

        .nav-link {
            display: block;
            padding: .8rem 1rem !important;
        }

        .small-box > .inner {
            padding: 30px !important;
        }

        [class*=sidebar-dark-] {
            background: #dc3545 linear-gradient(180deg, #e15361, #dc3545) repeat-x !important;
        }

        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active, .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: #fff;
            color: #000;
        }

        [class*=sidebar-dark-] .sidebar a {
            color: #fff;
        }
    </style>
    @yield('head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    @include("components.admin.header")

    <!-- Main Sidebar Container -->
    @include("components.admin.sidebar")

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield("header_title")</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield("header_menu")</a></li>
                            <li class="breadcrumb-item active">@yield("header_submenu")</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main content -->
        <div class="content">
            @yield("content")
        </div>

    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include("components.admin.control_sidebar")

    <!-- Main Footer -->
    @include("components.admin.footer")
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
