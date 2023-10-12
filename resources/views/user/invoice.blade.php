@extends('layouts.user.print')
@section('content')
    <div class="container my-3" id="print">
        <div class="card p-3 shadow">
            <div class="row">
                <div class="col-6">
                    <table style="text-transform: uppercase; font-weight:500">
                        <tr>
                            <td style="width: 100px">INVOICE</td>
                            <td>: {{ $transaction->invoice }}</td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Penerima</td>
                            <td>: {{ $transaction->receiver }}</td>
                        </tr>
                        <tr>
                            <td style="width: 100px">Alamat</td>
                            <td>: {{ $transaction->address }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-6 text-center">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                    </div>
                    {{ $setting->address }}
                </div>
                <div class="col-12 mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Keterangan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($transaction->transaction_details as $item)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between">
                                            Rp. <span>{{ number_format($item->product->price) }}</span>
                                        </div>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $transaction->expedition_type }}</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        Rp. <span>{{ number_format($transaction->expedition_price) }}</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"><b>TOTAL</b></td>
                                <td>
                                    <div class="d-flex justify-content-between fw-bold">
                                        Rp. <span>{{ number_format($transaction->total) }}</span>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="col-12 my-2">
                    <div class="section section-paddings">
                        <div class="container text-center">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                            <p class="copyright">&copy; 2022 Flower House. All Rights Reserved | <strong>+62 821 5480 1061</strong> | <a href="mailto:office@flowerhouse.com">office@flowerhouse.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
