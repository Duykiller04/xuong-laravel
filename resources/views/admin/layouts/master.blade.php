<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="{{ 'http://xuong-thuc-hanh.test/' }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('theme/assets/images/favicon.ico') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('style-libs')
    <!-- Layout config Js -->
    <script src="{{ asset('theme/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('theme/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('theme/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

    @yield('styles')
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('admin.layouts.header');


        <!-- ========== App Menu ========== -->
        @include('admin.layouts.sidebar');

        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('admin.layouts.footer');

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>




    <!-- JAVASCRIPT -->
    <script src="{{ asset('theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('theme/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('theme/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('theme/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('theme/assets/js/plugins.js') }}"></script>

    {{-- plugins --}}
    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'></script>
    <script type='text/javascript' src='theme/assets/libs/choices.js/public/assets/scripts/choices.min.js'></script>
    <script type='text/javascript' src='theme/assets/libs/flatpickr/flatpickr.min.js'></script>

    @yield('script-libs')

    <!-- App js -->
    <script src="{{ asset('theme/assets/js/app.js') }}"></script>

    @yield('scripts')
</body>

</html>
