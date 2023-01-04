<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('resources/img/favicon.png') }}">
    <meta http-equiv="cache-control" content="max-age=0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Procurement 2.0</title>
   <!-- Adminmart core CSS -->
   <link href="{{ asset('resources/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
   <link href="{{ asset('resources/xyuymkymesgcocke/assets/extra-libs/c3/c3.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/xyuymkymesgcocke/assets/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/xyuymkymesgcocke/dist/css/style.min.css') }}" rel="stylesheet">

    <link href="{{ asset('resources/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/solid.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/v5-font-face.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/assets/fontawesome/css/v4-font-face.css') }}" rel="stylesheet">

    <link href="{{ asset('resources/plugin_old/Lobibox/lobibox.css') }}" rel="stylesheet">
</head>

@include('layouts.css')
<body>
      <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand" >
                        <!-- Logo icon -->
                        <a href="index.html" >
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="{{ asset('public\img\doh.png') }}" width="120" height="100" alt="homepage" class="dark-logo" style ="margin-top:20px;" />
                                <!-- Light Logo icon -->
                                <!-- <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                <!-- <img src="{{ asset('public\img\doh.png') }}" width="120" height="100" alt="homepage" class="dark-logo" /> -->
                                <!-- Light Logo text -->
                                <!-- <img src="{{ asset('public\img\doh.png') }}" width="120" height="100" class="light-logo" alt="homepage" /> -->
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                    
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                                        the my new
                                                        admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                                        data-feather="calendar" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                                        a reminder that you have event</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="settings" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                                    <span
                                                        class="font-12 text-nowrap d-block text-muted text-truncate">You
                                                        can customize this template
                                                        as you want</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <span class="btn btn-primary rounded-circle btn-circle"><i
                                                        data-feather="box" class="text-white"></i></span>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                                        class="font-12 text-nowrap d-block text-muted">Just
                                                        see the my admin!</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Notification -->
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">Jason Doe</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.html"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Transactions</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ asset('procurement/tracking') }}"
                                aria-expanded="false"><i class="fas fa-search"></i><span
                                    class="hide-menu">Procurement Tracking
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-chat.html"
                                aria-expanded="false"><i class="fas fa-cart-plus"></i><span
                                    class="hide-menu">Purchase Order</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ asset('procurement/draft') }}"
                                aria-expanded="false"><i class="fas fa-list-alt"></i><span
                                    class="hide-menu">Draft PR List</span></a></li>
                        <!-- <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="app-calendar.html"
                                aria-expanded="false"><i class="fas fa-plus"></i><span
                                    class="hide-menu">Create PR</span></a></li> -->
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                                    class="hide-menu">App </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                            class="hide-menu"> PPMP
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                            class="hide-menu"> App Report
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fas fa-boxes"></i><span
                                    class="hide-menu">Supply </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="table-basic.html" class="sidebar-link"><span
                                            class="hide-menu"> Supplies
                                        </span></a>
                                </li>
                                <li class="sidebar-item"><a href="table-dark-basic.html" class="sidebar-link"><span
                                            class="hide-menu"> Suppliers
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa-sharp fa-solid fa-gear"></i><span
                                    class="hide-menu">Settings </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i class="fa-sharp fa-solid fa-money-bill"></i><span
                                        class="hide-menu">Funding & UACS </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                        <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                                    class="hide-menu"> Fund Source
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Fund Type
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Fund Year
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Expense Code
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                    aria-expanded="false"><i class="fa-sharp fa-solid fa-cart-shopping"></i><span
                                        class="hide-menu">Procurement </span></a>
                                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                        <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                                    class="hide-menu"> Type
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Type Internal
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Mode
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> RFQ ITB
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Status Level
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Status
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Document Type
                                                </span></a>
                                        </li>
                                        <li class="sidebar-item"><a href="form-checkbox-radio.html" class="sidebar-link"><span
                                                    class="hide-menu"> Category
                                                </span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu"> Signatories
                                        </span></a>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu"> Offices
                                        </span></a>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu"> Business Category
                                        </span></a>
                                <li class="sidebar-item"><a href="chart-knob.html" class="sidebar-link"><span
                                            class="hide-menu"> PR App
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                aria-expanded="false"><i class="fa-solid fa-sitemap"></i><span
                                    class="hide-menu">Reports </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item"><a href="form-input-grid.html" class="sidebar-link"><span
                                            class="hide-menu"> Budget Monitoring
                                        </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ asset('/logout') }}"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu"> Logout
                        </span></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by DOH. Designed and Developed by Josmar Del Poso
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>

<!-- Adminmart core JavaScript
================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- apps -->
<script src="{{ asset('resources/xyuymkymesgcocke/dist/js/app-style-switcher.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/dist/js/feather.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('resources/xyuymkymesgcocke/dist/js/custom.min.js') }}"></script>
<!--This page JavaScript -->
<script src="{{ asset('resources/xyuymkymesgcocke/assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/extra-libs/c3/c3.min.js') }}"></script>
<script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/chartist/dist/chartist.min.js') }}"></script>

<script src="{{ asset('resources/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('resources/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('resources/xyuymkymesgcocke/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <!-- apps -->
    <script src="{{ asset('resources/xyuymkymesgcocke/dist/js/app.min.js') }}"></script>
    <script src="{{ asset('resources/xyuymkymesgcocke/dist/js/app.init-menusidebar.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('resources/xyuymkymesgcocke/assets/extra-libs/sparkline/sparkline.js') }}"></script>

    <script src="{{ asset('resources/plugin_old/Lobibox/Lobibox.js') }}"></script>

<script>var loadingState = '<center><img src="{{ asset('resources/img/spin.gif') }}" width="150" style="padding:20px;"></center>'; </script>
@yield('js')
</body>
</html>
