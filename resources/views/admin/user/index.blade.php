@extends('layouts.admin.admin')
@section('title', 'Pengguna')
@section('toolbar')
    @php
        $items = ['<a href="'.route('user.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Tambah Pengguna</a>'];
    @endphp
    <x-toolbar :title="'List Pengguna'" :items="$items"></x-toolbar>
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
                        <th class="min-w-125px">Nama</th>
                        <th class="min-w-125px">Email</th>
                        <th class="min-w-125px">Role</th>
                        <th class="min-w-125px">No. HP</th>
                        <th class="min-w-125px">Alamat</th>
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
    let table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '{!! route('user.data') !!}',
            data:{
                role_id:@json(request('role_id'))
            }
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'role_id', name: 'role_id' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection
