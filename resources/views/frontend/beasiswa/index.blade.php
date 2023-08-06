@extends('layouts-fe.template')
@section('title', 'UCIC | Pengumuman Beasiswa')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
        }

        .beasiswa-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .beasiswa-title {
            font-weight: bold;
            overflow: hidden;
        }

        .beasiswa-time {
            display: flex;
            align-items: center;
        }

        .beasiswa-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
    </style>
@endsection
<div class="container mb-5" style="padding-top: 10%!important;">
    <div class="d-flex justify-content-center">
        <h1><strong>Pengumuman Beasiswa</strong></h1>
    </div>
</div>
<br>
<br>
@section('content-fe')
    @forelse ($beasiswa as $item)
        <div class="container">
            <div class="row content mb-4 mt-4">
                <div class="col-lg-4 mt-4">
                    <div class="square-image d-flex justify-content-center">
                        <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                    <h4 class="beasiswa-title right-aligned-paragraph">
                        <a href="{{ route('detail-beasiswa', $item->id) }}">{{ $item->title }}</a>
                    </h4>
                    <div class="beasiswa-info">
                        <div class="beasiswa-time">
                            <i class="mb-3 bi bi-clock"></i>
                            <p class="">{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    @php
                        $limitedContent = Str::limit($item->content, 500);
                        $formattedContent = nl2br($limitedContent);
                    @endphp
                    <p class="mt-1" style="text-align: justify;">{!! $formattedContent !!}</p>
                </div>
            </div>
            <hr>
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
        {{ $beasiswa->links() }}
    </div>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
