@extends('layouts.admin.admin')
@section('title', 'Management ProductFile')
@section('toolbar')
    @php
        $items = ['<a href="'.route('productfile.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Create</a>'];
    @endphp
    <x-toolbar :title="'List ProductFile'" :items="$items"></x-toolbar>
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
                                <th class="min-w-125px">Filename</th>
                                <th class="min-w-125px">Path</th>
                                <th class="min-w-125px">Mime</th>
                                <th class="min-w-125px">Size</th>
                                <th class="min-w-125px">Product_id</th>
                                <th class="min-w-125px">Order</th>
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
        ajax: '{!! route('productfile.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'filename', name: 'filename' },
            { data: 'path', name: 'path' },
            { data: 'mime', name: 'mime' },
            { data: 'size', name: 'size' },
            { data: 'product_id', name: 'product_id' },
            { data: 'order', name: 'order' },
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