@extends('layouts-fe.template')
@section('title', 'UCIC | Program PKM 8 Bidang')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 90%;
            max-height: 90%;
        }

        .pkm-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .pkm-title {
            font-weight: bold;
            overflow: hidden;
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
    </style>
@endsection
<div class="container d-flex justify-content-center mb-5" style="padding-top: 10%!important;">
    <h1><strong>Pengumuman PKM 8 Bidang</strong></h1>
</div>
@section('content-fe')
    @forelse ($pkm as $item)
        <section id="about" class="about">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-4 mt-3">
                        <div class="square-image d-flex justify-content-center">
                            <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                        <h4 class="pkm-title right-aligned-paragraph">
                            <a href="{{ route('detail-pkm', $item->id) }}">{{ $item->judul }}</a>
                        </h4>
                        <div class="pkm-info mb-3">
                            <div class="pkm-time">
                                <i class="bi bi-clock"></i>
                                <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                    - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>

                        @php
                            $limitedContent = Str::limit($item->deskripsi, 700);
                            $formattedContent = nl2br($limitedContent);
                        @endphp
                        <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                    </div>
                </div>
                <hr>
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
