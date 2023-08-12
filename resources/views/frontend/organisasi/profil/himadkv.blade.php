@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi HIMADKV')
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
    <div class="container">
        <div class="breadcrumbs" style="padding-top: 3%!important;">
            <a href="{{ route('organisasi-hima') }}">Organisasi HIMA</a>
            <span class="separator"><i class="bi bi-chevron-double-right"></i></span>
            <a href="">Profil HIMADKV</a>
        </div>
        <div class="d-flex justify-content-center">
            <h1><strong>Profil Organisasi HIMADKV</strong></h1>
        </div>
    </div>
    <section id="about" class="about mb-5">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="square-image">
                    <img src="{{ asset('img/himadkv.png') }}" width="300px">
                </div>
            </div>
            <hr>
            <h5 class="right-aligned-paragraph">Himadkv adalah himpunan mahasiswa dkv UCIC dalam mengekspresikan minat
                bakatnya dalam berkesenian, sekaligus jadi wadah bersenang senang di dalamnya. Dalam himadkv menjunjung
                tinggi persaudaraan agar tidak ada batasan antar angkatan dan melebur menjadi 1 yaitu dkv ucic.</h5>
            <div class="mt-5">
                <h6><strong>About me</strong></h6>
                <a href="https://www.instagram.com/hima.dkvucic/" class="btn btn-light border border-2"><i
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
