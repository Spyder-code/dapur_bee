@extends('layouts.admin.admin')
@section('title', 'Management TransactionDetail')
@section('toolbar')
    @php
        $items = ['<a href="'.route('transactiondetail.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Create</a>'];
    @endphp
    <x-toolbar :title="'List TransactionDetail'" :items="$items"></x-toolbar>
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
                                <th class="min-w-125px">User_id</th>
                                <th class="min-w-125px">Product_id</th>
                                <th class="min-w-125px">Note</th>
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
        ajax: '{!! route('transactiondetail.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user_id', name: 'user_id' },
            { data: 'product_id', name: 'product_id' },
            { data: 'note', name: 'note' },
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