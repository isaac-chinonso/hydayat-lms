<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../app/images/favicon.png">
    <title>@yield('titile')</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="../../app/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="../../app/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../app/dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="../../app/dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- page css -->
    <link href="../../app/dist/css/pages/user-card.css" rel="stylesheet">
    <!-- Popup CSS -->
    <link href="../../app/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-127069966-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-127069966-4');
    </script>
    <style type="text/css">
        #status span.status {
            display: none;
            font-weight: bold;
        }

        span.status.complete {
            color: green;
        }

        span.status.incomplete {
            color: red;
        }

        #status.complete span.status.complete {
            display: inline;
        }

        #status.incomplete span.status.incomplete {
            display: inline;
        }
    </style>
</head>

<body class="horizontal-nav boxed skin-megna fixed-layout" oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">LMS STUDENT</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">LEARNING SYSTEM</span> </span>
                        <strong class="light-logo">LMS</strong>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <form class="app-search d-none d-md-block d-lg-block">
                                <input type="text" class="form-control" placeholder="Search & enter">
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if (empty(Auth::user()->picture->first()->source))
                                <img src="../../app/images/users/1.jpg" width="50px">
                                @else
                                <img src="../../upload/picture/{{ Auth::user()->picture->first()->source }}" width="50px">
                                @endif
                                <span class="hidden-md-down" style="color: #fff;">{{ Auth::user()->username }}&nbsp;<i class="ti-angle-down"></i></span>
                                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            </a>
                            <!-- text-->
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="ti-power-off"></i> Logout</a>
                            <!-- text-->
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- STUDENT</li>
                        <li> <a href="{{ route('studentdashboard') }}"><span class="hide-menu">Dashboard </span></a>
                        </li>
                        <li> <a href="{{ route('studentclass') }}"><span class="hide-menu">Classes </span></a>
                        </li>
                        <li> <a href="{{ route('studentmessage') }}"><span class="hide-menu">Messages </span></a>
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
        @yield('content')
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer">
        © 2020 Learning System by Arakozia Educational Center
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../app/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="../../app/node_modules/popper/popper.min.js"></script>
    <script src="../../app/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../app/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="../../app/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../app/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../app/dist/js/custom.min.js"></script>
    <!--webcam JavaScript -->
    <script src="../../app/dist/js/webcam.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="../../app/node_modules/raphael/raphael-min.js"></script>
    <script src="../../app/node_modules/morrisjs/morris.min.js"></script>
    <script src="../../app/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="../../app/node_modules/toast-master/js/jquery.toast.js"></script>
    <!-- Chart JS -->
    <script src="../../app/dist/js/dashboard1.js"></script>
    <script src="../../app/node_modules/toast-master/js/jquery.toast.js"></script>
    <!--stickey kit -->
    <script src=".../../app/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../../app/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="../../app/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="../../app/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <script>
        $(function() {
            $('#chat, #msg, #comment, #todo').perfectScrollbar();
        });
    </script>
    <script type='text/javascript'>
        document.getElementById('video').addEventListener('ended',myHandler,true);
        function myHandler(e) {
          let btn = document.querySelector("#myBtn");
            btn.click();
        }
    </script>
   
</body>

</html>