@extends('layouts.admin.admin')
@section('title', 'Transaksi')
@section('content')
<div class="container mt-4">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-4">
                <div class="d-flex justify-content-between">
                    <h4>List Transaksi</h4>
                    <a href="{{route('transaction.create')}}" data-theme="light" class="btn btn-sm btn-success">Tambah Transaksi</a>
                </div>
                <x-message></x-message>
                <div class="row">
                    <div class="col-6">
                        <form method="GET" action="{{ route('transaction.index') }}" class="d-flex gap-3">
                            <div class="mt-3">
                                <label>Dari</label>
                                <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                            </div class="mt-3">
                            <div class="mt-3">
                                <label>Sampai</label>
                                <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                            </div>
                            <div class="mt-3">
                                <label>Status</label>
                                <select name="status" id="status" class="form-select" style="width: 150px">
                                    <option {{ $status=='all'?'selected':'' }} value="all">Semua</option>
                                    <option {{ $status=='verify'?'selected':'' }} value="verify">Verifikasi</option>
                                    <option {{ $status=='process'?'selected':'' }} value="process">Prosess</option>
                                    <option {{ $status=='delivery'?'selected':'' }} value="delivery">Diantar</option>
                                    <option {{ $status=='complete'?'selected':'' }} value="complete">Selesai</option>
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary mt-5">Filter</button>
                            </div>
                            <div>
                                <a href="{{ route('transaction.index') }}" class="btn btn-sm btn-warning mt-5">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <table class="table align-middle table-row-dashed fs-6 gy-5 mt-3">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">ID</th>
                            <th class="min-w-125px">Pesanan Untuk Tgl</th>
                            <th class="min-w-125px">Pelanggan</th>
                            <th class="min-w-125px">Penerima</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Pembayaran</th>
                            <th class="min-w-125px">No. HP</th>
                            <th class="min-w-125px">Ongkir</th>
                            <th class="min-w-125px">Alamat</th>
                            <th class="min-w-125px">Kode POS</th>
                            <th class="min-w-125px">Produk</th>
                            <th class="min-w-125px">Jumlah</th>
                            <th class="min-w-125px">Total</th>
                            <th class="min-w-125px">Catatan</th>
                            <th class="min-w-125px">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let role_id = @json(Auth::user()->role_id);

    let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            scrollX:true,
            ajax: {
                method:'GET',
                url: '{!! route('transaction.data') !!}',
                data:{
                    from:'{!! request('from') !!}',
                    to:'{!! request('to') !!}',
                    status:'{!! $status !!}',
                }
            },
            columns: [
                { data: 'id', name: 'id', },
                { data: 'to_date', name: 'to_date' },
                { data: 'user_id', name: 'user_id' },
                { data: 'receiver', name: 'receiver' },
                { data: 'status', name: 'status' },
                { data: 'payment_method', name: 'payment_method' },
                { data: 'phone', name: 'phone' },
                { data: 'expedition_price', name: 'expedition_price' },
                { data: 'address', name: 'address' },
                { data: 'postcode', name: 'postcode' },
                { data: 'products', name: 'products' },
                { data: 'qty', name: 'qty' },
                { data: 'total', name: 'total' },
                { data: 'message', name: 'message' },
                // { data: 'note', name: 'note' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 1,2,3,5,6,7,8,9,11,13,14 ]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                        columns: [ 1,2,3,5,6,7,8,9,11,13,14 ]
                    }
                }
            ]
    });
</script>
@endsection
