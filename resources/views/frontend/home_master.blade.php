<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Movie Hub</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="" />

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content=""/>
        <meta property="og:image" content=""/>
        <meta property="og:url" content=""/>
        <meta property="og:site_name" content=""/>
        <meta property="og:description" content=""/>
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

        <!-- Animate.css -->
        <!--{{asset('public/frontent_resource/')}}-->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/animate.css')}}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/icomoon.css')}}">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/bootstrap.css')}}">

        <!-- Magnific Popup -->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/magnific-popup.css')}}">

        <!-- Flexslider  -->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/flexslider.css')}}">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/owl.theme.default.min.css')}}">

        <!-- Theme style  -->
        <link rel="stylesheet" href="{{asset('public/frontent_resource/css/style.css')}}">

        <!-- Modernizr JS -->
        <script src="{{asset('public/frontent_resource/js/modernizr-2.6.2.min.js')}}"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div class="colorlib-loader"></div>

        <div id="page">
            
            <!-- main menu -->
            @include('frontend.main_menu')
            <!-- //main menu -->

            <!--home content start-->
            @yield('home_content')
            <!--home content end-->
            
            <!-- footer -->
            @include('frontend.home_footer')
            <!-- //footer -->
        </div>

        <div class="gototop js-top">
            <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
        </div>

        <!-- jQuery -->
        <script src="{{asset('public/frontent_resource/js/jquery.min.js')}}"></script>
        <!-- jQuery Easing -->
        <script src="{{asset('public/frontent_resource/js/jquery.easing.1.3.js')}}"></script>
        <!-- Bootstrap -->
        <script src="{{asset('public/frontent_resource/js/bootstrap.min.js')}}"></script>
        <!-- Waypoints -->
        <script src="{{asset('public/frontent_resource/js/jquery.waypoints.min.js')}}"></script>
        <!-- Flexslider -->
        <script src="{{asset('public/frontent_resource/js/jquery.flexslider-min.js')}}"></script>
        <!-- Owl carousel -->
        <script src="{{asset('public/frontent_resource/js/owl.carousel.min.js')}}"></script>
        <!-- Magnific Popup -->
        <script src="{{asset('public/frontent_resource/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('public/frontent_resource/js/magnific-popup-options.js')}}"></script>
        <!-- Main -->
        <script src="{{asset('public/frontent_resource/js/main.js')}}"></script>

    </body>
</html>

