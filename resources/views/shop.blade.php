<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- Title here -->
    <title>ABC SilkScreen Works</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="{{$settings->site_description}}">
    <meta name="keywords" content="{{$settings->site_keyword}}">
    <meta name="author" content="Mu'az">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="{{asset('s/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" href="{{asset('s/css/settings.css')}}" media="screen" />
    <!-- Flex slider -->
    <link href="{{asset('s/css/flexslider.css')}}" rel="stylesheet">
    <link href="{{asset('s/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('s/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Sidebar nav -->
    <link href="{{asset('s/css/sidebar-nav.css')}}" rel="stylesheet">
    <!-- Custom CSS -->

    <link href="{{asset('s/css/style.css')}}" rel="stylesheet">
    <!-- Stylesheet for Color -->
    <link href="{{asset('s/css/red.css')}}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('s/img/favicon/favicon.png')}}">
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="{{asset('s/engine1/style.css')}}" />
    <script type="text/javascript" src="{{asset('s/engine1/jquery.js')}}"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="{{url('http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js')}}"></script>
</head>

<body>

<!-- Cart, Login and Register form (Modal) -->
<!-- Cart Modal starts -->
@include('store.cartheader')
<!--/ Cart modal ends -->

<!-- Login Modal starts -->
@include('store.loginheader')
<!--/ Login modal ends -->

<!-- Register Modal starts -->

<!--/ Register modal ends -->

<!-- Header starts -->
@include('store.header')
<!--/ Header ends -->

<!-- Navigation -->
@include('store.navigationheader')
<!--/ Navigation End -->

<!-- Items -->
@yield('content')
<!--/ Items end -->

<!-- Owl Carousel Starts -->

<!-- Owl Carousel Ends -->



<!-- Footer starts -->
@include('store.footer')
<!--/ Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<!-- Javascript files -->
<!-- jQuery -->
<script src="{{asset('s/js/jquery.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('s/js/bootstrap.min.js')}}"></script>
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="{{asset('s/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('s/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('s/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('s/js/filter.js')}}"></script>
<!-- Flex slider -->
<script src="{{asset('s/js/jquery.flexslider-min.js')}}"></script>
<!-- Respond JS for IE8 -->
<script src="{{asset('s/js/respond.min.js')}}"></script>
<!-- HTML5 Support for IE -->
<script src="{{asset('s/js/html5shiv.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('s/js/custom.js')}}"></script>
<script type="text/javascript">

    var revapi;

    jQuery(document).ready(function() {

        revapi = jQuery('.tp-banner').revolution(
                {
                    delay:5000,
                    startwidth:1170,
                    startheight:300,
                    hideThumbs:10,
                    fullWidth:"on",
                    forceFullWidth:"on",
                    navigationType:"none",
                    navigationArrows:"none",


                });

    });	//ready

</script>
</body>
</html>