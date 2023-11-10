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
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

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

   <!-- OffCanvas Mobile Menu Start -->
    <div class="offcanvas offcanvas-header" style="background-color: black">
        <div class="inner customScroll">
            <div class="offcanvas-logo">
                <a href="{{ url('/') }}" class="d-flex justify-content-center"><img src="{{ asset('images/logo.png') }}" alt="dapur_bee" style="height: 120px"></a>
            </div>
            <div class="offcanvas-buttons">
                <div class="header-tools px-2">
                    <div class="header-login">
                        @if (Auth::check())
                            <div class="dropdown">
                                <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="background: transparent; border:1px solid #edc82e; color:#edc82e">
                                    {{ Auth::check() ? Auth::user()->name : 'Login' }} <i class="fal fa-user"></i>
                                </button>
                                @auth
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('page.profile') }}">Akun Saya</a>
                                    </div>
                                @endauth
                            </div>
                        @else
                            <a href="{{ route('page.profile') }}" class="btn btn-light btn-sm" style="background: transparent; border:1px solid #edc82e; color:#edc82e">Login <i class="fal fa-user"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{ route('product.index') }}"><span class="menu-text">Master Produk</span></a></li>
                    <li><a href="{{ route('product-category.index') }}"><span class="menu-text">Master Kategori</span></a>
                    <li><a href="{{ route('cart.index') }}"><span class="menu-text">Master Keranjang</span></a>
                    <li><a href="{{ route('transaction.index') }}"><span class="menu-text">Master Transaksi</span></a>
                    <li><a href="{{ route('user.index') }}"><span class="menu-text">Master Pengguna</span></a>
                    <li><a href="{{ route('setting.edit',1) }}"><span class="menu-text">Pengaturan</span></a>
                </ul>
            </div>
            <div class="offcanvas-social">

            </div>
            {{-- @if ($setting->whatsapp)
            <a href="https://wa.me/{{ $setting->whatsapp }}" class="btn btn-success btn-outline-hover-success mt-5 btn-sm"><i class="fa fa-phone-alt"></i> Whatsapp</a>
            @endif --}}
            @auth
                <span class="mt-2 text-white">Selamat datang, {{ Auth::user()->name }} 😊</span>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-outline-hover-danger mt-3 w-100 btn-sm"><i class="fa fa-door-closed"></i> Logout</button>
                </form>
            @endauth
        </div>
    </div>
   <!-- OffCanvas Mobile Menu End -->

   <!-- OffCanvas Search Start -->
   <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
           <div class="inner customScroll">
               <div class="offcanvas-logo">
                   <a href="{{ url('/') }}" class="d-flex justify-content-center"><img src="{{ asset('images/logo.png') }}" alt="dapur_bee" style="height: 120px"></a>
               </div>
               <div class="offcanvas-buttons">
                   <div class="header-tools px-2">
                       <div class="header-login">
                           @if (Auth::check())
                               <div class="dropdown">
                                   <button class="btn btn-light btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       {{ Auth::check() ?Auth::user()->name : 'Login' }} <i class="fal fa-user"></i>
                                   </button>
                                   @auth
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                           <a class="dropdown-item" href="{{ route('page.profile') }}">Akun Saya</a>
                                           {{-- <a class="dropdown-item" href="{{ route('page.pesanan') }}">Pesanan Saya</a> --}}
                                       </div>
                                   @endauth
                               </div>
                           @else
                               <a href="{{ route('page.profile') }}" class="btn btn-light btn-sm" style="background: transparent; border:1px solid #edc82e; color:#edc82e">Login <i class="fal fa-user"></i></a>
                           @endif
                       </div>
                       <div class="header-cart">
                           {{-- <a href="{{ route('page.carts') }}" class="mt-2"><span class="cart-count">{{ $cart_count }}</span><i class="fal fa-shopping-cart"></i></a> --}}
                       </div>
                   </div>
               </div>
               <div class="offcanvas-menu">
                   <ul>
                       <li><a href="{{ route('product.index') }}"><span class="menu-text">Master Produk</span></a></li>
                       <li><a href="{{ route('product-category.index') }}"><span class="menu-text">Master Kategori</span></a>
                       <li><a href="{{ route('cart.index') }}"><span class="menu-text">Master Keranjang</span></a>
                       <li><a href="{{ route('transaction.index') }}"><span class="menu-text">Master Transaksi</span></a>
                       <li><a href="{{ route('user.index') }}"><span class="menu-text">Master Pengguna</span></a>
                       <li><a href="{{ route('setting.edit',1) }}"><span class="menu-text">Pengaturan</span></a>
                   </ul>
               </div>
               <div class="offcanvas-social">
                   {{-- @if ($setting->facebook)
                   <a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                   @endif
                   @if ($setting->twitter)
                   <a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                   @endif
                   @if ($setting->instagram)
                   <a href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                   @endif
                   @if ($setting->youtube)
                   <a href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                   @endif --}}
               </div>
               {{-- @if ($setting->whatsapp)
                   <a href="https://wa.me/{{ $setting->whatsapp }}" class="btn btn-success btn-outline-hover-success mt-5 btn-sm"><i class="fa fa-phone-alt"></i> Whatsapp</a>
               @endif --}}
               @auth
                   <span>{{ Auth::user()->name }}</span>
                   <form action="{{ route('logout') }}" method="post">
                       @csrf
                       <button type="submit" onclick="return confirm('are you sure?')" class="btn btn-danger btn-outline-hover-danger mt-3 w-100 btn-sm"><i class="fa fa-door-closed"></i> Logout</button>
                   </form>
               @endauth
           </div>
   </div>
   <!-- OffCanvas Search End -->

   <div class="offcanvas-overlay"></div>

   <!-- Modal -->
   <div class="quickViewModal modal fade" id="quickViewModal">
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
               <button class="close" data-bs-dismiss="modal">&times;</button>
               <form action="{{ route('customer.store') }}" method="POST">
                   @csrf
                   <input type="hidden" name="ip_address" value="{{ request()->ip() }}">
                   <div class="col-12 mb-3">
                       <label for="name">Name</label>
                       <input name="name" type="text" value="{{ $customer->name ?? '' }}">
                   </div>
                   <div class="col-12 mb-3">
                       <label for="phone">Phone</label>
                       <input name="phone" type="text" value="{{ $customer->phone ?? '' }}">
                   </div>
                   <div class="col-12 mb-3">
                       <label for="address">Address</label>
                       <input name="address" type="text" value="{{ $customer->address ?? '' }}">
                   </div>
                   <button type="submit" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-save"></i> Save</button>
               </form>
           </div>
       </div>
   </div>

    {{-- @include('layouts.user.partials.mobile-header',['customer'=>$customer]) --}}

    <x-message></x-message>
    @yield('toolbar')
    @yield('content')
    {{-- @include('layouts.user.partials.footer') --}}

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
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
    @stack('script')
    @yield('script')
</body>

</html>
