@extends('layouts.admin.admin')
@section('title', 'Management Setting')
@section('toolbar')
    @php
        $items = ['<a href="'.route('setting.create').'" data-theme="light" class="btn btn-bg-white btn-active-color-primary">Create</a>'];
    @endphp
    <x-toolbar :title="'List Setting'" :items="$items"></x-toolbar>
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
                                <th class="min-w-125px">Facebook</th>
                                <th class="min-w-125px">Twitter</th>
                                <th class="min-w-125px">Instagram</th>
                                <th class="min-w-125px">Youtube</th>
                                <th class="min-w-125px">Whatsapp</th>
                                <th class="min-w-125px">Province_id</th>
                                <th class="min-w-125px">City_id</th>
                                <th class="min-w-125px">District_id</th>
                                <th class="min-w-125px">Midtrans_client_key</th>
                                <th class="min-w-125px">Midtrans_server_key</th>
                                <th class="min-w-125px">Raja_ongkit_key</th>
                                <th class="min-w-125px">Raja_ongkir_tipe</th>
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
        ajax: '{!! route('setting.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'facebook', name: 'facebook' },
            { data: 'twitter', name: 'twitter' },
            { data: 'instagram', name: 'instagram' },
            { data: 'youtube', name: 'youtube' },
            { data: 'whatsapp', name: 'whatsapp' },
            { data: 'province_id', name: 'province_id' },
            { data: 'city_id', name: 'city_id' },
            { data: 'district_id', name: 'district_id' },
            { data: 'midtrans_client_key', name: 'midtrans_client_key' },
            { data: 'midtrans_server_key', name: 'midtrans_server_key' },
            { data: 'raja_ongkit_key', name: 'raja_ongkit_key' },
            { data: 'raja_ongkir_tipe', name: 'raja_ongkir_tipe' },
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