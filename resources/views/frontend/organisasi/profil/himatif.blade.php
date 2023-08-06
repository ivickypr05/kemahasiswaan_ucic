@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi HIMATIF')
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
        <h1>Profil Organisasi HIMATIF</h1>
    </div>
    <section id="about" class="about mb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="square-image">
                    <img src="{{ asset('img/himatif.jpg') }}" width="300px">
                </div>
            </div>
            <hr>
            <h5 class="right-aligned-paragraph">HIMATIF (Himpunan Mahasiswa Teknik Informatika) adalah sebuah organisasi
                mahasiswa yang mewakili dan menghimpun mahasiswa jurusan Teknik Informatika di Universitas Catur Insan
                Cendekia. HIMATIF bertujuan untuk mempererat hubungan antar-mahasiswa dalam jurusan tersebut, serta menjadi
                wadah untuk berbagai kegiatan akademik, sosial, dan pengembangan diri bagi anggotanya.

                Sebagai organisasi mahasiswa, HIMATIF berperan penting dalam memfasilitasi interaksi dan kolaborasi
                antar-mahasiswa jurusan Teknik Informatika. </h5>
            <div class="mt-5">
                <h6><strong>About me</strong></h6>
                <a href="https://www.instagram.com/himatif_ucic/" class="btn btn-light border border-2"><i
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
