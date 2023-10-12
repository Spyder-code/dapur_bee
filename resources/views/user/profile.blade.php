@extends('layouts.user.user')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="text-end">
                            <button class="btn btn-sm btn-primary py-1 text-end" id="btn-edit" onclick="edit()">Edit</button>
                            <button class="btn btn-sm btn-warning py-1 text-end text-white" id="btn-profile" onclick="profile()">Kembali ke Profile</button>
                        </div>
                        <div class="row" id="profile">
                            <div class="col-4">
                                <img src="{{ asset(Auth::user()->avatar) }}" alt="Profile" class="img-fluid" style="height: 120px">
                            </div>
                            <div class="col-8">
                                <table>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: {{ Auth::user()->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: {{ Auth::user()->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td>: {{ Auth::user()->phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: {{ Auth::user()->address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <form action="{{ route('page.user.update',Auth::user()) }}" method="post" id="edit" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row py-3">
                                <div class="col-4 mb-2">
                                    <label for="name">Nama</label>
                                    <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="form-control shadow-none">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" value="{{ Auth::user()->email }}" disabled class="form-control shadow-none">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="phone">No. HP</label>
                                    <input type="text" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}" class="form-control shadow-none">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="address">Alamat</label>
                                    <input type="text" name="address" id="address" value="{{ Auth::user()->address ?? '' }}" class="form-control shadow-none">
                                </div>
                                <div class="col-4 mb-2">
                                    <label for="avatar">Foto</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control shadow-none">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success btn-sm w-100" type="submit">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    const printInvoice = (invoice)=>{
        let url = @json(url('invoice'))+'?invoice='+invoice;
        let params_ = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=800,height=500,left=100,top=100`;
        open(url, 'Cetak INVOICE', params_);
    }


    $('#btn-profile').hide();
    $('#edit').hide();

    function edit() {
        $('#btn-edit').hide();
        $('#profile').hide();
        $('#btn-profile').show();
        $('#edit').show();
    }

    function profile() {
        $('#btn-edit').show();
        $('#profile').show();
        $('#btn-profile').hide();
        $('#edit').hide();
    }
</script>
@endpush
