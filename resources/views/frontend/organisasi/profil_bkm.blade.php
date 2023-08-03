@extends('layouts-fe.template')
@section('title', 'UCIC | Profil Organisasi BKM')
@section('style-fe')
    <style>
        .square-image {
            width: 100%;
            height: 0;
            padding-bottom: 75%;
            position: relative;
            overflow: hidden;
        }

        .square-image img {
            position: absolute;
            /* top: 50%;                                                                                           transform: translate(-50%, -50%); */
            width: 100%;
            height: 100%;
            /* object-fit: cover;
                                                                                                                                                    object-position: center center; */
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .text-container {
            text-align: center;
        }


        .img-top {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
        <h1>Profil Organisasi BKM</h1>
    </div>
    @forelse ($profilbkm->take(1) as $item)
        <section id="about" class="about mb-5">
            <div class="container">
                <img src="{{ asset('storage/' . $item->logo) }}" class="img-top" width="250px">
                <hr>
                <h5 class="right-aligned-paragraph">{!! nl2br($item->deskripsi) !!}</h5>
                <div class="square-image">
                    <h4 class="text-center mt-4"><strong>Struktur Organisasi BKM</strong></h4>
                    <br><br>
                    <img src="{{ asset('storage/' . $item->struktur_bkm) }}" alt="">
                </div>
            </div>
        </section><!-- End About Section -->
    @empty
        <section id="about" class="about mb-5">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <br></br>
                        <br></br>
                        <br></br>
                        <h4 class="text-center">Belum ada Profil Organisasi BKM.</h4>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
    @endforelse
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
