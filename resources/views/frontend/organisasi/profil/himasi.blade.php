@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi HIMASI')
@section('style-fe')
    <style>
        .square-image {
            max-width: 80%;
            max-height: 80%;
            object-position: center center;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container" style="padding-top: 10%!important;">
        <div class="d-flex justify-content-end mb-5">
            <p class="text-muted">
                Organisasi Kemahasiswaan / HIMA / Profil Organisasi HIMASI
            </p>
        </div>
        <div class="d-flex justify-content-center">
            <h1><strong>Profil Organisasi HIMASI</strong></h1>
        </div>
        <div class="d-flex justify-content-center mt-3 mb-5">
            <a href="{{ route('organisasi-hima') }}"
                class="btn btn-transparent btn-outline-primary border-1 rounded rounded-pill">Kegiatan Organisasi HIMA</a>
        </div>
    </div>
    <section id="about" class="about mb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="square-image">
                    <img src="{{ asset('img/himasi.png') }}" width="300px">
                </div>
            </div>
            <hr>
            <h5 class="right-aligned-paragraph">HIMASI (Himpunan Mahasiswa Sistem Informasi) adalah organisasi mahasiswa
                yang
                berfokus pada bidang studi Sistem Informasi. HIMASI adalah singkatan dari "Himpunan Mahasiswa Sistem
                Informasi" dan umumnya berada di lingkungan perguruan tinggi atau universitas yang menawarkan program studi
                Sistem Informasi.
                Tujuan utama HIMASI adalah untuk menyatukan dan mewakili mahasiswa yang belajar di bidang Sistem Informasi.
                Organisasi ini bertujuan untuk meningkatkan hubungan antara sesama mahasiswa, fakultas, dan pihak luar
                seperti perusahaan atau industri yang berkaitan dengan bidang Sistem Informasi.</h5>
            <div class="mt-5">
                <h6><strong>about me</strong></h6>
                <a href="https://www.instagram.com/bkmucic/" class="btn btn-light border border-2"><i
                        class="bx bxl-instagram" style="border-radius: 8px" style="color: rgb(0, 0, 0)"></i></a>
            </div>
        </div>
        <br><br><br><br>
    </section><!-- End About Section -->
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
