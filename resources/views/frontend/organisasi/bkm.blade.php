@extends('layouts-fe.template')

@section('style-fe')
    <style>
        .square-image {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            position: relative;
            overflow: hidden;
        }

        .square-image img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }

        .bkm-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .bkm-title {
            font-weight: bold;
        }

        .bkm-time {
            display: flex;
            align-items: center;
        }

        .bkm-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#about {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
        <h1>Badan Kegiatan Mahasiswa UCIC</h1>
    </div>

    <div class="container d-flex justify-content-center mt-3 mb-5">
        <a href="{{ route('struktur-bkm') }}"
            class="btn btn-transparent btn-outline-dark border-1 rounded rounded-pill">Profil
            dan Struktur BKM</a>
    </div>
    @forelse ($bkm as $item)
        <section id="about" class="about mt-2">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-4 mt-3">
                        <div class="">
                            <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                width="350px" height="250" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                        <div class="bkm-info">
                            <h4 class="bkm-title">{{ $item->nama_kegiatan }}</h4>
                            <div class="bkm-time">
                                <i class="bi bi-clock"></i>
                                <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                    - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        @php
                            $limitedContent = Str::limit($item->deskripsi, 950);
                            $formattedContent = nl2br($limitedContent);
                        @endphp
                        <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                        @if (strlen($item->deskripsi) > 200)
                            <a href="{{ route('detail-bkm', $item->id) }}" class="btn btn-primary" style="float:right">Read
                                More</a>
                        @endif
                    </div>
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
                        <h4 class="text-center">Belum ada informasi mengenai Organisasi BKM.</h4>
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
