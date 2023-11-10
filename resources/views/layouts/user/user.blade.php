<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title','Dapur_Bee')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="@yield('description','Dapur_Bee menyediakan berbagai macam produk makanan. ')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="@yield('title','Dapur_Bee')">
    <meta property="og:description" content="@yield('description','Dapur_Bee menyediakan berbagai macam produk makanan. ')">
    <meta property="og:image" content="@yield('img-meta',asset('images/logo.jpeg'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="@yield('title','Dapur_Bee')">
    <meta property="twitter:description" content="@yield('description','Dapur_Bee menyediakan berbagai macam produk makanan. ')">
    <meta property="twitter:image" content="@yield('img-meta',asset('images/logo.jpeg'))">

    <!-- CSS ============================================ -->

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor/font-awesome-pro.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor/customFonts.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/select2.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/perfect-scrollbar.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/swiper.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/photoswipe.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/photoswipe-default-skin.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/slick.css">

    <!-- Main Style CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="{{ asset('/') }}assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/plugins/plugins.min.css"> -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.min.css">
    @yield('style')
    <style>
        .offcanvas-menu>ul>li>a {
            display: block;
            padding: 8px 24px 8px 0;
            text-transform: uppercase;
            color: #edc82e;
        }
        .offcanvas-social a{
            background: transparent;
            border: 1px solid #edc82e;
            color: #edc82e;
        }
    </style>
</head>

<body class="offside-header-left">
    @php
        $customer = App\Models\Customer::where('ip_address',request()->ip())->first();
    @endphp
    @include('layouts.user.partials.sidebar-menu',['customer'=>$customer])
    @include('layouts.user.partials.mobile-header',['customer'=>$customer])

    <x-message></x-message>
    @yield('content')
    @include('layouts.user.partials.footer')

    <!-- JS ============================================ -->

    <!-- Vendors JS -->
    <script src="{{ asset('/') }}assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/jquery-migrate-3.1.0.min.js"></script>
    <script src="{{ asset('/') }}assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('/') }}assets/js/plugins/select2.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/swiper.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/slick.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/mo.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/isotope.pkgd.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.matchHeight-min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/ion.rangeSlider.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/photoswipe.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/photoswipe-ui-default.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/ResizeSensor.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.sticky-sidebar.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/product360.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/jquery.scrollUp.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/scrollax.min.js"></script>
    <script src="{{ asset('/') }}assets/js/plugins/instafeed.min.js"></script>

    <!-- Main Activation JS -->
    <script src="{{ asset('/') }}assets/js/main.js"></script>
    @stack('script')
    @yield('script')
</body>

</html>
