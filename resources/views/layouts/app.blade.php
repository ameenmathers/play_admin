<!DOCTYPE html>
<html>

<head>

    <!-- Title -->
    <title>Play Network Africa</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Admin Panel" />
    <meta name="keywords" content="admin,dashboard" />
    <meta name="author" content="" />

    <!-- Styles -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets2/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="assets2/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="assets2/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>

    <!-- Theme Styles -->
    <link href="assets2/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets2/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="assets2/css/custom.css" rel="stylesheet" type="text/css"/>

    <script src="assets2/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="assets2/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="page-header-fixed">
<div class="overlay"></div>

<div class="menu-wrap">
    <nav class="profile-menu">
        <div class="profile"><img src="assets2/images/avatar.png" width="60" alt="David Green"/><span>Logged in as {{Auth::user()->name}}</span></div>

    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>

<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="#" class="logo-text"><span>Play Network Africa</span></a>
            </div><!-- Logo Box -->
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic sidebar-toggle"><i class="fa fa-bars"></i></a>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic toggle-fullscreen"><i class="fa fa-expand"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <i class="fa fa-cogs"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown"><i class="fa fa-bell"></i><span class="badge badge-success pull-right">3</span></a>
                            <ul class="dropdown-menu title-caret dropdown-lg" role="menu">
                                <li><p class="drop-title">You have 3 pending tasks !</p></li>
                                <li class="dropdown-menu-list slimscroll tasks">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#">
                                                <div class="task-icon badge badge-success"><i class="icon-user"></i></div>
                                                <span class="badge badge-roundless badge-default pull-right">1min ago</span>
                                                <p class="task-details">New user registered.</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="task-icon badge badge-danger"><i class="icon-energy"></i></div>
                                                <span class="badge badge-roundless badge-default pull-right">24min ago</span>
                                                <p class="task-details">Database error.</p>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="drop-all"><a href="#" class="text-center">All Tasks</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                <span class="user-name">Logged in as {{Auth::user()->name}}<i class="fa fa-angle-down"></i></span>
                                <img class="img-circle avatar" src="assets2/images/avatar.png" width="40" height="40" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href="#"><i class="fa fa-user"></i>Profile</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a href="{{url('logout')}}"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{url('logout')}}" class="log-out waves-effect waves-button waves-classic">
                                <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                            </a>
                        </li>

                    </ul><!-- Nav -->
                </div><!-- Top Menu -->
            </div>
        </div>
    </div><!-- Navbar -->
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">
                    <a href="javascript:void(0);" id="profile-menu-link">
                        <div class="sidebar-profile-image">
                            <img src="assets2/images/avatar.png" class="img-circle img-responsive" alt="">
                        </div>
                        <div class="sidebar-profile-details">
                            <span>{{Auth::user()->name}}<br><small>Admin</small></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                <li class="active"><a href="{{url('home')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>

                <li><a href="{{url('')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-user"></span><p>Users</p></a></li>
                <li><a href="{{url('')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-calender"></span><p>Events</p></a></li>
                <li><a href="{{url('')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-gift"></span><p>Privileges</p></a></li>
                <li><a href="{{url('')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-map"></span><p>Foundation</p></a></li>
                <li><a href="{{url('upload-event')}}" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-save"></span><p>Upload Event</p></a></li>
            </ul>
        </div><!-- Page Sidebar Inner -->
    </div><!-- Page Sidebar -->

    @yield('content')
</main><!-- Page Content -->

<div class="cd-overlay"></div>


<!-- Javascripts -->
<script src="assets2/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="assets2/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="assets2/plugins/pace-master/pace.min.js"></script>
<script src="assets2/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="assets2/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets2/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets2/plugins/switchery/switchery.min.js"></script>
<script src="assets2/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets2/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="assets2/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="assets2/plugins/waves/waves.min.js"></script>
<script src="assets2/plugins/3d-bold-navigation/js/main.js"></script>
<script src="assets2/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="assets2/plugins/jquery-counterup/jquery.counterup.min.js"></script>
<script src="assets2/plugins/toastr/toastr.min.js"></script>
<script src="assets2/plugins/flot/jquery.flot.min.js"></script>
<script src="assets2/plugins/flot/jquery.flot.time.min.js"></script>
<script src="assets2/plugins/flot/jquery.flot.symbol.min.js"></script>
<script src="assets2/plugins/flot/jquery.flot.resize.min.js"></script>
<script src="assets2/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="assets2/plugins/curvedlines/curvedLines.js"></script>
<script src="assets2/plugins/metrojs/MetroJs.min.js"></script>
<script src="assets2/js/modern.js"></script>
<script src="assets2/js/pages/dashboard.js"></script>

</body>

</html>