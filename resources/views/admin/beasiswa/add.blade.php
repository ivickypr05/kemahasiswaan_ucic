@extends('layouts-admin.app')
@section('title', 'UCIC | Tambah Data Beasiswa')
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
                        <li class="breadcrumb-item">Beasiswa</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Add Beasiswa</li>
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
                    <h3 class="card-title text-white">Add User</h3>
                </div>

                <form action="{{ route('beasiswa-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('components.form-message')


                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="name">Gambar</label>
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar" value="{{ old('gambar') }}" placeholder="Enter ">

                            @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" placeholder="Enter ">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="4" cols="50"></textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Dari Tanggal</label>
                            <input type="date" class="form-control @error('dari_tanggal') is-invalid @enderror"
                                id="dari_tanggal" name="dari_tanggal" value="{{ old('dari_tanggal') }}"
                                placeholder="Enter ">

                            @error('dari_tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Sampai Tanggal</label>
                            <input type="date" class="form-control @error('sampai_tanggal') is-invalid @enderror"
                                id="sampai_tanggal" name="sampai_tanggal" value="{{ old('sampai_tanggal') }}"
                                placeholder="Enter ">

                            @error('sampai_tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer" style="border-radius:0px 0px 10px 10px; background-color: #1C3F94;">
                        <button type="submit" class="btn btn-success btn-footer">Add</button>
                        <a href="{{ route('beasiswa-list') }}" class="btn btn-secondary btn-footer">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
