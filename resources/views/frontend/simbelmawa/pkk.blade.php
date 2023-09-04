@extends('layouts-fe.template')
@section('title', 'UCIC | Program PPK Ormawa')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
        }

        .pkk-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .pkk-title {
            font-weight: bold;
            overflow: hidden;
        }

        .pkk-time {
            display: flex;
            align-items: center;
        }

        .pkk-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
    </style>
@endsection
@section('content-fe')
    <div class="container mb-5" style="padding-top: 10%!important;">
        <div class="d-flex justify-content-center">
            <h1><strong>Pengumuman PPK Ormawa</strong></h1>
        </div>
    </div>
    <br>
    @forelse ($pkk as $item)
        <div class="container">
            <div class="row content mb-4 mt-4">
                <hr style="border: 1px solid black">
                <div class="col-lg-4 mt-4">
                    <div class="square-image d-flex justify-content-center">
                        <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                    <h4 class="pkk-title right-aligned-paragraph">
                        <a href="{{ route('detail-pkk', $item->id) }}">{{ $item->judul }}</a>
                    </h4>
                    <div class="pkk-info mb-3">
                        <div class="pkk-time">
                            <i class="mb-3 bi bi-clock"></i>
                            <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    @php
                        $limitedContent = Str::limit($item->deskripsi, 350);
                        $formattedContent = nl2br($limitedContent);
                    @endphp
                    <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                    @if (strlen($item->deskripsi) > 350)
                        <a href="{{ route('detail-pkk', $item->id) }}" class="btn btn-primary"
                            style="float:right">Selengkapnya</a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <section id="pricing" class="pricing mb-5">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <br>
                        <br>
                        <h4 class="text-center text-primary">Belum ada informasi PPK.</h4>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
    @endforelse
    <div class="container">
        {{ $pkk->links() }}
    </div>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
