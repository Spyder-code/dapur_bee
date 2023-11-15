@extends('layouts.admin.admin')
@section('toolbar')
    <x-toolbar :title="'Edit Setting'"></x-toolbar>
@endsection
@section('content')
<div class="container mt-4">
    <div class="content flex-row-fluid" id="kt_content">
        <div class="card">
            <div class="card-body py-2">
                <form method="POST" class="form" novalidate action="{{ route('setting.update', $setting) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        @include('admin.setting.form',['setting'=>$setting])
                    </div>
                    <input type="hidden" name="id" value="{{ $setting->id }}">
                    <div class="d-flex justify-content-end gap-2">
                        {{-- <a href="{{ route('setting.index') }}" data-theme="light" class="btn btn-bg-secondary btn-active-color-primary">Back</a> --}}
                        <button type="submit" class="btn btn-success btn-md">
                            <span class="indicator-label">Save</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
