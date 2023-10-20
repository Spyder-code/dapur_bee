@extends('layouts.admin.admin')
@section('toolbar')
    <x-toolbar :title="'Tambah Transaksi'"></x-toolbar>
@endsection
@section('content')
<div class="content flex-row-fluid" id="kt_content">
    <div class="card">
        <div class="card-body py-2">
            <div class="my-2">
                <x-message></x-message>
            </div>
            <livewire:transaction-create/>
        </div>
    </div>
</div>
@endsection
