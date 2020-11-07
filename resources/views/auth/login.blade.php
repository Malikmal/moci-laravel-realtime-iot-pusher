<!DOCTYPE html>
<!--
Template Name: Brunette - Responsive Bootstrap 4 Admin Dashboard Template
Author: Hencework
Contact: https://hencework.ticksy.com/

License: You must have a valid license purchased only from templatemonster to legally use the template for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Administrator Login</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href=" {{ asset('template/dist/img/moci-fav.png') }}">
    <link rel="icon" href=" {{ asset('template/dist/img/moci-fav.png') }}" type="image/x-icon">

    <!-- Custom CSS -->
    <link href=" {{ asset('template/dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

	<!-- HK Wrapper -->
	<div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="d-flex auth-brand" href=" {{ url('dashboard') }}">
                    <img class="brand-img" src=" {{ asset('template/dist/img/moci1.png') }}" alt="brand" />
                </a>
                <div class="btn-group btn-group-sm">
                    <a href="#" class="btn btn-outline-secondary">Help</a>
                    <a href="#" class="btn btn-outline-secondary">About Us</a>
                </div>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-100">
                            <div class="auth-form w-xl-25 w-sm-50 w-100">
                                <form method="POST" action="{{route('login')}} ">
                                    <div class="d-block avatar avatar-lg mx-auto mb-20">
                                        <img src=" {{ asset('template/dist/img/moci.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                    <h1 class="display-6 mb-10 d-flex align-items-end justify-content-center">Admin<span class="d-20 d-flex align-items-center justify-content-center border border-1 border-light-40 rounded-circle ml-10"><i class="zmdi zmdi-lock text-light-40 font-12"></i></span></h1>
                                    <p class="mb-30 text-center">admin@moci.my.id</p>
                                    <div class="form-group">
                                        <div class="input-group">
                                            @csrf
                                            <input type="hidden" name="email" value="admin@moci.my.id" />
                                            <input name="password" class="form-control filled-input bg-white" placeholder="Password" type="password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><span class="feather-icon"><i data-feather="arrow-right"></i></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

    </div>
   <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src=" {{ asset('template/vendors/jquery/dist/jquery.min.js') }} "></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=" {{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }} "></script>
    <script src=" {{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js') }} "></script>

    <!-- Slimscroll JavaScript -->
    <script src=" {{ asset('template/dist/js/jquery.slimscroll.js') }} "></script>

    <!-- Fancy Dropdown JS -->
    <script src=" {{ asset('template/dist/js/dropdown-bootstrap-extended.js') }} "></script>

    <!-- FeatherIcons JavaScript -->
    <script src=" {{ asset('template/dist/js/feather.min.js') }} "></script>

    <!-- Tablesaw JavaScript -->
    <script src=" {{ asset('template/vendors/tablesaw/dist/tablesaw.jquery.js') }} "></script>
    <script src=" {{ asset('template/dist/js/tablesaw-data.js') }} "></script>

    <!-- Init JavaScript -->
    <script src=" {{ asset('template/dist/js/init.js') }} "></script>
</body>

</html>
