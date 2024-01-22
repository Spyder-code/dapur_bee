@extends('layouts.user.user')
@section('content')
<style>
    .image-hover:hover{
        transform: scale(1.5) !important;
    }
</style>
        <!-- Shop Products Section Start -->
        <div class="section section-padding p-2">

            <!-- Shop Toolbar Start -->
            <div class="shop-toolbar border-bottom">
                <div class="container">
                    <div class="row learts-mb-n20">

                        <!-- Isotop Filter Start -->
                        <div class="col-md col-12 align-self-center learts-mb-20">
                            <div class="isotope-filter shop-product-filter" data-target="#shop-products">
                                <button class="active" data-filter="*">Semua</button>
                                @foreach ($product_categories as $product_category)
                                    <button data-filter=".{{ $product_category->slug }}">{{ $product_category->name }}</button>
                                @endforeach
                                {{-- <button data-filter=".featured">Hot Products</button>
                                <button data-filter=".new">New Products</button>
                                <button data-filter=".sales">Sales Products</button> --}}
                            </div>
                        </div>
                        <!-- Isotop Filter End -->

                    </div>
                </div>
            </div>
            <!-- Shop Toolbar End -->


            <div class="section learts-mt-70">
                <div class="container-fluid">
                    <!-- Products Start -->
                    <div id="shop-products" class="products isotope-grid row row-cols-xl-5 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">

                        <div class="grid-sizer col-1"></div>
                        @foreach ($products as $product)
                        <div class="grid-item col-sm col-6 {{ $product->productCategory->slug }}">
                            <div class="product">
                                <div class="product-thumb">
                                    <a href="{{ route('page.product.detail',$product->slug) }}" class="image" style="height:190px">
                                        <img src="{{ asset($product->image) }}" alt="Product Image" class="img-fluid" style="height: 190px;">
                                        <img class="image-hover" src="{{ asset($product->image) }}" style="height: 190px;" alt="Product Image">
                                    </a>
                                    {{-- <a href="wishlist.html" class="add-to-wishlist hintT-left" data-hint="Add to wishlist"><i class="far fa-heart"></i></a> --}}
                                </div>
                                <div class="product-info">
                                    <h6 class="title"><a href="{{ route('page.product.detail',$product->slug) }}">{{ $product->name }}</a></h6>
                                    <span class="price">
                                        Rp. {{ number_format($product->price) }}
                                    </span>
                                    <div class="product-buttons">
                                        <a href="{{ route('page.product.detail',$product->slug) }}" class="product-button hintT-top" data-hint="Detail"><i class="fal fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Products End -->
                    {{-- <div class="text-center learts-mt-70">
                        <a href="#" class="btn btn-dark btn-outline-hover-dark"><i class="ti-plus"></i> More</a>
                    </div> --}}
                </div>
            </div>

        </div>
        <!-- Shop Products Section End -->
@endsection

@push('script')
<script>
    function addCart(id){
        let user_id = @json(Auth::id());
        if(user_id){
            $.ajax({
                type: "POST",
                url: "{{ route('cart.add') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    user_id:user_id,
                    product_id:id
                },
                success: function (response) {
                    alert("Cart has Added!");
                }
            });
        }else{
            window.location.href = @json(route('login'));
        }
    }
</script>
@endpush
