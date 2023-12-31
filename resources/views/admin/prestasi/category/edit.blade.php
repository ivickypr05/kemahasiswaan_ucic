@extends('layouts-admin.app')
@section('title', 'UCIC | Edit Kategori Prestasi')
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
                        <li class="breadcrumb-item">Kategori Prestasi</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Edit Kategori Prestasi</li>

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
                    <h3 class="card-title text-white">Edit Kategori</h3>
                </div>
                <form method="POST" action="{{ route('category-update', $category->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        @include('components.form-message')

                        <div class="form-group mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                name="nama" placeholder="Enter " value="{{ $category->nama }}">

                            @error('nama')
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
