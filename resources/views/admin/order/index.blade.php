@extends('layouts.admin.admin')
@section('title', 'Management Order')
@section('toolbar')
    @php
        $items = [''];
    @endphp
    <x-toolbar :title="'List Order'" :items="$items"></x-toolbar>
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
                        <th class="min-w-125px">Nama Customer</th>
                        <th class="min-w-125px">No. HP</th>
                        <th class="min-w-125px">Alamat</th>
                        <th class="min-w-125px">Pesan</th>
                        {{-- <th class="min-w-125px">Status</th> --}}
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
        ajax: '{!! route('order.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'customers.name' },
            { data: 'phone', name: 'customers.phone' },
            { data: 'address', name: 'customers.address' },
            { data: 'message', name: 'message' },
            // { data: 'status', name: 'status' },
        ],
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
@endsection
