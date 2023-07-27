@extends('layouts-admin.app')
@section('title', 'UCIC | Tambah Struktur BKM')
@section('style')

@endsection

@section('breadcumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $breadcumb ?? '' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Organisasi</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">BKM</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Add Struktur BKM</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header text-center" style="border-radius:10px 10px 0px 0px; background-color: #1C3F94;">
                    <h3 class="card-title text-white">Add Struktur BKM</h3>
                </div>

                <form action="{{ route('struktur-bkm-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.form-message')

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name">Gambar Struktur BKM (JPEG, PNG, JPG)</label>
                            <input type="file" class="form-control @error('struktur_bkm') is-invalid @enderror"
                                id="struktur_bkm" name="struktur_bkm" value="{{ old('struktur_bkm') }}"
                                placeholder="Masukkan struktur_bkm">

                            @error('struktur_bkm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="border-radius:0px 0px 10px 10px; background-color: #1C3F94;">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ route('struktur-bkm-list') }}" class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
