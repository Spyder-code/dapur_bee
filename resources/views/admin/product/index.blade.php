@extends('layouts.admin.admin')
@section('title', 'Produk')
@section('content')
<div class="container mt-4">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-4">
                <div class="d-flex justify-content-between">
                    <h4>List Produk</h4>
                    <a href="{{route('product.create')}}" data-theme="light" class="btn btn-sm btn-success">Tambah Produk</a>
                </div>
                <x-message></x-message>
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">ID</th>
                            <th class="min-w-125px">Nama Produk</th>
                            <th class="min-w-125px">Deskripsi</th>
                            <th class="min-w-125px">Harga</th>
                            <th class="min-w-125px">Foto</th>
                            <th class="min-w-125px">Stock</th>
                            <th class="min-w-125px">Dibuat Oleh</th>
                            <th class="min-w-125px">Diupdate Oleh</th>
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
    if (role_id==1) {
        let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('product.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'price', name: 'price' },
                { data: 'image', name: 'image' },
                { data: 'stock', name: 'stock' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'excel', 'pdf'
            ]
        });
    } else {
        let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('product.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'description', name: 'description' },
                { data: 'price', name: 'price' },
                { data: 'image', name: 'image' },
                { data: 'stock', name: 'stock' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            responsive: true,
        });
    }
</script>
@endsection
