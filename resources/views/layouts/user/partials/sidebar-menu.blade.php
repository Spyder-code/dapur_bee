    @php
        $product_categories = App\Models\ProductCategory::all();
        $setting = App\Models\Setting::find(1);
        if(!Auth::check()){
            $cart_count = 0;
        }else{
            $cart_count = App\Models\Cart::where('user_id',Auth::id())->count();
        }
    @endphp
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
                                    {{ Auth::check() ? \Str::words(Auth::user()->name, 1,'') : 'Login' }} <i class="fal fa-user"></i>
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
                        {{-- <a href="{{ route('page.carts') }}" class="mt-2" style="color: #edc82e"><span class="cart-count">{{ $cart_count }}</span><i class="fal fa-shopping-cart"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="offcanvas-menu">
                <ul>
                    <li><a href="{{ url('/') }}"><span class="menu-text">Beranda</span></a></li>
                    <li><a href="{{ route('page.shop') }}"><span class="menu-text">Daftar Menu</span></a>
                        {{-- <ul class="sub-menu">
                            @foreach ($product_categories as $product_category)
                                <li><a href="{{ route('page.shop',['product_category'=>$product_category->slug]) }}"><span class="menu-text">{{ $product_category->name }}</span></a></li>
                            @endforeach
                        </ul> --}}
                    </li>
                    @if (!Auth::check())
                    <li><a href="{{ route('register') }}"><span class="menu-text">Buat Akun</span></a></li>
                    @else
                    <li><a href="{{ route('page.carts') }}"><span class="menu-text">Keranjang</span></a></li>
                    <li><a href="{{ route('page.pesanan') }}"><span class="menu-text">Pesanan Saya</span></a></li>
                    @endif
                    {{-- <li><a href="{{ route('page.contact') }}"><span class="menu-text">Kontak</span></a></li> --}}
                    {{-- <li><a href="{{ route('page.instagram') }}"><span class="menu-text">Instagram</span></a></li> --}}
                </ul>
            </div>
            <div class="offcanvas-social">
                @if ($setting->facebook)
                <a href="{{ $setting->facebook }}" class="hintT-top my-1" data-hint="Facebook"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if ($setting->twitter)
                <a href="{{ $setting->twitter }}" class="hintT-top my-1" data-hint="Twitter"><i class="fab fa-twitter"></i></a>
                @endif
                @if ($setting->instagram)
                <a href="{{ $setting->instagram }}" class="hintT-top my-1" data-hint="Instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if ($setting->youtube)
                <a href="{{ $setting->youtube }}" class="hintT-top my-1" data-hint="Youtube"><i class="fab fa-youtube"></i></a>
                @endif
                @if ($setting->whatsapp)
                <a href="https://wa.me/{{ $setting->whatsapp }}" class="hintT-top my-1" data-hint="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                @endif
            </div>
            {{-- @if ($setting->whatsapp)
            <a href="https://wa.me/{{ $setting->whatsapp }}" class="btn btn-success btn-outline-hover-success mt-5 btn-sm"><i class="fa fa-phone-alt"></i> Whatsapp</a>
            @endif --}}
            @auth
                <span class="mt-2 text-white">Selamat berbelanja, {{ Auth::user()->name }} 😊</span>
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
                                        {{ Auth::check() ? \Str::words(Auth::user()->name, 1,'') : 'Login' }} <i class="fal fa-user"></i>
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
                            <a href="{{ route('page.carts') }}" class="mt-2"><span class="cart-count">{{ $cart_count }}</span><i class="fal fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-menu">
                    <ul>
                        <li><a href="{{ url('/') }}"><span class="menu-text">Beranda</span></a></li>
                        <li><a href="{{ route('page.shop') }}"><span class="menu-text">Belanja</span></a>
                        @if (!Auth::check())
                        <li><a href="{{ route('register') }}"><span class="menu-text">Buat Akun</span></a></li>
                        @else
                        <li><a href="{{ route('page.carts') }}"><span class="menu-text">Keranjang</span></a></li>
                        <li><a href="{{ route('page.pesanan') }}"><span class="menu-text">Pesanan Saya</span></a></li>
                        @endif
                            {{-- <ul class="sub-menu">
                                @foreach ($product_categories as $product_category)
                                    <li><a href="{{ route('page.shop',['product_category'=>$product_category->slug]) }}"><span class="menu-text">{{ $product_category->name }}</span></a></li>
                                @endforeach
                            </ul> --}}
                        </li>
                        {{-- <li><a href="{{ route('page.order') }}"><span class="menu-text">Order</span></a></li> --}}
                        <li><a href="{{ route('page.contact') }}"><span class="menu-text">Kontak</span></a></li>
                        {{-- <li><a href="{{ route('page.instagram') }}"><span class="menu-text">Instagram</span></a></li> --}}
                    </ul>
                </div>
                <div class="offcanvas-social">
                    @if ($setting->facebook)
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
                    @endif
                </div>
                @if ($setting->whatsapp)
                    <a href="https://wa.me/{{ $setting->whatsapp }}" class="btn btn-success btn-outline-hover-success mt-5 btn-sm"><i class="fa fa-phone-alt"></i> Whatsapp</a>
                @endif
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
