@extends('layouts.admin.admin')
@section('title', 'Transaksi')
@section('toolbar')
    @php
        $items = ['<a href="'.route('transaction.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Tambah Transaksi</a>'];
    @endphp
    <x-toolbar :title="'List Transaksi'" :items="[]"></x-toolbar>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="card">
        <div class="card-body py-4">
            <x-message></x-message>
            <div class="row">
                <div class="col-6">
                    <form method="GET" action="{{ route('transaction.index') }}" class="d-flex gap-2">
                        <div>
                            <label>Dari</label>
                            <input type="date" name="from" id="from" class="form-control" value="{{ request('from') }}">
                        </div>
                        <div>
                            <label>Sampai</label>
                            <input type="date" name="to" id="to" class="form-control" value="{{ request('to') }}">
                        </div>
                        <div>
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">
                                <option {{ $status=='all'?'selected':'' }} value="all">Semua</option>
                                <option {{ $status=='process'?'selected':'' }} value="process">Verifikasi</option>
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
                        <th class="min-w-125px">Tgl Pesanan Dibuat</th>
                        <th class="min-w-125px">Pesanan Untuk Tgl</th>
                        <th class="min-w-125px">Pelanggan</th>
                        <th class="min-w-125px">Invoice</th>
                        <th class="min-w-125px">Harga</th>
                        <th class="min-w-125px">Penerima</th>
                        <th class="min-w-125px">Status</th>
                        <th class="min-w-125px">Status Pembayaran</th>
                        <th class="min-w-125px">No. HP</th>
                        <th class="min-w-125px">Ongir</th>
                        <th class="min-w-125px">Alamat</th>
                        <th class="min-w-125px">Kode POS</th>
                        <th class="min-w-125px">Total</th>
                        <th class="min-w-125px">Catatan</th>
                        <th class="min-w-125px">Dibuat Oleh</th>
                        <th class="min-w-125px">Diupdate Oleh</th>
                        <th class="min-w-125px">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    let role_id = @json(Auth::user()->role_id);

    if (role_id==1) {
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
                { data: 'id', name: 'id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'to_date', name: 'to_date' },
                { data: 'user_id', name: 'user_id' },
                { data: 'invoice', name: 'invoice' },
                { data: 'amount', name: 'amount' },
                { data: 'receiver', name: 'receiver' },
                { data: 'status', name: 'status' },
                { data: 'is_paid', name: 'is_paid' },
                { data: 'phone', name: 'phone' },
                { data: 'expedition_price', name: 'expedition_price' },
                { data: 'address', name: 'address' },
                { data: 'postcode', name: 'postcode' },
                { data: 'total', name: 'total' },
                { data: 'message', name: 'message' },
                // { data: 'note', name: 'note' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]
        });

    } else {
        let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
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
                { data: 'id', name: 'id' },
                { data: 'created_at', name: 'created_at' },
                { data: 'to_date', name: 'to_date' },
                { data: 'user_id', name: 'user_id' },
                { data: 'invoice', name: 'invoice' },
                { data: 'amount', name: 'amount' },
                { data: 'receiver', name: 'receiver' },
                { data: 'status', name: 'status' },
                { data: 'is_paid', name: 'is_paid' },
                { data: 'phone', name: 'phone' },
                { data: 'expedition_price', name: 'expedition_price' },
                { data: 'address', name: 'address' },
                { data: 'postcode', name: 'postcode' },
                { data: 'total', name: 'total' },
                { data: 'from', name: 'from' },
                { data: 'to', name: 'to' },
                { data: 'message', name: 'message' },
                { data: 'note', name: 'note' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
        });

    }
</script>
@endsection
