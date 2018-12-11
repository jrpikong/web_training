<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>SSA - Samsung Student Ambassador</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Porto - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('porto/img/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('porto/img/apple-touch-icon.png')}}">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light%7CPlayfair+Display:400" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('porto/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/animate/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/magnific-popup/magnific-popup.min.css')}}">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('porto/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('porto/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('porto/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('porto/css/theme-shop.css')}}">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{asset('porto/vendor/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('porto/vendor/rs-plugin/css/navigation.css')}}">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{asset('porto/css/demos/demo-medical.css')}}">
    <link rel="stylesheet" href="{{asset('porto/css/skins/skin-medical.css')}}">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    @stack('style')
    <!-- Head Libs -->
    <script src="{{asset('porto/vendor/modernizr/modernizr.min.js')}}"></script>

    <!-- WhatsHelp.io widget -->
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "+6287888015988", // WhatsApp number
                company_logo_url: "//warungkomputer.com/wp-content/uploads/2018/12/logo-wa.png", // URL of company logo (png, jpg, gif)
                greeting_message: "Hello.. ada yang bisa kami bantu?", // Text of greeting message
                call_to_action: "Klik disini untuk bertanya!", // Call to action
                button_color: "#FF6550", // Color of button
                position: "right", // Position may be 'right' or 'left'
                order: "whatsapp,call" // Order of buttons
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
    <!-- /WhatsHelp.io widget -->


</head>
<body>

<div class="body">
    <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
        <div class="header-body border-top-0">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-logo">
                                <a href="/">
                                    {{--<img alt="Porto" width="143" height="40" src="img/demos/medical/logo-medical.png">--}}
                                    <h3 class="tp-caption font-weight-extra-bold text-color-primary negative-ls-2 mt-3" style="margin-bottom:0;">SSA</h3>
                                    <span class="text-color-primary">Samsung Student Ambassador</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <div class="header-nav order-2 order-lg-1">
                                <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav nav-pills" id="mainNav">
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link active" href="/">
                                                    Home
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="{{ route('aboutUs') }}">
                                                    About Us
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="{{ route('products') }}">
                                                    Product
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="{{ route('faq') }}">
                                                    FAQ
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="/login">
                                                    Login
                                                </a>
                                            </li>
                                            <li class="dropdown-full-color dropdown-secondary">
                                                <a class="nav-link" href="/register">
                                                    Register
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <i class="fas fa-bars"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div role="main" class="main">
        @yield('content')
    </div>

    <footer id="footer" class="mt-0">
        <div class="container my-4">
            <div class="row py-5">
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">Contact Details</h5>
                    <p class="text-4 mb-1">Porto Template 123</p>
                    <p class="text-4 mb-4 pb-1">Porto Blvd, Suite</p>

                    <p class="text-5 mb-1 pt-2">Call: 123-456-7890</p>
                    <p class="text-5 mb-0">Email: <a href="mailto:info@porto.com">info@porto.com</a></p>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-6 text-transform-none font-weight-semibold text-color-light mb-4">Newsletter</h5>
                    <p class="text-4 mb-1">Get all the latest informationon Sales and Offers.</p>
                    <p class="text-4">Sign up for newsletter today.</p>
                    <div class="alert alert-success d-none" id="newsletterSuccess">
                        <strong>Success!</strong> You've been added to our email list.
                    </div>
                    <div class="alert alert-danger d-none" id="newsletterError"></div>
                    <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mw-100">
                        <div class="input-group input-group-rounded">
                            <input class="form-control form-control-sm bg-light px-4 text-3" placeholder="Email Address..." name="newsletterEmail" id="newsletterEmail" type="text">
                            <span class="input-group-append">
                                <button class="btn btn-primary text-color-light text-2 py-3 px-4" type="submit"><strong>SUBSCRIBE!</strong></button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-copyright footer-copyright-style-2">
            <div class="container py-2">
                <div class="row py-4">
                    <div class="col d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                        <p>© Copyright 2018. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Vendor -->
<script src="{{asset('porto/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
<script src="{{asset('porto/vendor/popper/umd/popper.min.js')}}"></script>
<script src="{{asset('porto/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('porto/vendor/common/common.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{asset('porto/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
<script src="{{asset('porto/vendor/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{asset('porto/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('porto/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('porto/vendor/vide/jquery.vide.min.js')}}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('porto/js/theme.js')}}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{asset('porto/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('porto/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('porto/js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('porto/js/theme.init.js')}}"></script>
@stack('scripts')
</body>
</html>