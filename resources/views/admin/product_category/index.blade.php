@extends('layouts.admin.admin')
@section('title', 'Kategori Produk')
@section('toolbar')
    @php
        $items = ['<a href="'.route('product-category.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Tambah Kategori</a>'];
    @endphp
    <x-toolbar :title="'List Kategori'" :items="$items"></x-toolbar>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="card">
        <div class="card-body py-4">
            <x-message></x-message>
            <table class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-125px">ID</th>
                        <th class="min-w-125px">Nama Kategori</th>
                        <th class="min-w-125px">Icon</th>
                        <th class="min-w-125px">Slug</th>
                        <th class="min-w-125px">Deskripsi</th>
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
            ajax: '{!! route('productcategory.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'icon', name: 'icon' },
                { data: 'slug', name: 'slug' },
                { data: 'description', name: 'description' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    } else {
        let table = $('.table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('productcategory.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'icon', name: 'icon' },
                { data: 'slug', name: 'slug' },
                { data: 'description', name: 'description' },
                { data: 'created_by', name: 'created_by' },
                { data: 'updated_by', name: 'updated_by' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            responsive: true,
        });
    }
</script>
@endsection
