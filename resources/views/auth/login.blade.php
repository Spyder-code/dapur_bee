@extends('layouts.user.user')
@section('title', 'Auth | Login')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6">
            <form class="form w-100" novalidate="novalidate" method="post" action="{{ route('login') }}">
                @csrf
                <div class="text-center mb-11">
                    <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                    <div class="text-gray-500 fw-semibold fs-6">Dapur_Bee Account</div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="fv-row mb-8">
                    <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control shadow-none bg-transparent" />
                </div>
                <div class="fv-row mb-3">
                    <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control shadow-none bg-transparent" />
                </div>
                <div class="mb-3 text-end">
                    <a href="{{ route('register') }}">Buat Akun <i class="fal fa-user"></i></a>
                </div>
                <div class="d-grid mb-10">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-success">
                        <span class="indicator-label">Sign In</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
