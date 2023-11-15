@extends('layouts.admin.admin')
@section('title', 'Kategori Produk')
@section('content')
<div class="container mt-4">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-4">
                <div class="d-flex justify-content-between">
                    <h4>List Kategori</h4>
                    <a href="{{route('product-category.create')}}" data-theme="light" class="btn btn-sm btn-success">Tambah Kategori</a>
                </div>
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
            responsive: true,
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
