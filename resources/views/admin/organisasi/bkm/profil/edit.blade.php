@extends('layouts-admin.app')
@section('title', 'UCIC | Edit Profil BKM')
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
                        <li class="breadcrumb-item">Edit BKM</li>

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
                    <h3 class="card-title text-white">Edit Profil BKM</h3>
                </div>
                <form action="{{ route('profil-bkm-update', $profilbkm->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        @include('components.form-message')
                        <div class="form-group mb-3">
                            <label for="name">Logo BKM (JPEG, PNG, JPG)</label>
                            @if ($profilbkm->logo)
                                <div class="mb-3">
                                    <img id="gambar_logo" src="{{ url('storage/' . $profilbkm->logo) }}" width="110px"
                                        alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo"
                                name="logo" value="" placeholder="Enter ">

                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Gambar Struktur BKM (JPEG, PNG, JPG)</label>
                            @if ($profilbkm->struktur_bkm)
                                <div class="mb-3">
                                    <img id="gambar_struktur_bkm" src="{{ url('storage/' . $profilbkm->struktur_bkm) }}"
                                        width="110px" alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('struktur_bkm') is-invalid @enderror"
                                id="struktur_bkm" name="struktur_bkm" value="" placeholder="Enter ">

                            @error('struktur_bkm')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4" cols="50">{{ $profilbkm->deskripsi }}</textarea>

                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="border-radius:0px 0px 10px 10px; background-color: #1C3F94;">
                        <button type="submit" class="btn btn-success btn-footer">Save</button>
                        <a href="javascript:void(0);" onclick="history.back();"
                            class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

@section('script')

@endsection
