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
    <div class="container" style="padding-top: 10%!important;">
        <div class="d-flex justify-content-end mb-5">
            <p class="text-muted">
                Organisasi Kemahasiswaan / BKM / Detail kegiatan
            </p>
        </div>
        <div class="d-flex justify-content-center">
            <h1><strong>Profil Organisasi BKM</strong></h1>
        </div>
        <div class="d-flex justify-content-center mt-3 mb-5">
            <a href="{{ route('organisasi-bkm') }}"
                class="btn btn-transparent btn-outline-primary border-1 rounded rounded-pill">Kegiatan Organisasi BKM</a>
        </div>
    </div>
    @forelse ($profilbkm->take(1) as $item)
        <section id="about" class="about mb-5">
            <div class="container">
                <img src="{{ asset('storage/' . $item->logo) }}" class="img-top" width="300px">
                <hr>
                <h5 class="right-aligned-paragraph">{!! nl2br($item->deskripsi) !!}</h5>
                <div class="mt-5">
                    <h6><strong>About me</strong></h6>
                    <a href="https://www.instagram.com/bkmucic/" class="btn btn-light border"><i class="bx bxl-instagram"
                            style="border-radius: 8px" style="color: rgb(0, 0, 0)"></i></a>
                </div>
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
                        <br>
                        <br>
                        <br>
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
