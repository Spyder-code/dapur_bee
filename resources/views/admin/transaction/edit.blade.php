@extends('layouts.admin.admin')
@section('toolbar')
    <x-toolbar :title="'Detail Transaction'"></x-toolbar>
@endsection
@section('content')
<div class="content flex-row-fluid pb-5" id="kt_content">
    <div class="card">
        <div class="card-body py-2">
            <form method="POST" class="form" novalidate action="{{ route('transaction.update', $transaction) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-8">
                        <div class="row">
                            @foreach ($transaction->transaction_details as $item)
                            <div class="col-4">
                                <div class="card p-3 shadow-lg">
                                    <img src="{{ asset($item->product->image) }}" alt="" class="card-img-top">
                                    <hr>
                                    <div class="card-title">
                                        <h4>{{ $item->product->name }}</h4>
                                    </div>
                                    <div class="card-bodys p-2">
                                        {{ $item->note }}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-4" style="border-left: 1px solid black;">
                        @if ($transaction->payment_file)
                            <img src="{{ asset($transaction->payment_file) }}" alt="File" class="img-thumbnail" style="height: 240px">
                        @endif
                        <table class="table w-100">
                            <tr>
                                <td style="width: 130px">Penerima</td>
                                <td><b>: {{ $transaction->receiver }}</b></td>
                            </tr>
                            <tr>
                                <td>Pesanan untuk tanggal</td>
                                <td><b>: {{ date('d-m-Y H:i',strtotime($transaction->to_date)) }}</b></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td><b>: {{ $transaction->message }}</b></td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td><b>: {{ $transaction->is_paid == 1 ? 'Dibayar' : 'Belum dibayar' }}</b></td>
                            </tr>
                            <tr>
                                <td>Pembayaran</td>
                                <td><b>: {{ $transaction->payment_method }}</b></td>
                            </tr>
                            <tr>
                                <td>Status Pesanan</td>
                                <td><b>: {{ $transaction->status }}</b></td>
                            </tr>
                        </table>
                    </div>
                    {{-- @include('admin.transaction.form',['transaction'=>$transaction]) --}}
                </div>
                <hr>
                <input type="hidden" name="id" value="{{ $transaction->id }}">
                <div class="d-flex justify-content-center gap-2 my-3">
                    @if ($transaction->status=='verify')
                        <button type="submit" onclick="return confirm('are you sure?')" name="status" value="process" class="btn btn-warning">
                            <span class="indicator-label">Tandai Status Diproses</span>
                        </button>
                    @endif
                    @if ($transaction->status=='process')
                        <button type="submit" onclick="return confirm('are you sure?')" name="status" value="delivery" class="btn btn-primary">
                            <span class="indicator-label">Tandai Status Dikirim</span>
                        </button>
                    @endif
                    @if ($transaction->status=='delivery')
                        <button type="submit" onclick="return confirm('are you sure?')" name="status" value="complete" class="btn btn-success">
                            <span class="indicator-label">Tandai Status Selesai</span>
                        </button>
                    @endif
                    <a href="{{ route('transaction.index') }}" data-theme="light" class="btn btn-bg-secondary btn-active-color-primary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
