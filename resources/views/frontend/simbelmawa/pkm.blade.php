@extends('layouts-fe.template')
@section('title', 'UCIC | Program PKM 8 Bidang')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
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
    </style>
@endsection
@section('content-fe')
    <div class="container mb-5" style="padding-top: 10%!important;">
        <div class="d-flex justify-content-center">
            <h1><strong>Pengumuman PKM 8 Bidang</strong></h1>
        </div>
    </div>
    <br>
    @forelse ($pkm as $item)
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
                    <h4 class="pkm-title right-aligned-paragraph">
                        <a href="{{ route('detail-pkm', $item->id) }}">{{ $item->judul }}</a>
                    </h4>
                    <div class="pkm-info mb-3">
                        <div class="pkm-time">
                            <i class="mb-3 bi bi-clock"></i>
                            <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    @php
                        $limitedContent = Str::limit($item->deskripsi, 500);
                        $formattedContent = nl2br($limitedContent);
                    @endphp
                    <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                    @if (strlen($item->deskripsi) > 500)
                        <a href="{{ route('detail-pkm', $item->id) }}" class="btn btn-primary"
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
                        <br></br>
                        <br></br>
                        <h4 class="text-center text-primary">Belum ada informasi PKM.</h4>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
    @endforelse
    <div class="container">
        {{ $pkm->links() }}
    </div>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
