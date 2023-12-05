@extends('layouts.user.user')
@section('content')
<div class="mt-3">
    <div class="container">
        <div class="row">

            <!-- Product Images Start -->
            {{-- <div class="col-lg-6 col-12 learts-mb-40">
                @foreach ($carts as $cart)
                    <div class="product-images mt-3">
                        <button class="product-gallery-popup hintT-left" data-hint="Click to enlarge" data-images='[
                            {"src": "{{ asset($cart->product->image) }}", "w": 700, "h": 1100},
                        ]'><i class="far fa-expand"></i></button>
                        <div class="product-gallery-slider">
                            <div class="product-zoom" data-image="{{ asset($cart->product->image) }}">
                                <img src="{{ asset($cart->product->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
            <!-- Product Images End -->

            <!-- Product Summery Start -->
            <div class="col-12">
                <form action="{{ route('transaction.store') }}" method="POST" class="product-summery">
                    @csrf
                    <input type="hidden" name="total" id="total">
                    <input type="hidden" name="city" id="city">
                    <input type="hidden" name="expedition_price" id="expedition_price">
                    <input type="hidden" name="amount" value="{{ $total }}">
                    {{-- <div class="product-ratings">
                        <span class="star-rating">
                            <span class="rating-active" style="width: 100%;">ratings</span>
                        </span>
                        <a href="#reviews" class="review-link">(<span class="count">3</span> customer reviews)</a>
                    </div> --}}
                    {{-- @foreach ($carts as $cart)
                    <h3 class="product-title" style="font-size: 1.3rem">{{ $cart->product->name }}</h3>
                    <p>{{ $cart->product->description }}</p>
                    <div class="d-flex justify-content-between">
                        <div class="product-price" style="font-size: 1.2rem">Rp. {{ number_format($cart->product->price) }}</div>
                        <div class="product-price" style="font-size: 1.2rem">({{ $cart->qty }})</div>
                        <div class="product-price" style="font-size: 1.2rem">Rp. {{ number_format($cart->product->price * $cart->qty) }}</div>
                    </div>
                    <hr>
                    @endforeach --}}
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    {{-- <div class="product-description">
                        <p>{{ $cart->product->description }}</p>
                    </div> --}}
                    <div class="card p-3 shadow">
                        <div class="product-variations row">
                            <div class="col-6 mb-3">
                                <label for="receiver">Penerima</label>
                                <input type="text" name="receiver" id="receiver" class="form-control shadow-none" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="phone">No. HP (+62)</label>
                                <input type="number" name="phone" id="phone" class="form-control shadow-none" value="{{ Auth::user()->phone ?? '' }}" required>
                            </div>
                            <div class="col-6">
                                <label>Pengiriman Dari</label>
                                <select name="" id="" class="form-control" disabled>
                                    <option value="">{{ $setting->address }}</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="distance">Jarak Pengiriman ke Tujuan /Km</label>
                                <input type="number" name="distance" id="distance" class="form-control shadow-none" required>
                            </div>
                            {{-- <div class="col-4 mb-3">
                                <label for="province_id">Provinsi</label>
                                <select name="province_id" id="province_id" class="form-control shadow-none" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="city_id">Kota/Kabupaten</label>
                                <select name="city_id" id="city_id" class="form-control shadow-none" required></select>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="expedition_name">Jasa Pengiriman</label>
                                <select name="expedition_name" id="expedition_name" class="form-control shadow-none" required>
                                    <option value=""></option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">Kantor POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div> --}}
                            <div class="col-12 mb-3">
                                <label for="expedition_type">Ongkos Kirim</label>
                                <input type="text" name="expedition_type" id="expedition_type" class="form-control shadow-none" readonly required/>
                            </div>
                            <div class="col-8 mb-3">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" id="address" class="form-control shadow-none" value="{{ Auth::user()->address ?? '' }}" required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="postcode">Kode POS</label>
                                <input type="text" name="postcode" id="postcode" class="form-control shadow-none" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="to_date">Pesanan Untuk Tanggal</label>
                                <input type="datetime-local" name="to_date" id="to_date" class="form-control shadow-none" min="{{ date('Y-m-d\TH:i') }}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="message">Catatan</label>
                                <input name="message" type="text" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="total_text">Total</label>
                                <input name="total_text" id="total_text" type="text" required disabled value="Rp. {{ number_format($total) }}">
                            </div>
                        </div>
                        <div class="product-buttons">
                            {{-- <a href="#" class="btn btn-icon btn-outline-body btn-hover-dark hintT-top" data-hint="Add to Wishlist"><i class="fal fa-heart"></i></a> --}}
                            <button type="submit" onclick="return confirm('Apakah data sudah benar?')" class="btn btn-sm btn-success btn-outline-hover-success"><i class="fal fa-cash-register"></i> Pesan Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Product Summery End -->

        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $('#expedition_name').attr('disabled',true);
        $('#expedition_type').attr('disabled',true);
        let total = @json($total);
        // $.ajax({
        //     type: "GET",
        //     url: "{{ route('api.ongkir.province') }}",
        //     success: function (response) {
        //         $.each(response, function (idx, item) {
        //             html+='<option value="'+val.province_id+'">'+val.province+'</option>'
        //             $('#province_id').append($('<option>', {
        //                 value: item.province_id,
        //                 text : item.province
        //             }));
        //         });
        //     }
        // });
        // $('#province_id').change(function (e) {
        //     $('#expedition_name').attr('disabled',false);
        //     var val = $(this).val();
        //     $.ajax({
        //         type: "GET",
        //         url: "{{ route('api.ongkir.city') }}",
        //         data:{
        //             province_id:val
        //         },
        //         success: function (response) {
        //             $('#city_id').html('');
        //             $('#city_id').append($('<option>', {
        //                 value: '',
        //                 text : ''
        //             }));
        //             $.each(response, function (idx, item) {
        //                 // html+='<option value="'+val.province_id+'">'+val.province+'</option>'
        //                 $('#city_id').append($('<option>', {
        //                     value: item.city_id,
        //                     text : item.type+' '+item.city_name,
        //                     data_kota : item.type+' '+item.city_name,
        //                 }));
        //             });
        //         }
        //     });
        // });
        // $('#city_id').change(function (e) {
        //     var destination = $(this).val();
        //     var courier = $('#expedition_name').val();
        //     var weight = 12;
        //     var kota = $(this).find(':selected').attr('data_kota');
        //     $('#city').val(kota);
        //     if (courier!=null) {
        //         getCost(destination,courier,weight);
        //     }
        // });
        // $('#expedition_name').change(function (e) {
        //     $('#expedition_type').attr('disabled',false);
        //     var val = $(this).val();
        //     var destination = $('#city_id').val();
        //     var weight = 12;
        //     getCost(destination,val,weight);
        // });
        // $('#expedition_type').change(function (e) {
        //     var val = $(this).find(':selected').attr('data_price');
        //     total += parseInt(val);
        //     $('#total').val(total);
        //     $('#expedition_price').val(parseInt(val));
        //     $('#total_text').val('Rp. '+rp(total));
        //     $('#expedition_price').val('Rp. '+val);
        // });

        function rp (num){
            return num.toLocaleString('en-US');
        }

        // function getCost (destination,courier,weight) {
        //     $.ajax({
        //         type: "POST",
        //         url: "{{ route('api.ongkir') }}",
        //         data:{
        //             destination:destination,
        //             courier:courier,
        //             weight:weight,
        //         },
        //         success: function (response) {
        //             $('#expedition_type').html('');
        //             $('#expedition_type').append($('<option>', {
        //                 value: '',
        //                 text : ''
        //             }));
        //             $.each(response.costs, function (idx, item) {
        //                 // html+='<option value="'+val.province_id+'">'+val.province+'</option>'
        //                 $('#expedition_type').append($('<option>', {
        //                     value: item.description+' ('+item.cost[0].etd+' hari) Rp. '+item.cost[0].value,
        //                     text : item.description+' ('+item.cost[0].etd+' hari) Rp. '+item.cost[0].value,
        //                     data_price:item.cost[0].value,
        //                 }));
        //             });
        //         }
        //     });
        // }

        function countOngkir(){
            let distance = $('#distance').val();
            let price = @json($setting->distance_price);
            let total_price = parseInt(distance) * parseInt(price);
            let min = parseInt(@json($setting->distance_min));
            if(total_price<min){
                total_price = min;
            }
            let a = parseInt(total);
            a += parseInt(total_price);
            $('#expedition_type').val('Ongkos kirim Rp. '+rp(total_price));
            $('#expedition_price').val(total_price);
            $('#total').val(a);
            $('#total_text').val('Rp. '+rp(a));

        }

        $('#distance').change(function (e) {
            countOngkir();
        });

        $('#distance').keyup(function (e) {
            countOngkir();
        });
    </script>
@endpush
