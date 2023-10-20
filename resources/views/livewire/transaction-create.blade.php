<div>
    <form method="POST" class="form" novalidate action="{{ route('transaction.store') }}">
        @csrf
        <input type="hidden" name="data" value="{{ json_encode($carts) }}">
        <input type="hidden" name="total" value="{{ $total }}">
        <input type="hidden" name="payout" value="{{ $payout }}">
        <div class="row">
            <div class="col-12">
                <div class="card p-1 shadow-lg mt-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Cari produk" wire:model="search" wire:keyup="searching">
                </div>
                @if (count($search_list)>0)
                <div class="card p-5 shadow-lg mt-3">
                    <table class="table-sm table w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($search_list as $item)
                            <tr>
                                <td><img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="img-fluid" style="height: 60px"></td>
                                <td>{{ $item->name }}</td>
                                <td>Rp. {{ number_format($item->price) }}</td>
                                <td><button type="button" class="btn btn-sm btn-success" wire:click="addCart({{ $item->id }})">Tambah</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <div class="col-12">
                <div class="card p-5 shadow-lg mt-3">
                    <div class="row">
                        <div class="col-7">
                            <b>List Keranjang</b>
                            <hr>
                            <table class="table-sm table w-100">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th style="width: 100px">Jumlah</th>
                                        <th style="width: 100px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($carts)>0)
                                        @foreach ($carts as $idx => $item)
                                        <tr>
                                            <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="img-fluid" style="height: 60px"></td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>Rp. {{ number_format($item['price']) }}</td>
                                            <td>
                                                {{ $item['jumlah'] }}
                                                <div class="d-flex">
                                                    <button type="button" wire:click="addJumlah({{ $idx }})" style="border: none;" class="text-white bg-success"><i class="fas fa-plus text-white"></i></button>
                                                    <button type="button" wire:click="subJumlah({{ $idx }})" style="border: none;" class="text-white bg-danger"><i class="fas fa-minus text-white"></i></button>
                                                </div>
                                            </td>
                                            <td><button type="button" wire:click="deleteCart({{ $idx }})" style="border: none;" class="text-white bg-danger"><i class="fas fa-trash text-white"></i></button></td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="col-5">
                            <b>Informasi Pesanan</b>
                            <hr>
                            {{-- <div class="d-flex gap-2 mb-4">
                                <button type="button" wire:click="changeIsNow(1)" class="w-100 btn btn-sm {{ $is_now ? 'btn-info' : 'btn-light border text-info border-info' }} ">Pesan Langsung</button>
                                <button type="button" wire:click="changeIsNow(0)" class="w-100 btn btn-sm {{ !$is_now ? 'btn-info' : 'btn-light border text-info border-info' }} ">Pesan Order</button>
                            </div> --}}
                            @if ($is_now)
                                <input type="hidden" name="tipe" value="is_now">
                                <div class="mb-2">
                                    <input type="text" name="receiver" id="receiver" class="form-control form-control-sm" placeholder="Nama customer">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="phone" id="phone" class="form-control form-control-sm" placeholder="Nomor HP">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="address" id="address" class="form-control form-control-sm" placeholder="Alamat">
                                </div>
                                <div class="mb-2">
                                    <label for="total">Total Harga</label>
                                    <input type="text" class="form-control form-control-sm" disabled wire:model="total_text">
                                </div>
                                <div class="mb-2">
                                    <label for="total">Uang Diterima</label>
                                    <input type="number" name="received" id="received" class="form-control form-control-sm" onclick="this.select()" wire:model="received" wire:keyup="rec" required>
                                </div>
                                <div class="mb-2">
                                    <label for="total">Uang Kembalian</label>
                                    <input type="text" class="form-control form-control-sm" wire:model="payout_text" readonly>
                                </div>
                            @else
                                {{-- <input type="hidden" name="tipe" value="order">
                                <div class="mb-2">
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Penerima">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Nomor HP">
                                </div>
                                <div class="mb-2">
                                    <input type="number" name="customer" id="customer" class="form-control form-control-sm" placeholder="Jarak Pengiriman ke Tujuan /Km">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Alamat">
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Kode POS">
                                </div>
                                <div class="mb-2">
                                    <label for="to_date">Pesanan untuk tanggal</label>
                                    <input type="datetime-local" name="customer" id="customer" class="form-control form-control-sm">
                                </div>
                                <div class="mb-2">
                                    <label for="note">Catatan</label>
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" placeholder="Catatan">
                                </div>
                                <div class="mb-2">
                                    <label for="total">Total Harga</label>
                                    <input type="text" name="customer" id="customer" class="form-control form-control-sm" disabled wire:model="total_text">
                                </div> --}}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('transaction.index') }}" data-theme="light" class="btn btn-bg-secondary btn-active-color-primary">Back</a>
            <button type="submit" class="btn btn-primary">
                <span class="indicator-label">Save</span>
            </button>
        </div>
    </form>
</div>
