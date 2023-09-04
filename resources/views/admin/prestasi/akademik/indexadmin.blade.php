@extends('layouts-admin.app')
@section('title', 'UCIC | Request Prestasi Akademik')
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
                        <li class="breadcrumb-item">Kelola Konten</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item">Request Prestasi Akademik</li>

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
                        <div class="mt-1">
                            <span class="tx-bold text-lg text-white" style="font-size:1.2rem;">
                                <i class="far fa-user text-lg"></i>
                                List Request Prestasi Akademik
                            </span>
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
                                <th>Judul Prestasi Akademik</th>
                                <th>Nama Peserta</th>
                                <th>Tingkat Kejuaraan</th>
                                <th>Foto 1</th>
                                <th>Foto 2</th>
                                <th>Foto 3</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Kategori Prestasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($preakademik as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <th>{{ $item->title }}</th>
                                    <th>{{ $item->nama }}</th>
                                    <th>{{ $item->tingkat_kejuaraan }}</th>
                                    <th>
                                        <img src="{{ asset('storage/' . $item->gambar_1) }}" width="110px">
                                    </th>
                                    <th>
                                        <img src="{{ asset('storage/' . $item->gambar_2) }}" width="110px">
                                    </th>
                                    <th>
                                        <img src="{{ asset('storage/' . $item->gambar_3) }}" width="110px">
                                    </th>
                                    <th>{{ Str::limit($item->deskripsi, 100) }}</th>
                                    <th>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                    <th>{{ $item->categories->nama }}</th>
                                    <th>
                                        <div class="btn-group">


                                            <form action="{{ route('approve-prestasi-akademik', $item->id) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <button type="submit" class="btn btn-success">terima</button>
                                            </form>
                                            <a href="{{ route('dissapprove-prestasi-akademik', $item->id) }}"
                                                class="btn btn-danger f-12">
                                                Tolak
                                            </a>
                                        </div>
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
