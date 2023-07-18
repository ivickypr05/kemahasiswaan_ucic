@extends('layouts-admin.app')
@section('title', 'UCIC | Edit Prestasi Individu')
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
                        <li class="breadcrumb-item">Prestasi</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Prestasi Individu</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Edit Prestasi Individu</li>

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
                    <h3 class="card-title text-white">User Edit</h3>
                </div>
                <form action="{{ route('prestasi-individu-update', $preindividu->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        @include('components.form-message')

                        <div class="form-group mb-3">
                            <label for="name">Judul Prestasi</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Enter " value="{{ $preindividu->title }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Enter " value="{{ $preindividu->nama }}">

                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tingkat Kejuaraan (contoh : Kota/Provinsi/Nasional/Internasional)</label>
                            <input type="text" class="form-control @error('tingkat_kejuaraan') is-invalid @enderror"
                                id="tingkat_kejuaraan" name="tingkat_kejuaraan" placeholder="Enter "
                                value="{{ $preindividu->tingkat_kejuaraan }}">

                            @error('tingkat_kejuaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="name">Foto 1 (Wajib)</label>
                            @if ($preindividu->gambar_1)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-individu" src="{{ url('storage/' . $preindividu->gambar_1) }}"
                                        width="110px" alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar_1') is-invalid @enderror"
                                id="gambar_1" name="gambar_1" value="" placeholder="Enter ">

                            @error('gambar_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Foto 2 (Opsional)</label>
                            @if ($preindividu->gambar_2)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-individu" src="{{ url('storage/' . $preindividu->gambar_2) }}"
                                        width="110px" alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar_2') is-invalid @enderror"
                                id="gambar_2" name="gambar_2" value="" placeholder="Enter ">

                            @error('gambar_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Foto 3 (Opsional)</label>
                            @if ($preindividu->gambar_3)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-individu" src="{{ url('storage/' . $preindividu->gambar_3) }}"
                                        width="110px" alt="">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('gambar_3') is-invalid @enderror"
                                id="gambar_3" name="gambar_3" value="" placeholder="Enter ">

                            @error('gambar_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="name">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="4"
                                cols="50">{{ $preindividu->deskripsi }}</textarea>

                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Tanggal Juara</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal" value="{{ $preindividu->tanggal }}" placeholder="Enter ">

                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="select" class="form-label">Pilih Kategori Untuk Prestasi</label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                aria-label="Default select example" name="category_id">
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $preindividu->category_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
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
