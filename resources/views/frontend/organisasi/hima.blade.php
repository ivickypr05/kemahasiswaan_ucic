@extends('layouts-fe.template')
@section('title', 'UCIC | Kegiatan Organisasi HIMA')
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

        .beasiswa-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .beasiswa-title {
            font-weight: bold;
        }

        .beasiswa-time {
            display: flex;
            align-items: center;
        }

        .beasiswa-time i {
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
        <h1>Himpunan Mahasiswa UCIC</h1>
    </div>
    <div class="container d-flex justify-content-center mb-5 mt-3 gap-4">
        <a href="{{ route('profil-himatif') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMATIF </a>
        <a href="{{ route('profil-himasi') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMASI </a>
        <a href="{{ route('profil-himadkv') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMADKV </a>
        <a href="{{ route('profil-himaku') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMAKU </a>
        <a href="{{ route('profil-himajemen') }}"
            class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMAJEMEN </a>
        <a href="{{ route('profil-himaka') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMAKA </a>
        <a href="{{ route('profil-himami') }}" class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMAMI </a>
        <a href="{{ route('profil-himabis') }}"
            class="btn btn-tranparent btn-outline-primary border-1 rounded rounded-pill">
            HIMABIS </a>
    </div>

    @forelse ($hima as $item)
        <section id="about" class="about mb-5">
            <div class="container">

                <div class="row content">
                    <div class="col-lg-6">
                        <div class="square-image">
                            <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" style="padding-top: 10%!important;">
                        <div class="beasiswa-info">

                            <h4 class="beasiswa-title">{{ $item->nama_himpunan }}</h4>

                            <div class="beasiswa-time">
                                <i class="bi bi-clock"></i>
                                <p>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                    - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        <h4 class="beasiswa-title">{{ $item->nama_kegiatan }}</h4>
                        @php
                            $limitedContent = Str::limit($item->deskripsi, 950);
                            $formattedContent = nl2br($limitedContent);
                        @endphp
                        <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                        @if (strlen($item->deskripsi) > 200)
                            <a href="{{ route('detail-hima', $item->id) }}" class="btn btn-primary"
                                style="float:right">Read
                                More</a>
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
                        <h4 class="text-center text-primary">Belum ada informasi kegiatan HIMA.</h4>
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
