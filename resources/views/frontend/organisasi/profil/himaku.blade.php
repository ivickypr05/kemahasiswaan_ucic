@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi HIMAKU')
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
        <h1>Profil Organisasi HIMAKU</h1>
    </div>
    <section id="about" class="about mb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="square-image">
                    <img src="{{ asset('img/himaku.jpg') }}" width="300px">
                </div>
            </div>
            <hr>
            <h5 class="right-aligned-paragraph">HIMAKU adalah himpunan mahasiswa akuntansi Universitas Catur Insan cendekia.
                Yang merupakan himpunan mahasiswa yang di dirikan di Cirebon pada bulan September tahun 2020.
                HIMAKU, sebagai Himpunan Mahasiswa Akuntansi, memiliki tujuan utama yaitu membentuk mahasiswa yang memiliki
                kualitas akademis yang baik, kreatif, serta menjadi pencipta dan pengabdi dalam masyarakat. Selain itu,
                HIMAKU juga bertanggung jawab dalam berperan aktif dalam mewujudkan masyarakat yang adil dan makmur, yang
                sesuai dengan kehendak Tuhan Yang Maha Esa. Organisasi ini berfungsi sebagai wadah pengembangan diri bagi
                mahasiswa Program Studi Akuntansi, baik dalam hal aspek ilmiah maupun non-ilmiah.</h5>
            <div class="mt-5">
                <h6><strong>About me</strong></h6>
                <a href="https://www.instagram.com/himaku_ucic/" class="btn btn-light border border-2"><i
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
