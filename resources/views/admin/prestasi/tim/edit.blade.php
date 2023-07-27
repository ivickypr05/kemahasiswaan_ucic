@extends('layouts-admin.app')
@section('title', 'UCIC | Edit Prestasi Tim')
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
                        <li class="breadcrumb-item">Prestasi Tim</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Edit Prestasi Tim</li>

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
                    <h3 class="card-title text-white">Edit Prestasi Tim</h3>
                </div>
                <form action="{{ route('prestasi-tim-update', $pretim->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">

                        @include('components.form-message')

                        <div class="form-group mb-3">
                            <label for="name">Judul Prestasi</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" placeholder="Enter " value="{{ $pretim->title }}">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 1 (Wajib)</label>
                            <input type="text" class="form-control @error('nama_1') is-invalid @enderror" id="nama_1"
                                name="nama_1" placeholder="Enter " value="{{ $pretim->nama_1 }}">

                            @error('nama_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 2 (Wajib)</label>
                            <input type="text" class="form-control @error('nama_2') is-invalid @enderror" id="nama_2"
                                name="nama_2" placeholder="Enter " value="{{ $pretim->nama_2 }}">

                            @error('nama_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 3 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_3') is-invalid @enderror" id="nama_3"
                                name="nama_3" placeholder="Enter " value="{{ $pretim->nama_3 }}">

                            @error('nama_3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 4 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_4') is-invalid @enderror" id="nama_4"
                                name="nama_4" placeholder="Enter " value="{{ $pretim->nama_4 }}">

                            @error('nama_4')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 5 (Opsional : Hapus apabila tidak ingin diisi) </label>
                            <input type="text" class="form-control @error('nama_5') is-invalid @enderror" id="nama_5"
                                name="nama_5" placeholder="Enter " value="{{ $pretim->nama_5 }}">

                            @error('nama_5')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 6 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_6') is-invalid @enderror" id="nama_6"
                                name="nama_6" placeholder="Enter " value="{{ $pretim->nama_6 }}">

                            @error('nama_6')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 7 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_7') is-invalid @enderror" id="nama_7"
                                name="nama_7" placeholder="Enter " value="{{ $pretim->nama_7 }}">

                            @error('nama_7')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 8 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_8') is-invalid @enderror"
                                id="nama_8" name="nama_8" placeholder="Enter " value="{{ $pretim->nama_8 }}">

                            @error('nama_8')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 9 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_9') is-invalid @enderror"
                                id="nama_9" name="nama_9" placeholder="Enter " value="{{ $pretim->nama_9 }}">

                            @error('nama_9')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 10 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_10') is-invalid @enderror"
                                id="nama_10" name="nama_10" placeholder="Enter " value="{{ $pretim->nama_10 }}">

                            @error('nama_10')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Peserta 11 (Opsional : Hapus apabila tidak ingin diisi)</label>
                            <input type="text" class="form-control @error('nama_11') is-invalid @enderror"
                                id="nama_11" name="nama_11" placeholder="Enter " value="{{ $pretim->nama_11 }}">

                            @error('nama_11')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Tingkat Kejuaraan (contoh : Kota/Provinsi/Nasional/Internasional)</label>
                            <input type="text" class="form-control @error('tingkat_kejuaraan') is-invalid @enderror"
                                id="tingkat_kejuaraan" name="tingkat_kejuaraan" placeholder="Enter "
                                value="{{ $pretim->tingkat_kejuaraan }}">

                            @error('tingkat_kejuaraan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="name">Foto 1 (Wajib)</label>
                            @if ($pretim->gambar_1)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-tim" src="{{ url('storage/' . $pretim->gambar_1) }}"
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
                            @if ($pretim->gambar_2)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-tim" src="{{ url('storage/' . $pretim->gambar_2) }}"
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
                            @if ($pretim->gambar_3)
                                <div class="mb-3">
                                    <img id="gambar_prestasi-tim" src="{{ url('storage/' . $pretim->gambar_3) }}"
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
                                cols="50">{{ $pretim->deskripsi }}</textarea>

                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Tanggal Juara</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                id="tanggal" name="tanggal" value="{{ $pretim->tanggal }}" placeholder="Enter ">

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
                                        {{ $pretim->category_id == $item->id ? 'selected' : '' }}>
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
