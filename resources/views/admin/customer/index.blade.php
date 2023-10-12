@extends('layouts.admin.admin')
@section('title', 'Management Customer')
@section('toolbar')
    @php
        $items = ['<a href="'.route('customer.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Create</a>'];
    @endphp
    <x-toolbar :title="'List Customer'" :items="$items"></x-toolbar>
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
                                <th class="min-w-125px">Ip_address</th>
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="min-w-125px">Address</th>
                        <th class="min-w-125px">Action</th>
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
        ajax: '{!! route('customer.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'ip_address', name: 'ip_address' },
            { data: 'name', name: 'name' },
            { data: 'phone', name: 'phone' },
            { data: 'address', name: 'address' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'excel', 'pdf'
        ]
    });
</script>
@endsection
