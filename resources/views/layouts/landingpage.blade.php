<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website HMSI ITK">
    <meta name="keywords" content="HMSI, Sistem Informasi, Institut Teknologi Kalimantan">
    <meta name="author" content="HMSI ITK">
    <meta name="author" content="Themesdesign">

    <link rel="apple-touch-icon" href="/app-assets/images/logo/logo-hmsi.png">
    <link rel="shortcut icon" type="image/x-icon" href="/app-assets/images/logo/logo-hmsi.png">

    <title>HMSI ITK | {{ $title }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700|Roboto:400,500,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="/landingpage-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Materialdesign icons css -->
    <link href="/landingpage-assets/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Mobirise icons css -->
    <link href="/landingpage-assets/css/mobiriseicons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Magnific-popup -->
    <link rel="stylesheet" href="/landingpage-assets/css/magnific-popup.css">


    <!--Slider-->
    <link rel="stylesheet" href="/landingpage-assets/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/landingpage-assets/dist/assets/owl.theme.default.min.css">

    <!-- Custom styles for this template -->
    <link href="/landingpage-assets/css/menu.css" rel="stylesheet">
    <link href="/landingpage-assets/css/style.css" rel="stylesheet">

    <!--Template Color-->
    <link href="/landingpage-assets/css/colors/default.css" rel="stylesheet">

    @yield('style')

</head>

<body>

    <!-- Navigation Bar-->
    <header id="topnav" class="defaultscroll fixed-top sticky {{ Request::url() == url('/') ? '' : 'navbar-light' }}">
        <div class="container">
            <!-- Logo container-->
            <div>
                <a href="index.html" class="logo text-uppercase">
                    <img src="/app-assets/images/logo/logo-hmsi-text-right.png" alt="" class="logo-dark" height="32">
                    @if ( Request::url() == url('/'))
                        <img src="/app-assets/images/logo/logo-hmsi-text-right.png" alt="" class="logo-light" height="32">
                    @endif
                </a>
            </div>
            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    <li class="">
                        <a href="{{ url('/') != Request::url() ? url('/') : '' }}#home">Home</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/') != Request::url() ? url('/') : '' }}#about">Tentang</a>
                    </li>
                    <li class="">
                        <a href="{{ url('/') != Request::url() ? url('/') : '' }}#posts">Informasi</a>
                    </li>
                    <li class="{{ route('organizational-structure') == Request::url() ? 'active' : '' }}">
                        <a href="" class="redirect-nav" data-redirect-url="{{ route('organizational-structure') }}">Struktur Organisasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    @yield('content')
    <section class="section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="/app-assets/images/logo/deret-1.png" class="d-block d-md-inline mx-auto mb-4 mb-md-0" height="100px">
                    <img src="/app-assets/images/logo/deret-2.png" class="d-block d-md-inline mx-auto ml-md-4 mb-4 mb-md-0" height="100px">
                    <img src="/app-assets/images/logo/deret-3.png" class="d-block d-md-inline mx-auto ml-md-4 mb-4 mb-md-0" height="100px">
                    <img src="/app-assets/images/logo/deret-4.png" class="d-block d-md-inline mx-auto ml-md-4 mb-4 mb-md-0" height="100px">
                    <img src="/app-assets/images/logo/deret-5.png" class="d-block d-md-inline mx-auto ml-md-4" height="100px">
                </div>
            </div>
        </div>
    </section>
    <!-- COPYRIGHT -->
    <div class="footer-alt bg-dark">
        <p class="copy-rights">2021 © HMSI ITK</p>
    </div>


    <!-- js placed at the end of the document so the pages load faster -->
    <script src="/landingpage-assets/js/jquery.min.js"></script>
    <script src="/landingpage-assets/js/popper.min.js"></script>
    <script src="/landingpage-assets/js/bootstrap.bundle.min.js"></script>
    <script src="/landingpage-assets/js/jquery.easing.min.js"></script>
    <script src="/landingpage-assets/dist/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script type="text/javascript" src="/landingpage-assets/js/scrollspy.min.js"></script>
    <script type="text/javascript" src="/landingpage-assets/js/jquery.magnific-popup.min.js"></script>
    <!--common script for all pages-->
    <script src="/landingpage-assets/js/jquery.app.js"></script>
    @yield('script')
    <script>
        $(document).ready(function () {
            if ($('.owl-carousel')[0]) {
                $('.owl-carousel').owlCarousel({
                    loop:true,
                    margin:10,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:true,
                            loop:false
                        },
                        600:{
                            items:3,
                            nav:true,
                            loop:false
                        },
                        1000:{
                            items:4,
                            nav:true,
                            loop:false
                        },
                        1440: {
                            items:5,
                            nav:true,
                            loop:false
                        },
                        1920: {
                            items:6,
                            nav:true,
                            loop:false
                        }
                    }
                })
            }
            $(document).on("click", ".redirect-nav", function(e)
            {
                e.preventDefault();

                var redirectUrl = $(this).data("redirect-url");

                window.location.href = redirectUrl;
            });
        })
    </script>
</body>

</html>
