@extends('layouts.user.user')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
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
                                @foreach ($transaction->transaction_details as $idx => $cart)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cart->product->name }}</td>
                                    <td>Rp. {{ number_format($cart->product->price) }}</td>
                                    <td>{{ $cart->qty }}</td>
                                    <td>Rp. {{ number_format($cart->qty * $cart->product->price) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td>{{ $idx + 2 }}</td>
                                    <td>Ongkos Kirim</td>
                                    <td>Rp. {{ number_format($transaction->expedition_price) }}</td>
                                    <td>{{ $transaction->distance }} Km</td>
                                    <td>Rp. {{ number_format($transaction->expedition_price) }}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4"><b>TOTAL</b></td>
                                    <td><b>Rp. {{ number_format($transaction->total) }}</b></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning">
                            {{-- <b>{{ strtoupper($transaction->payment_status->name) }}</b> <br>
                            <i style="font-size: .8rem" class="text-justify">{{ $transaction->payment_status->description }}</i> --}}
                            @if ($transaction->is_paid==0)
                                <b>Menunggu Konfirmasi Pembayaran</b>
                            @elseif($transaction->is_paid==1 && $transaction->status == 'verify')
                                <b>Menunggu Konfirmasi Oleh Admin</b>
                            @elseif($transaction->is_paid==1 && $transaction->status == 'delivery')
                                <b>Pesanan Sedang dikirim</b>
                            @elseif($transaction->is_paid==1 && $transaction->status == 'complete')
                                <b>Pesanan telah sampai</b>
                            @else
                                <b>Pesanan Sedang Di Proses</b>
                            @endif
                        </div>
                        <ul class="list-group mt-2" style="font-size: .8rem">
                            <li class="list-group-item d-flex justify-content-between">
                                INVOICE : <span>{{ $transaction->invoice }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                PENERIMA : <span>{{ $transaction->receiver }} - {{ $transaction->phone }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                ALAMAT : <span>{{ $transaction->address }} - {{ $transaction->postcode }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                TOTAL HARGA: <span>Rp. {{ number_format($transaction->total) }}</span>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="card-footer d-flex justify-between flex-wrap" style="gap: 10px">
                        @if ($transaction->is_paid==0)
                        <form action="{{ route('payment.reset_token',$transaction) }}" method="post" style="width: 100%">
                            @csrf
                            <button class="btn py-2 btn-sm btn-warning btn-rounded w-100" type="submit"> Ganti Metode Pembayaran</button>
                        </form>
                        <div style="width: 100%">
                            <button id="pay-button" class="btn py-2 btn-sm btn-success btn-rounded w-100"> Bayar</button>
                        </div>
                        @endif
                        <div style="width: 100%">
                            <button type="button" onclick="checkPayment()" class="btn py-2 btn-sm btn-info btn-rounded w-100"> Cek Status Pembayaran</button>
                        </div>
                        <div style="width: 100%">
                            <a href="{{ route('page.profile') }}" class="btn py-2 btn-sm btn-secondary btn-rounded w-100"> Kembali ke Beranda</a>
                        </div>
                    </div> --}}
                    {{-- <pre class="p-4"><div id="result-json">JSON result will appear here after payment:<br></div></pre> --}}
                </div>
            </div>
            <div class="col-12 col-md-7 mt-5">
                @if ($transaction->is_paid==0)
                <form action="{{ route('transaction.update', $transaction) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="is_paid" value="1">
                    <div class="card">
                        <div class="card-header">
                            INFORMASI PEMBAYARAN
                        </div>
                        <div class="card-body">
                            <div class="mb-2">
                                <label for="payment_method">Metode Pembayaran</label>
                                <select name="payment_method" id="payment_method" class="form-select shadow-none">
                                    <option value="">-</option>
                                    <option value="BCA">(Transfer Bank BCA) 263816238 A.n Dapur_Bee</option>
                                    <option value="BRI">(Transfer Bank BRI) 26381623823 A.n Dapur_Bee</option>
                                    <option value="E-Money (DANA,OVE,SHOPEE PAY)">(Transfer E-Money) 083857317946 A.n Dapur_Bee</option>
                                    {{-- <option value="cod">Bayar Ditempat</option> --}}
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="payment_file">Bukti Pembayaran</label>
                                <input type="file" name="payment_file" id="payment_file">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="customer" value="1" onclick="return confirm('are you sure?')" class="btn btn-sm btn-success w-100 btn-outline-hover-success">Konfirmasi Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </form>
                @else
                    <a href="{{ asset($transaction->payment_file) }}" target="d_blank">
                        <img src="{{ asset($transaction->payment_file) }}" alt="file" class="img-fluid" style="height: 200px">
                    </a>

                @endif
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ env('CLIENT_KEY_MIDTRANS') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(){
            payMidtrans();
        };

        function payMidtrans(){
            snap.pay(@json($transaction->token), {
                // Optional
                onSuccess: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result,null, 2);
                },
                // Optional
                onPending: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result,null, 2);
                },
                // Optional
                onError: function(result){
                    /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result,null, 2);
                }
            });
        }

        function checkPayment() {
            location.reload()
        }

        payMidtrans();
    </script>
@endpush
