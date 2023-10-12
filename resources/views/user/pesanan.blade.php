@extends('layouts.user.user')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="waiting-tab" data-bs-toggle="tab" data-bs-target="#waiting-tab-pane" type="button" role="tab" aria-controls="waiting-tab-pane" aria-selected="true">Pembayaran <sup>{{ $transactions->where('is_paid',0)->count() }}</sup></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="progress-tab" data-bs-toggle="tab" data-bs-target="#progress-tab-pane" type="button" role="tab" aria-controls="progress-tab-pane" aria-selected="false">Diproses <sup>{{ $transactions->where('is_paid',1)->where('status','!=','complete')->count() }}</sup></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="complete-tab" data-bs-toggle="tab" data-bs-target="#complete-tab-pane" type="button" role="tab" aria-controls="complete-tab-pane" aria-selected="false">Selesai <sup>{{ $transactions->where('is_paid',1)->where('status','complete')->count() }}</sup></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="waiting-tab-pane" role="tabpanel" aria-labelledby="waiting-tab" tabindex="0">
                                <div class="py-3">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Invoice</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($transactions->where('is_paid',0) as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->invoice }}</td>
                                                        <td>Rp. {{ number_format($item->total) }}</td>
                                                        <td><span class="text-danger"><b>Belum Di Bayar</b></span></td>
                                                        <td>
                                                            <a href="{{ route('payment.pay',['invoice'=>$item->invoice]) }}" class="btn btn-success btn-sm w-100 my-1">Bayar Tagihan</a>
                                                            <form action="{{ route('transaction.destroy', $item) }}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm w-100 my-1">Batalkan Pesanan</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada transaksi!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="progress-tab-pane" role="tabpanel" aria-labelledby="progress-tab" tabindex="0">
                                <div class="py-3">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Invoice</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($transactions->where('is_paid',1)->where('status','!=','complete') as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->invoice }}</td>
                                                        <td>Rp. {{ number_format($item->total) }}</td>
                                                        <td><span class="text-warning"><b>{{ $item->status }}</b></span></td>
                                                        <td>
                                                            <div class="d-flex gap-3">
                                                                <a href="{{ route('payment.pay',['invoice'=>$item->invoice]) }}" class="btn btn-info btn-sm w-100">Detail</a>
                                                                @if ($item->status!='verify')
                                                                {{-- <button onclick="printInvoice('{{ $item->invoice }}')" class="btn btn-success btn-sm w-100">Print Invoice</button> --}}
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada transaksi!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="complete-tab-pane" role="tabpanel" aria-labelledby="complete-tab" tabindex="0">
                                <div class="py-3">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Tanggal</th>
                                                    <th>Invoice</th>
                                                    <th>Jumlah</th>
                                                    <th>Status</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($transactions->where('is_paid',1)->where('status','complete') as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->invoice }}</td>
                                                        <td>Rp. {{ number_format($item->total) }}</td>
                                                        <td><span class="text-success"><b>Selesai</b></span></td>
                                                        <td>
                                                            <a href="{{ route('payment.pay',['invoice'=>$item->invoice]) }}" class="btn btn-info btn-sm w-100">Detail</a>
                                                            {{-- <button onclick="printInvoice('{{ $item->invoice }}')" class="btn btn-success btn-sm w-100">Print Invoice</button> --}}
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6" class="text-center">Tidak ada transaksi!</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    const printInvoice = (invoice)=>{
        let url = @json(url('invoice'))+'?invoice='+invoice;
        let params_ = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=800,height=500,left=100,top=100`;
        open(url, 'Cetak INVOICE', params_);
    }
</script>
@endpush
