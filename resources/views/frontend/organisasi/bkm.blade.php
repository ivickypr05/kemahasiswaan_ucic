@extends('layouts-fe.template')
@section('title', 'UCIC | Kegiatan Organisasi BKM')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 80%;
            max-height: 80%;
        }

        .bkm-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .bkm-title {
            font-weight: bold;
            overflow: hidden;
        }

        .bkm-time {
            display: flex;
        }

        .bkm-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
        <h1>Badan Koordinasi Mahasiswa UCIC</h1>
    </div>

    <div class="container d-flex justify-content-center mt-3 mb-5">
        <a href="{{ route('profil-bkm') }}"
            class="btn btn-transparent btn-outline-primary border-1 rounded rounded-pill">Profil BKM (Badan Koordinasi
            Mahasiswa)</a>
    </div>

    @forelse ($bkm as $item)
        <section id="about" class="about">
            <div class="container card card-body border-primary">
                <div class="row content">
                    <div class="col-lg-4 mt-1">
                        <div class="square-image d-flex justify-content-center">
                            <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 mt-1">
                        <h4 class="bkm-title right-aligned-paragraph">{{ $item->nama_kegiatan }}</h4>
                        <div class="bkm-info mb-1">
                            <div class="bkm-time">
                                <i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                            </div>
                        </div>
                        @php
                            $limitedContent = Str::limit($item->deskripsi, 500);
                            $formattedContent = nl2br($limitedContent);
                        @endphp
                        <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                        @if (strlen($item->deskripsi) > 2)
                            <a href="{{ route('detail-bkm', $item->id) }}" class="btn btn-primary"
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
                        <h4 class="text-center text-primary">Belum ada informasi Koordinasi BKM.</h4>
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
