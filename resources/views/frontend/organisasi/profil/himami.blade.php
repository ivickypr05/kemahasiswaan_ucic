@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi HIMAMI')
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
    <div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
        <h1>Profil Organisasi HIMAMI</h1>
    </div>
    <section id="about" class="about mb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="square-image">
                    <img src="{{ asset('img/himami.jpg') }}" width="250px">
                </div>
            </div>
            <hr>
            <h5 class="right-aligned-paragraph">Organisasi ini bernama Himpunan Mahasiswa Manajemen Informatika Keluarga
                Besar
                Mahasiswa Universitas CIC Cirebon disingkat HIMA MI. HIMA MI berkedudukan di program studi Manajemen
                Informatika Univeristas CIC Cirebon. HIMA MI didirikan di Universitas CIC pada tanggal 23 Januari 2021 untuk
                batas waktu yang
                tidak ditentukan. bertujuan membentuk mahasiswa yang berwawasan luas, mandiri dan profesional di bidangnya
                HIMA MI adalah Organisasi Mahasiswa program studi D3 Manajemen Informatika Universitas HIMA MI merupakan
                wadah aktivitas dan aspirasi mahasiswa program studi Manajemen
                Informatika berdasarkan atas keimanan, keahlian,kekeluarga.</h5>
            <div class="mt-5">
                <h6><strong>About me</strong></h6>
                <a href="https://www.instagram.com/himami_ucic/" class="btn btn-light border border-2"><i
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
