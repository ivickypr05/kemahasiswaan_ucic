@extends('layouts-admin.app')
@section('title', 'UCIC | Dashboard Admin')
@section('style')
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/bootstrap-datepicker3.min.css') }}">

    <style>
        @use postcss-color-function;
        @use postcss-nested;
        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700,900');

        <style>.master-data {
            cursor: pointer;
        }

        .master-data:hover {
            box-shadow: 0px 0px 33px -14px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: 0px 0px 33px -14px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 0px 0px 33px -14px rgba(0, 0, 0, 0.75);
            border-right: 4px solid rgb(0, 98, 128);
            ";

        }

        .info-box {
            box-shadow: 0 1px 2px rgba(3, 53, 192, 0.125), 0 1px 3px rgba(19, 31, 207, 0.2);
            border-radius: 0.50rem;
            background-color: #ffffff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            position: relative;
            width: 100%;
            color: #ffffff;
            /* Warna teks menjadi biru */
        }

        .info-box .info-box-icon {
            border-radius: 0.50rem 0 0 0.50rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }

        .info-box .info-box-icon>img {
            max-width: 100%;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 15px;
        }

        .info-box .info-box-text {
            color: #1733cfe8;
            font-size: 15px;
            /* Misalnya, ganti ukuran font sesuai keinginan Anda */
            font-weight: bold;
            /* Membuat teks menjadi tebal */
        }

        .info-box .info-box-number {
            color: #1733cfe8;
            font-size: 15px;
            /* Misalnya, ganti ukuran font sesuai keinginan Anda */
            font-weight: bold;
            /* Membuat teks menjadi tebal */
        }
    </style>
@endsection

@section('breadcumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $breadcumb ?? '' }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">home</li>
                        <li class="breadcrumb-item">/</li>
                        <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">{{ $breadcumb ?? '' }}</a>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row mt-4">
        <!-- Info-box untuk Jumlah Beasiswa -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-primary">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Beasiswa</span>
                    <span class="info-box-number">{{ $beasiswa }}</span>
                </div>
            </div>
        </div>

        <!-- Info-box untuk Jumlah Simbelmawa -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-success">
                    <i class="fas fa-book"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Simbelmawa</span>
                    <span class="info-box-number">{{ $simbelmawa }}</span>
                </div>
            </div>
        </div>

        <!-- Info-box untuk Jumlah Prestasi -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-warning">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Prestasi</span>
                    <span class="info-box-number">{{ $prestasi }}</span>
                </div>
            </div>
        </div>
        <div class="mt-3"></div>
        <!-- Info-box untuk Jumlah Kegiatan Organisasi -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-info">
                    <i class="fas fa-users"></i> <!-- Ganti ikon dengan yang sesuai -->
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Kegiatan Organisasi</span>
                    <span class="info-box-number">{{ $kegiatan }}</span>
                </div>
            </div>
        </div>

        <!-- Info-box untuk Jumlah Pengguna -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-danger">
                    <i class="fas fa-newspaper"></i> <!-- Ganti ikon dengan yang sesuai -->
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Berita</span>
                    <span class="info-box-number">{{ $berita }}</span>
                </div>
            </div>
        </div>

        <!-- Info-box untuk Jumlah Berita -->
        <div class="col-lg-4 col-md-6">
            <div class="info-box master-data">
                <div class="info-box-icon bg-secondary">
                    <i class="fas fa-user"></i> <!-- Ganti ikon dengan yang sesuai -->
                </div>
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Pengguna</span>
                    <span class="info-box-number">{{ $pengguna }}</span>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
@endsection
