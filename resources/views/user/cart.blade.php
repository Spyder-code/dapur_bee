@extends('layouts.user.user')
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
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card p-3 shadow">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th style="width: 300px">Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                            <th><i class="fas fa-circle"></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $cart->product->name }}</td>
                                            <td>Rp. {{ number_format($cart->product->price) }}</td>
                                            <td>{{ $cart->qty }}</td>
                                            <td>Rp. {{ number_format($cart->qty * $cart->product->price) }}</td>
                                            <td>
                                                <div class="d-flex gap-2 flex-column">
                                                    <form action="{{ route('cart.destroy',$cart) }}" method="POST" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger w-100 btn-outline-hover-danger"><i class="fal fa-trash"></i> Hapus Dari Keranjang</button>
                                                    </form>
                                                    {{-- <a href="{{ route('page.checkout',['cart'=>$cart]) }}" class="btn btn-sm btn-warning w-100 btn-outline-hover-warning"><i class="fal fa-cash-register"></i> Pesan Sekarang</a> --}}
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('page.checkout') }}" class="btn btn-sm btn-success w-100 btn-outline-hover-success"><i class="fal fa-cash-register"></i> Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            @forelse ($carts as $cart)
            <div class="section section-padding border-bottom">
                <div class="container">
                    <div class="row learts-mb-n40">

                        <!-- Product Images Start -->
                        <div class="col-lg-6 col-12 learts-mb-40">
                            <div class="product-images">
                                <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                                    {"src": "{{ asset($cart->product->image) }}", "w": 700, "h": 1100},
                                ]'><i class="far fa-expand"></i></button>
                                <div class="product-gallery-slider">
                                    <div class="product-zoom" data-image="{{ asset($cart->product->image) }}">
                                        <img src="{{ asset($cart->product->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Images End -->

                        <!-- Product Summery Start -->
                        <div class="col-lg-6 col-12 learts-mb-40">
                            <div class="product-summery">
                                <div class="product-ratings">
                                    <span class="star-rating">
                                        <span class="rating-active" style="width: 100%;">ratings</span>
                                    </span>
                                    {{-- <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a> --}}
                                </div>
                                <h3 class="product-title">{{ $cart->product->name }}</h3>
                                <div class="product-price">Rp. {{ number_format($cart->product->price) }}</div>
                                <div class="product-description">
                                    <p>{{ $cart->product->description }}</p>
                                </div>
                                <div class="product-variations row">
                                    <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                                    <div class="col-12 mb-3">
                                        <label for="qty">Jumlah</label>
                                        <input name="qty" type="number" value="{{ $cart->qty }}" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="note">Catatan</label>
                                        <input name="note" type="text" value="{{ $cart->note }}" required>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    {{-- <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a> --}}
                                    <form action="{{ route('cart.destroy',$cart) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-outline-hover-danger"><i class="fal fa-trash"></i> Hapus Dari Keranjang</button>
                                    </form>
                                    {{-- <a href="{{ route('page.checkout',['cart'=>$cart]) }}" class="btn btn-sm btn-warning btn-outline-hover-warning"><i class="fal fa-cash-register"></i> Pesan Sekarang</a> --}}
                                    {{-- <a href="{{ route('page.whatsapp',['product'=>$cart->product,'cart'=>$cart]) }}" class="btn btn-sm btn-success btn-outline-hover-success"><i class="fal fa-shopping-cart"></i> Whatsapp</a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Product Summery End -->

                    </div>
                </div>

            </div>
            @empty
            <div class="row align-items-center mt-5">
                <div class="home5-slide1-content col-12 learts-mb-50">
                    <h2 class="title">KERANJANG KOSONG</h2>
                </div>
            </div>
            @endforelse
        <!-- Single Products Section End -->
@endsection
