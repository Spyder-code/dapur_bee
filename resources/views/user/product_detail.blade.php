@extends('layouts.user.user')
@section('title',$product->name)
@section('img-meta',asset($product->image))
@section('description',$product->description??'Toko Bunga Flower House menyediakan berbagai macam bunga papan, bunga tangan, bunga salib, bunga potong dan lain-lain.')
@section('content')
<style>
    .image-hover:hover{
        transform: scale(1.5) !important;
    }
</style>
    @php
        $customer = App\Models\Customer::where('ip_address',request()->ip())->first();
    @endphp
        <!-- Single Products Section Start -->
        <div class="section section-padding border-bottom">
            <div class="container">
                <div class="row learts-mb-n40">

                    <!-- Product Images Start -->
                    <div class="col-lg-6 col-12 learts-mb-40">
                        <div class="product-images">
                            <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                                {"src": "{{ asset($product->image) }}", "w": 700, "h": 1100},
                                {{-- {"src": "assets/images/product/single/3/product-zoom-2.webp", "w": 700, "h": 1100},
                                {"src": "assets/images/product/single/3/product-zoom-3.webp", "w": 700, "h": 1100},
                                {"src": "assets/images/product/single/3/product-zoom-4.webp", "w": 700, "h": 1100} --}}
                            ]'><i class="far fa-expand"></i></button>
                            <div class="product-gallery-slider">
                                <div class="product-zoom" data-image="{{ asset($product->image) }}">
                                    <img src="{{ asset($product->image) }}" alt="">
                                </div>
                                {{-- <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-2.webp">
                                    <img src="assets/images/product/single/3/product-2.webp" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-3.webp">
                                    <img src="assets/images/product/single/3/product-3.webp" alt="">
                                </div>
                                <div class="product-zoom" data-image="assets/images/product/single/3/product-zoom-4.webp">
                                    <img src="assets/images/product/single/3/product-4.webp" alt="">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- Product Images End -->

                    <!-- Product Summery Start -->
                    <div class="col-lg-6 col-12 learts-mb-40">
                        <form action="{{ route('cart.store') }}" method="POST" class="product-summery">
                            <div class="product-nav">
                                @if ($left)
                                <a href="{{ route('page.product.detail',$left->slug) }}"><i class="fal fa-long-arrow-left"></i></a>
                                @endif
                                @if ($right)
                                <a href="{{ route('page.product.detail',$right->slug) }}"><i class="fal fa-long-arrow-right"></i></a>
                                @endif
                            </div>
                            <div class="product-ratings">
                                <span class="star-rating">
                                    <span class="rating-active" style="width: 100%;">ratings</span>
                                </span>
                                {{-- <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a> --}}
                            </div>
                            <h3 class="product-title">{{ $product->name }}</h3>
                            <div class="product-price">Rp. {{ number_format($product->price) }}</div>
                            <div class="product-description">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="product-variations row">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="col-12 mb-3">
                                    <label for="note">Jumlah</label>
                                    <input name="qty" type="number" required value="1" min="1">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="note">Catatan</label>
                                    <input name="note" type="text" required>
                                </div>
                            </div>
                            <div class="product-buttons">
                                {{-- <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a> --}}
                                @if (Auth::check())
                                    <button type="submit" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Tambah ke Keranjang</button>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-dark btn-outline-hover-dark"><i class="fal fa-shopping-cart"></i> Tambah ke Keranjang</a>
                                @endif
                                {{-- <a href="{{ route('page.whatsapp',['product'=>$product]) }}" class="btn btn-success btn-outline-hover-success"><i class="fal fa-shopping-cart"></i> Whatsapp</a> --}}
                            </div>
                        </form>
                    </div>
                    <!-- Product Summery End -->

                </div>
            </div>

        </div>
        <!-- Single Products Section End -->

        <!-- Recommended Products Section Start -->
        <div class="section section-padding">
            <div class="container">

                <!-- Section Title Start -->
                <div class="section-title2 text-center">
                    <h2 class="title">Menu Lainnya</h2>
                </div>
                <!-- Section Title End -->

                <!-- Products Start -->
                <div class="product-carousel">

                    @foreach ($products as $item)
                    <div class="col-6 col-sm">
                        <div class="product">
                            <div class="product-thumb">
                                <a href="{{ route('page.product.detail',$item->slug) }}" class="image">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                    <img class="image-hover " src="{{ asset($item->image) }}" alt="{{ $item->name }}">
                                </a>
                                <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a>
                            </div>
                            <div class="product-info">
                                <h6 class="title"><a href="{{ route('page.product.detail',$item->slug) }}">{{ $item->name }}</a></h6>
                                <span class="price">
                                    <span class="old">Rp. {{ number_format($item->price + rand(5000,10000)) }}</span>
                                    <span class="new">Rp. {{ number_format($item->price) }}</span>
                                </span>
                                <div class="product-buttons">
                                    <a href="{{ route('page.product.detail',$item->slug) }}" class="product-button hintT-top" data-hint="Detail"><i class="fal fa-search"></i></a>
                                    <a href="#" class="product-button hintT-top" data-hint="Add to Cart"><i class="fal fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Products End -->

            </div>
        </div>
        <!-- Recommended Products Section End -->
@endsection
