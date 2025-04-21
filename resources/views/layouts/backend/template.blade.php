<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>TB KURNIA JAYA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admiiin/assets/logo/tb.png') }}" height="100">

    <!-- App css -->
    <link href="{{ asset('admiiin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons -->
    <link href="{{ asset('admiiin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <!-- Toastr CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">



    @yield('css')
    @yield('styles')

</head>

<!-- body start -->

<body data-menu-color="light" data-sidebar="default">

    <div id="app-layout">


        <!-- Topbar Start -->
        @include('include.backend.navbar')
        <!-- end Topbar -->

        <!-- Left Sidebar Start -->
        @include('include.backend.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-body">
            <!-- row -->
            <div">
                @yield('content')
        </div>
    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col fs-13 text-muted text-center">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a
                        href="#!" class="text-reset fw-semibold">TB KURNIA JAYA</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Vendor -->
    <script src="{{ asset('admiiin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <!-- Apexcharts JS -->
    <script src="{{ asset('admiiin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- for basic area chart -->
    <script src="{{ asset('admiiin/assets/js/pages/apexcharts.init.js') }}"></script>

    <!-- Widgets Init Js -->
    <script src="{{ asset('admiiin/assets/js/pages/crm-dashboard.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('admiiin/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS dan Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- jQuery (harus ada) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>\
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




    @include('sweetalert::alert')


    @yield('js')
    @stack('scripts')
</body>

</html>
