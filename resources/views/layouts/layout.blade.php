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
    <title>Brunette I CRM Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework" />

    <!-- Favicon -->
    <link rel="shortcut icon" href=" {{ asset('template/dist/img/moci-fav.png') }}">
    <link rel="icon" href=" {{ asset('template/dist/img/moci-fav.png') }}" type="image/x-icon">

	<!-- vector map CSS -->
    <link href=" {{ asset('template/vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css" />

    <!-- Toggles CSS -->
    <link href=" {{ asset('template/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href=" {{ asset('template/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

	<!-- Toastr CSS -->
    <link href=" {{ asset('template/vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href=" {{ asset('template/dist/css/style.css') }}" rel="stylesheet" type="text/css">

    @stack('style')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader-it">
        <div class="loader-pendulums"></div>
    </div>
    <!-- /Preloader -->

	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand" href=" {{ url('dashboard') }}">
                <img class="brand-img d-inline-block" src=" {{ asset('template/dist/img/moci1.png') }}" alt="brand" />
            </a>

            @auth
            <ul class="navbar-nav hk-navbar-content">
                 <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src=" {{ asset('template/dist/img/moci.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>Admin <i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        {{-- <a class="dropdown-item" href=" {{ asset('template/profile.html') }}"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-card"></i><span>My balance</span></a>
                        <a class="dropdown-item" href=" {{ asset('template/inbox.html') }}"><i class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                        <div class="dropdown-divider"></div>
                        <div class="sub-dropdown-menu show-on-hover">
                            <a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
                            <div class="dropdown-menu open-left-side">
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div> --}}
                    </div>
                </li>
            </ul>
            @else

            @endauth
            {{-- <ul class="navbar-nav hk-navbar-content">
                <li class="nav-item">
                    <a id="navbar_search_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="search"></i></span></a>
                </li>
                <li class="nav-item">
                    <a id="settings_toggle_btn" class="nav-link nav-link-hover" href="javascript:void(0);"><span class="feather-icon"><i data-feather="settings"></i></span></a>
                </li>
                <li class="nav-item dropdown dropdown-notifications">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge-wrap"><span class="badge badge-brown badge-indicator badge-indicator-sm badge-pill pulse"></span></span></a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                        <h6 class="dropdown-header">Notifications <a href="javascript:void(0);" class="">View all</a></h6>
                        <div class="notifications-nicescroll-bar">
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src=" {{ asset('template/dist/img/avatar1.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text"><span class="text-dark text-capitalize">Evie Ono</span> accepted your invitation to join the team</div>
                                            <div class="notifications-time">12m</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <img src=" {{ asset('template/dist/img/avatar2.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">New message received from <span class="text-dark text-capitalize">Misuko Heid</span></div>
                                            <div class="notifications-time">1h</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-primary rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-account font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">You have a follow up with<span class="text-dark text-capitalize"> Brunette head</span> on <span class="text-dark text-capitalize">friday, dec 19</span> at <span class="text-dark">10.00 am</span></div>
                                            <div class="notifications-time">2d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-success rounded-circle">
													<span class="initial-wrap"><span>A</span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Application of <span class="text-dark text-capitalize">Sarah Williams</span> is waiting for your approval</div>
                                            <div class="notifications-time">1w</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="javascript:void(0);" class="dropdown-item">
                                <div class="media">
                                    <div class="media-img-wrap">
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-text avatar-text-warning rounded-circle">
													<span class="initial-wrap"><span><i class="zmdi zmdi-notifications font-18"></i></span></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div>
                                            <div class="notifications-text">Last 2 days left for the project</div>
                                            <div class="notifications-time">15d</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src=" {{ asset('template/dist/img/avatar12.jpg') }}" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>Madelyn Shane<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href=" {{ asset('template/profile.html') }}"><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-card"></i><span>My balance</span></a>
                        <a class="dropdown-item" href=" {{ asset('template/inbox.html') }}"><i class="dropdown-icon zmdi zmdi-email"></i><span>Inbox</span></a>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-settings"></i><span>Settings</span></a>
                        <div class="dropdown-divider"></div>
                        <div class="sub-dropdown-menu show-on-hover">
                            <a href="#" class="dropdown-toggle dropdown-item no-caret"><i class="zmdi zmdi-check text-success"></i>Online</a>
                            <div class="dropdown-menu open-left-side">
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-check text-success"></i><span>Online</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-circle-o text-warning"></i><span>Busy</span></a>
                                <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-minus-circle-outline text-danger"></i><span>Offline</span></a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span></a>
                    </div>
                </li>
            </ul> --}}
        </nav>
        {{-- <form role="search" class="navbar-search">
            <div class="position-relative">
                <a href="javascript:void(0);" class="navbar-search-icon"><span class="feather-icon"><i data-feather="search"></i></span></a>
                <input type="text" name="example-input1-group2" class="form-control" placeholder="Type here to Search">
                <a id="navbar_search_close" class="navbar-search-close" href="#"><span class="feather-icon"><i data-feather="x"></i></span></a>
            </div>
        </form> --}}
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <div class="nav-header">
                        <span>Getting Started</span>
                        <span>GS</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href=" {{route('dashboard')}}  " >
                                <span class="feather-icon"><i data-feather="home"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                                <span class="fa fa-thermoometer"></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href=" {{route('temperature')}} ">
                                <span class="feather-icon"><i data-feather="thermometer"></i></span>
                                <span class="nav-link-text">Temperature Analytics</span>
                                {{-- <span class="badge badge-sm badge-success badge-pill">v 1.0</span> --}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('humidity')}} ">
                                <span class="feather-icon"><i data-feather="cloud"></i></span>
                                <span class="nav-link-text">Humidity Analytics</span>
                            </a>
                        </li><li class="nav-item">
                            <a class="nav-link" href="{{route('airPressure')}} ">
                                <span class="feather-icon"><i data-feather="sun"></i></span>
                                <span class="nav-link-text">Air Pressure Analytics</span>
                            </a>
                        </li>
                        </li><li class="nav-item">
                            <a class="nav-link" href="{{route('rain')}} ">
                                <span class="feather-icon"><i data-feather="cloud-rain"></i></span>
                                <span class="nav-link-text">Rain Analytics</span>
                            </a>
                        </li>
                    </ul>
                    @auth
                        <hr class="nav-separator">
                        <div class="nav-header">
                            <span>Admin Panel</span>
                            <span>GS</span>
                        </div>
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href=" {{route('device.index')}}  " >
                                    <span class="feather-icon"><i data-feather="hard-drive"></i></span>
                                    <span class="nav-link-text">All Device</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-with-badge" href=" {{route('device.create')}} ">
                                    <span class="feather-icon"><i data-feather="edit"></i></span>
                                    <span class="nav-link-text">Add a new device</span>
                                    {{-- <span class="badge badge-sm badge-success badge-pill">v 1.0</span> --}}
                                </a>
                            </li>
                        </ul>
                    @else

                    @endauth
                    {{-- <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#dash_drp">
                                <span class="feather-icon"><i data-feather="activity"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                            <ul id="dash_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item active">
                                            <a class="nav-link" href=" {{ asset('template/dashboard1.html') }}">CRM</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/dashboard2.html') }}">Project</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/dashboard3.html') }}">Statistics</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/dashboard4.html') }}">Classic</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/dashboard5.html') }}">Analytics</a>
                                        </li>
									</ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href="javascript:void(0);" data-toggle="collapse" data-target="#app_drp">
                                <span class="feather-icon"><i data-feather="package"></i></span>
                                <span class="nav-link-text">Application</span>
                                <span class="badge badge-brown badge-pill">4</span>
                            </a>
                            <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/chats.html') }}">Chat</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/calendar.html') }}">Calendar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/email.html') }}">Email</a>
                                        </li>
										<li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/file-manager.html') }}">File Manager</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#auth_drp">
                                <span class="feather-icon"><i data-feather="zap"></i></span>
                                <span class="nav-link-text">Authentication</span>
                            </a>
                            <ul id="auth_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#signup_drp">
													Sign Up
												</a>
                                            <ul id="signup_drp" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/signup.html') }}">Cover</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/signup-simple.html') }}">Simple</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#signin_drp">
													Login
												</a>
                                            <ul id="signin_drp" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/login.html') }}">Cover</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/login-simple.html') }}">Simple</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#recover_drp">
													Recover Password
												</a>
                                            <ul id="recover_drp" class="nav flex-column collapse collapse-level-2">
                                                <li class="nav-item">
                                                    <ul class="nav flex-column">
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/forgot-password.html') }}">Forgot Password</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href=" {{ asset('template/reset-password.html') }}">Reset Password</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/lock-screen.html') }}">Lock Screen</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/404.html') }}">Error 404</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/maintenance.html') }}">Maintenance</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#pages_drp">
                                <span class="feather-icon"><i data-feather="file-text"></i></span>
                                <span class="nav-link-text">Pages</span>
                            </a>
                            <ul id="pages_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/profile.html') }}">Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/invoice.html') }}">Invoice</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/gallery.html') }}">Gallery</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/activity.html') }}">Activity</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/faq.html') }}">Faq</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>User Interface</span>
                        <span>UI</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#Components_drp">
                                <span class="feather-icon"><i data-feather="layout"></i></span>
                                <span class="nav-link-text">Components</span>
                            </a>
                            <ul id="Components_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/alerts.html') }}">Alerts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/avatar.html') }}">Avatar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/badge.html') }}">Badge</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/buttons.html') }}">Buttons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/cards.html') }}">Cards</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/carousel.html') }}">Carousel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/collapse.html') }}">Collapse</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/dropdowns.html') }}">Dropdown</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/list-group.html') }}">List Group</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/modal.html') }}">Modal</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/nav.html') }}">Nav</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/navbar.html') }}">Navbar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/nestable.html') }}">Nestable</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/pagination.html') }}">Pagination</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/popovers.html') }}">Popovers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/progress.html') }}">Progress</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/tooltip.html') }}">Tooltip</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#content_drp">
                                <span class="feather-icon"><i data-feather="type"></i></span>
                                <span class="nav-link-text">Content</span>
                            </a>
                            <ul id="content_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/typography.html') }}">Typography</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/images.html') }}">Images</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('template/media-object.html') }}">Media Object</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#utilities_drp">
                                <span class="feather-icon"><i data-feather="anchor"></i></span>
                                <span class="nav-link-text">Utilities</span>
                            </a>
                            <ul id="utilities_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatebackground.html') }}">Background</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateborder.html') }}">Border</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatecolors.html') }}">Colors</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateembeds.html') }}">Embeds</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateicons.html') }}">Icons</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateshadow.html') }}">Shadow</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatesizing.html') }}">Sizing</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatespacing.html') }}">Spacing</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#forms_drp">
                                <span class="feather-icon"><i data-feather="server"></i></span>
                                <span class="nav-link-text">Forms</span>
                            </a>
                            <ul id="forms_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateform-element.html') }}">Form Elements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateinput-groups.html') }}">Input Groups</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateform-layout.html') }}">Form Layout</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateform-mask.html') }}">Form Mask</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateform-validation.html') }}">Form Validation</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateform-wizard.html') }}">Form Wizard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatefile-upload.html') }}">File Upload</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateeditor.html') }}">Editor</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#tables_drp">
                                <span class="feather-icon"><i data-feather="list"></i></span>
                                <span class="nav-link-text">Tables</span>
                            </a>
                            <ul id="tables_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatebasic-table.html') }}">Basic Table</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatedata-table.html') }}">Data Table</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateresponsive-table.html') }}">Responsive Table</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateeditable-table.html') }}">Editable Table</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#charts_drp">
                                <span class="feather-icon"><i data-feather="pie-chart"></i></span>
                                <span class="nav-link-text">Charts</span>
                            </a>
                            <ul id="charts_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templateline-charts.html') }}">Line Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatearea-charts.html') }}">Area Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatebar-charts.html') }}">Bar Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatepie-charts.html') }}">Pie Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templaterealtime-charts.html') }}">Realtime Chart</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatemini-charts.html') }}">Mini Chart</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#maps_drp">
                                <span class="feather-icon"><i data-feather="map"></i></span>
                                <span class="nav-link-text">Maps</span>
                            </a>
                            <ul id="maps_drp" class="nav flex-column collapse collapse-level-1">
                                <li class="nav-item">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templategoogle-map.html') }}">Google Map</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href=" {{ asset('templatevector-map.html') }}">Vector Map</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr class="nav-separator">
                    <div class="nav-header">
                        <span>Getting Started</span>
                        <span>GS</span>
                    </div>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ asset('templatedocumentation.html') }}" >
                                <span class="feather-icon"><i data-feather="book"></i></span>
                                <span class="nav-link-text">Documentation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-with-badge" href="#">
                                <span class="feather-icon"><i data-feather="eye"></i></span>
                                <span class="nav-link-text">Changelog</span>
                                <span class="badge badge-sm badge-success badge-pill">v 1.0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="feather-icon"><i data-feather="headphones"></i></span>
                                <span class="nav-link-text">Support</span>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Setting Panel -->
        <div class="hk-settings-panel">
            <div class="nicescroll-bar position-relative">
                <div class="settings-panel-wrap">
                    <div class="settings-panel-head">
                        <img class="brand-img d-inline-block align-top" src=" {{ asset('template/dist/img/logo-light.png') }}" alt="brand" />
                        <a href="javascript:void(0);" id="settings_panel_close" class="settings-panel-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
                    </div>
                    <hr>
                    <h6 class="mb-5">Layout</h6>
                    <p class="font-14">Choose your preferred layout</p>
                    <div class="layout-img-wrap">
                        <div class="row">
                            <a href="javascript:void(0);" class="col-6 mb-30 active">
                                <img class="rounded opacity-70" src=" {{ asset('template/dist/img/layout1.png') }}" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                            <a href=" {{ asset('templatedashboard2.html') }}" class="col-6 mb-30">
                                <img class="rounded opacity-70" src=" {{ asset('template/dist/img/layout2.png') }}" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                           <a href=" {{ asset('templatedashboard3.html') }}" class="col-6 mb-30">
                                <img class="rounded opacity-70" src=" {{ asset('template/dist/img/layout3.png') }}" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
							<a href=" {{ asset('templatedashboard4.html') }}" class="col-6 mb-30">
                                <img class="rounded opacity-70" src=" {{ asset('template/dist/img/layout4.png') }}" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
							<a href=" {{ asset('templatedashboard5.html') }}" class="col-6">
                                <img class="rounded opacity-70" src=" {{ asset('template/dist/img/layout5.png') }}" alt="layout">
                                <i class="zmdi zmdi-check"></i>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <h6 class="mb-5">Navigation</h6>
                    <p class="font-14">Menu comes in two modes: dark & light</p>
                    <div class="button-list hk-nav-select mb-10">
                        <button type="button" id="nav_light_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="nav_dark_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <h6 class="mb-5">Top Nav</h6>
                    <p class="font-14">Choose your liked color mode</p>
                    <div class="button-list hk-navbar-select mb-10">
                        <button type="button" id="navtop_light_select" class="btn btn-outline-primary btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-sun-o"></i> </span><span class="btn-text">Light Mode</span></button>
                        <button type="button" id="navtop_dark_select" class="btn btn-outline-light btn-sm btn-wth-icon icon-wthot-bg"><span class="icon-label"><i class="fa fa-moon-o"></i> </span><span class="btn-text">Dark Mode</span></button>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h6>Scrollable Header</h6>
                        <div class="toggle toggle-sm toggle-simple toggle-light toggle-bg-primary scroll-nav-switch"></div>
                    </div>
                    <button id="reset_settings" class="btn btn-primary btn-block btn-reset mt-30">Reset</button>
                </div>
            </div>
            <img class="d-none" src=" {{ asset('template/dist/img/logo-light.png') }}" alt="brand" />
            <img class="d-none" src=" {{ asset('template/dist/img/logo-dark.png') }}" alt="brand" />
        </div>
        <!-- /Setting Panel -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			@yield('content')

            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <p>Copyright <a href="https://malikmal98.my.id/" class="text-dark" target="_blank">Moci</a> © 2019</p>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <p class="d-inline-block">Follow us</p>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-facebook"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-twitter"></i></span></a>
                            <a href="#" class="d-inline-block btn btn-icon btn-icon-only btn-indigo btn-icon-style-4"><span class="btn-icon-wrap"><i class="fa fa-google-plus"></i></span></a>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->

    </div>
    <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src=" {{ asset('template/vendors/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=" {{ asset('template/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src=" {{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src=" {{ asset('template/dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src=" {{ asset('template/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src=" {{ asset('template/dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src=" {{ asset('template/vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src=" {{ asset('template/dist/js/toggle-data.js') }}"></script>

	<!-- Counter Animation JavaScript -->
	<script src=" {{ asset('template/vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src=" {{ asset('template/vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

	<!-- EChartJS JavaScript -->
    <script src=" {{ asset('template/vendors/echarts/dist/echarts-en.min.js') }}"></script>

	<!-- Sparkline JavaScript -->
    <script src=" {{ asset('template/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

	<!-- Owl JavaScript -->
    <script src=" {{ asset('template/vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

	<!-- Toastr JS -->
    <script src=" {{ asset('template/vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>



    <!-- Init JavaScript -->
    <script src=" {{ asset('template/dist/js/init.js') }}"></script>

    @stack('script')
</body>

</html>
