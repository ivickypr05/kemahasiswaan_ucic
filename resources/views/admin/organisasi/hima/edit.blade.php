@extends('layouts-admin.app')
@section('title', 'UCIC | Edit Kegiatan Hima')
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
                        <li class="breadcrumb-item">HIMA</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Edit HIMA</li>

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
                    <h3 class="card-title text-white">Edit Data HIMA</h3>
                </div>
                <form action="{{ route('hima-update', $hima->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        @include('components.form-message')

                        <div class="form-group mb-3">
                            <label for="name">Judul Kegiatan</label>
                            <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                id="nama_kegiatan" name="nama_kegiatan" placeholder="Enter "
                                value="{{ $hima->nama_kegiatan }}">

                            @error('nama_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Nama Himpunan (contoh : HIMATIF / HIMASI)</label>
                            <input type="text" class="form-control @error('nama_himpunan') is-invalid @enderror"
                                id="nama_himpunan" name="nama_himpunan" placeholder="Enter "
                                value="{{ $hima->nama_himpunan }}">

                            @error('nama_himpunan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Gambar Kegiatan</label>
                            @if ($hima->gambar)
                                <div class="mb-3">
                                    <img id="hima_gambar" src="{{ url('storage/' . $hima->gambar) }}" width="110px"
                                        alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar" value="" placeholder="Enter ">

                            @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4" cols="50">{{ $hima->deskripsi }}</textarea>

                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Dari Tanggal</label>
                            <input type="date" class="form-control @error('mulai_tanggal') is-invalid @enderror"
                                id="mulai_tanggal" name="mulai_tanggal" value="{{ $hima->mulai_tanggal }}"
                                placeholder="Enter ">

                            @error('mulai_tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Sampai Tanggal</label>
                            <input type="date" class="form-control @error('akhir_tanggal') is-invalid @enderror"
                                id="akhir_tanggal" name="akhir_tanggal" value="{{ $hima->akhir_tanggal }}"
                                placeholder="Enter ">

                            @error('akhir_tanggal')
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
