@extends('layouts.admin.admin')
@section('title', 'Keranjang')
@section('content')
<div class="container mt-4">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-4">
                <div class="d-flex justify-content-between">
                    <h4>List Keranjang</h4>
                    {{-- <a href="{{route('product-category.create')}}" data-theme="light" class="btn btn-sm btn-success">Tambah Produk</a> --}}
                </div>
                <x-message></x-message>
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">ID</th>
                            <th class="min-w-125px">Nama Pelanggan</th>
                            <th class="min-w-125px">No. HP</th>
                            <th class="min-w-125px">Alamat</th>
                            <th class="min-w-125px">Produk</th>
                            <th class="min-w-125px">Catatan</th>
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
            ajax: '{!! route('cart.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'customers.name' },
                { data: 'phone', name: 'customers.phone' },
                { data: 'address', name: 'customers.address' },
                { data: 'product', name: 'products.name' },
                { data: 'note', name: 'note' },
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
            ajax: '{!! route('cart.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'customers.name' },
                { data: 'phone', name: 'customers.phone' },
                { data: 'address', name: 'customers.address' },
                { data: 'product', name: 'products.name' },
                { data: 'note', name: 'note' },
            ],
            responsive: true,
        });
    }
</script>
@endsection
