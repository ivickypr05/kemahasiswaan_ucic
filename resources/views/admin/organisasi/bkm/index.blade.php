@extends('layouts-admin.app')
@section('title', 'UCIC | List Kegiatan BKM')
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
                        <li class="breadcrumb-item">List BKM</li>

                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="border-radius:10px 10px 0px 0px; background-color: #1C3F94;">
                    <div class="row">
                        <div class="col-6 mt-1">
                            <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
                                <i class="far fa-user text-lg"></i>
                                List Kegiatan Organisasi BKM
                            </span>
                        </div>

                        <div class="col-6 d-flex justify-content-end">
                            <a href="{{ route('bkm-create') }}" class="btn btn-md btn-info">
                                <i class="fa fa-plus"></i>
                                Add New
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            @include('sweetalert::alert')
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table id="example" class="table table-hover table-bordered dt-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Kegiatan</th>
                                <th>Gambar Kegiatan</th>
                                <th>Deskripsi Kegiatan</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bkm as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $item->nama_kegiatan }}</th>
                                    <th>
                                        <img src="{{ asset('storage/' . $item->gambar) }}" width="110px">
                                    </th>
                                    <th>{{ Str::limit($item->deskripsi, 100) }}</th>
                                    <th>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }} -
                                        {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }} </th>
                                    <th>
                                        <div class="btn-group">
                                            <a href="{{ route('bkm-edit', $item->id) }}" class="btn btn-warning text-white">
                                                <i class="far fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="{{ route('bkm-destroy', $item->id) }}" class="btn btn-danger f-12">
                                                <i class="far fa-trash-alt"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </th>
                                    <th>
                                        @if ($item->status === 0)
                                            Menunggu
                                        @elseif ($item->status === 1)
                                            Diterima
                                        @endif
                                    </th>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#example').dataTable();
    </script>
@endsection
