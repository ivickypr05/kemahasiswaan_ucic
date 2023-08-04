@extends('layouts-fe.template')
@section('title', 'UCIC | Program PKM 8 Bidang')
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

        .pkm-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .pkm-title {
            font-weight: bold;
        }

        .pkm-time {
            display: flex;
            align-items: center;
        }

        .pkm-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }

        .card {
            font-family: 'Familjen Grotesk', sans-serif;


            &:hover,
            &:focus-within {
                transform: scale(1.08);
                box-shadow: 0 1rem 1rem rgb(0, 0, 0);
                transform: translateY(-1rem);
                backdrop-filter: blur(0.5rem);
            }

        }
    </style>
@endsection
<div class="container d-flex justify-content-center mb-5" style="padding-top: 10%!important;">
    <h1><strong>Pengumuman PKM 8 Bidang</strong></h1>
</div>
@section('content-fe')
    @forelse ($pkm as $item)
        <section id="about" class="about">
            <div class="container card card-body border-primary">
                <div class="row content">
                    <div class="col-lg-4 mt-3">
                        <div class="">
                            <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                class="img-top" width="350px" height="250" alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                        <div class="pkm-info">
                            <h4 class="pkm-title">{{ $item->judul }}</h4>
                            <div class="pkm-time">
                                <i class="bi bi-clock">
                                    {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                    - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                </i>
                            </div>
                        </div>
                        @php
                            $limitedContent = Str::limit($item->deskripsi, 500);
                            $formattedContent = nl2br($limitedContent);
                        @endphp
                        <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                        @if (strlen($item->deskripsi) > 2)
                            <a href="{{ route('detail-pkm', $item->id) }}" class="btn btn-primary"
                                style="float:right">Selengkapnya</a>
                        @endif
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->
    @empty
        <section id="pricing" class="pricing mb-5">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <br></br>
                        <br></br>
                        <h4 class="text-center text-primary">Belum ada informasi PKM.</h4>
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
