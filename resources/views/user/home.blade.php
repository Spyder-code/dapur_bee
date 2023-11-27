@extends('layouts.user.user')
@section('content')
    <!-- Slider main container Start -->
    <div class="home5-slider swiper-container section" id="banner1">
        <div class="row align-items-center learts-mb-n20">
            <div class="home5-slide2-content col-md-6 col-12 learts-mb-20">
                <span class="sub-title" style="color: white">DapurBee</span>
                <h2 class="title mt-3 ts" style="font-size: 1.3rem">Home Cooking Experience 2021</h2>
                <div class="link"><a href="{{ route('page.shop') }}" class="btn">PESAN SEKARANG</a></div>
            </div>
            <div class="home5-slide2 col-md-6 col-12"><img src="{{ asset('images/p-1.png') }}" alt="Home 5 Slider Image"></div>
            {{-- <div class="home5-slide-collection">NEW PRODUCT</div> --}}
            {{-- <div class="home5-slide-sale">30% OFF</div> --}}
            <div class="home5-slide-shop-link"><a href="{{ route('page.shop') }}">Online Store</a></div>
        </div>
    </div>
    <!-- Slider main container End -->

    <!-- Product & Banner Section Start -->
    <div class="section section-fluid learts-mt-40">
        <div class="container-fluid">
            <div class="isotope-grid row learts-mb-n30">

                <div class="grid-sizer col-1"></div>
                @foreach ($products as $product)
                    @if ($loop->iteration % 3 == 1)
                        <div class="grid-item col-lg-6 col-12 learts-mb-30">
                            <div class="sale-banner7">
                                <a href="{{ route('page.product.detail',$product->slug) }}" class="inner">
                                    <div class="image"><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"></div>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if ($loop->iteration % 3 == 2)
                        <div class="grid-item col-lg-3 col-sm-6 col-6 learts-mb-30">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{ route('page.product.detail',$product->slug) }}" class="image">
                                        <img src="{{ asset($product->image) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{ route('page.product.detail',$product->slug) }}">{{ $product->name }}</a></h6>
                                    <span class="price">
                                        Rp. {{ number_format($product->price) }}
                                    </span>
                                    <div class="product-buttons">
                                        <a href="{{ route('page.product.detail',$product->slug) }}" class="product-button hintT-top" data-hint="Detail"><i class="fal fa-search"></i></a>
                                        <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($loop->iteration % 3 == 0)
                        <div class="grid-item col-lg-3 col-sm-6 col-6 learts-mb-30">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{ route('page.product.detail',$product->slug) }}" class="image">
                                        <img src="{{ asset($product->image) }}" alt="Product Image">
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{ route('page.product.detail',$product->slug) }}">{{ $product->name }}</a></h6>
                                    <span class="price">
                                        Rp. {{ number_format($product->price) }}
                                    </span>
                                    <div class="product-buttons">
                                        <a href="{{ route('page.product.detail',$product->slug) }}" class="product-button hintT-top" data-hint="Detail"><i class="fal fa-search"></i></a>
                                        <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach
            </div>
        </div>
    </div>
    <!-- Product & Banner Section End -->

@endsection
