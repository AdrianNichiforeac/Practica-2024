<!DOCTYPE html>
<html lang="en">

<head>
    <title>ElitAgrotehnologie CRM</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Start Material Admin stylesheets-->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('css/materialadmin/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/materialadmin.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/rickshaw/rickshaw.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/morris/morris.core.css')}}">
    <link rel="stylesheet" href="{{asset('css/materialadmin/fullcalendar/fullcalendar.css')}}">
    <!-- End Material Admin stylesheets-->

</head>

<body class="menubar-hoverable header-fixed ">

<!--Material Admin-->
<header id="header">
    <div class="headerbar">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{route('admin.home')}}">
                            <span class="text-lg text-bold text-primary">ElitAgrotehnologie CRM</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                <li>
                    <!-- Search form -->
                    <form class="navbar-search" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
                        </div>
                        <button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
                    </form>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i><sup class="badge style-danger">4</sup>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Today's messages</li>
                        <li>
                            <a class="alert alert-callout alert-warning" href="javascript:void(0);">
                                <img class="pull-right img-circle dropdown-avatar" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar2.jpg?1422538624" alt="">
                                <strong>Alex Anistor</strong><br>
                                <small>Testing functionality...</small>
                            </a>
                        </li>
                        <li>
                            <a class="alert alert-callout alert-info" href="javascript:void(0);">
                                <img class="pull-right img-circle dropdown-avatar" src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar3.jpg?1422538624" alt="">
                                <strong>Alicia Adell</strong><br>
                                <small>Reviewing last changes...</small>
                            </a>
                        </li>
                        <li class="dropdown-header">Options</li>
                        <li><a href="http://www.codecovers.eu/materialadmin/pages/login">View all messages <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                        <li><a href="http://www.codecovers.eu/materialadmin/pages/login">Mark as read <span class="pull-right"><i class="fa fa-arrow-right"></i></span></a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
                <li class="dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-area-chart"></i>
                    </a>
                    <ul class="dropdown-menu animation-expand">
                        <li class="dropdown-header">Server load</li>
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Today</strong></span>
                                    <strong class="pull-right">93%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-danger" style="width: 93%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Yesterday</strong></span>
                                    <strong class="pull-right">30%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-success" style="width: 30%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                        <li class="dropdown-progress">
                            <a href="javascript:void(0);">
                                <div class="dropdown-label">
                                    <span class="text-light">Server load <strong>Lastweek</strong></span>
                                    <strong class="pull-right">74%</strong>
                                </div>
                                <div class="progress"><div class="progress-bar progress-bar-warning" style="width: 74%"></div></div>
                            </a>
                        </li><!--end .dropdown-progress -->
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-options -->
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="http://www.codecovers.eu/assets/img/modules/materialadmin/avatar1.jpg?1422538623" alt="">
                        <span class="profile-info">
						{{Auth::user()->name}} {{Auth::user()->surname}}
						<small>{{Auth::user()->roles()->first()->name ?? ''}}</small>
					</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li><a href="/company/edit">Profilul meu</a></li>
                        <li class="divider"></li>
                        <li><a href="/logout"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
                    </ul><!--end .dropdown-menu -->
                </li><!--end .dropdown -->
            </ul><!--end .header-nav-profile -->
            <ul class="header-nav header-nav-toggle">
                <li>
                    <a class="btn btn-icon-toggle btn-default" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul><!--end .header-nav-toggle -->
        </div><!--end #header-navbar-collapse -->
    </div>
</header>

<div id="base">
    <div id="content">
        @yield('content')
    </div>

    <div id="menubar" class="menubar-inverse  animate">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="http://www.codecovers.eu/materialadmin/dashboards/dashboard">
                    <span class="text-lg text-bold text-primary ">Agrigoda&nbsp;CRM</span>
                </a>
            </div>
        </div>
        <div class="nano has-scrollbar" style="height: 489px;"><div class="nano-content" tabindex="0" style="right: -17px;"><div class="menubar-scroll-panel" style="padding-bottom: 33px;">
                    <!-- BEGIN MAIN MENU -->
                    <ul id="main-menu" class="gui-controls">
                        <!-- BEGIN DASHBOARD -->
                        <li class="active expanding expanded">
                            <a href="{{route('admin.home')}}" class="active">
                                <div class="gui-icon"><i class="md md-home"></i></div>
                                <span class="title">Dashboard</span>
                            </a>
                        </li><!--end /menu-li -->
                        <!-- END DASHBOARD -->

                        <x-admin.sidebar.company-sidebar></x-admin.sidebar.company-sidebar>
                        @if(auth()->user()->adminHasRole('SuperAdmin'))
                            <x-admin.sidebar.employees-sidebar></x-admin.sidebar.employees-sidebar>
                            <x-admin.sidebar.calendar></x-admin.sidebar.calendar>
                            <x-admin.sidebar.partners-sidebar></x-admin.sidebar.partners-sidebar>
                            <x-admin.sidebar.authorization-links></x-admin.sidebar.authorization-links>
                            <x-admin.sidebar.tasks-sidebar></x-admin.sidebar.tasks-sidebar>
                            <x-admin.sidebar.regions-sidebar></x-admin.sidebar.regions-sidebar>
                            <x-admin.sidebar.clients-sidebar></x-admin.sidebar.clients-sidebar>
                        @endif

                    </ul><!--end .main-menu -->
                    <!-- END MAIN MENU -->

                    <div class="menubar-foot-panel">
                        <small class="no-linebreak hidden-folded">
                            <span class="opacity-75">Copyright © 2014</span> <strong>CodeCovers</strong>
                        </small>
                    </div>
                </div></div><div class="nano-pane" style="display: block;"><div class="nano-slider" style="height: 433px; transform: translate(0px, 0px);"></div></div></div>
        <!--end .menubar-scroll-panel-->
    </div>
</div>

<script src="{{asset('js/materialadmin/libs/jquery/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/jquery/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/spin.js/spin.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/autosize/jquery.autosize.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/moment/moment.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/flot/curvedLines.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/nanoscroller/jquery.nanoscroller.min.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/ckeditor/adapters/jquery.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/d3/d3.v3.js')}}"></script>
<script src="{{asset('js/materialadmin/libs/rickshaw/rickshaw.min.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/App.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppNavigation.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppOffcanvas.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppCard.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppForm.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppNavSearch.js')}}"></script>
<script src="{{asset('js/materialadmin/core/source/AppVendor.js')}}"></script>
<script src="{{asset('js/materialadmin/core/demo/Demo.js')}}"></script>
<script src="{{asset('js/materialadmin/core/demo/DemoFormEditors.js')}}"></script>

@yield('scripts')
</body>

</html>
