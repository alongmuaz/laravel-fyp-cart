<!DOCTYPE html>
<!--
Template Name: Final Project 2015
Version: 1.0
Author: Muaz
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>ABC Silk Screen Works | @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{asset('a/assets/global/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/global/css/plugins.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/admin/layout3/css/layout.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('a/assets/admin/layout3/css/themes/red-intense.css')}}" rel="stylesheet" type="text/css" id="style_color">
    <link href="{{asset('a/assets/admin/layout3/css/custom.css')}}" rel="stylesheet" type="text/css">
    <!-- END THEME STYLES -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
<body>
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url("/")}}">
                <img src="{{asset('a/assets/admin/layout3/img/logo.png')}}" height="50px"></a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->

                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{asset('a/assets/admin/layout3/img/muaz.jpg')}}">
                            <span class="username username-hide-mobile"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{url("admin/settings")}}">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="{{url('auth/logout')}}">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">

            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu ">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('admin')}}">Dashboard</a>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                            Manage Categories <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li >
                                <a href="{{url('admin/categories/view')}}">
                                    <i class="icon-briefcase"></i>
                                    View Categories </a>
                            </li>
                            <li>
                                <a href="{{url('admin/categories/create')}}">
                                    <i class="icon-briefcase"></i>
                                    Create Categories </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown ">
                        <a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
                            Manage Products <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li >
                                <a href="{{url('admin/products/view')}}">
                                    <i class="icon-briefcase"></i>
                                    View Products </a>
                            </li>
                            <li>
                                <a href="{{url('admin/products/create')}}">
                                    <i class="icon-briefcase"></i>
                                    Create Products</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{url('admin/settings')}}">Settings</a>
                    </li>
                    <li>
                        <a href="{{url('admin/payments')}}">Manage Payment</a>
                    </li>



                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@yield('title') <small>@yield('subtitle')</small></h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <div class="page-toolbar">
            </div>
            <!-- END THEME PANEL -->
        </div>
        <!-- END PAGE TOOLBAR -->
    </div>
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">

                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE BREADCRUMB -->

        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('flash_message'))
                    <div class="Metronic-alerts alert alert-warning fade in">
                        <strong>{{Session::get('flash_message')}}</strong>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- BEGIN PRE-FOOTER -->
<!-- END PRE-FOOTER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="container">
        2015 &copy; <a href="https://www.facebook.com/muaz.alghifari" target="_blank">Muhammad Mu'az</a>, <a href="https://www.facebook.com/amirul.h.azahar?fref=ts">Amirul Helmi</a>, <a href="https://www.facebook.com/preven.kumar?fref=ts">Preven Kumar</a>
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="{{asset('a/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('a/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<script src="{{asset('a/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/jquery-migrate.min.js')}}" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="{{asset('a/assets/global/plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.stack.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.crosshair.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('a/assets/global/plugins/flot/jquery.flot.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/flot/jquery.flot.resize.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/global/plugins/flot/jquery.flot.categories.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('a/assets/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/admin/layout3/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/admin/layout3/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('a/assets/admin/pages/scripts/ecommerce-index.js')}}"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        EcommerceIndex.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>