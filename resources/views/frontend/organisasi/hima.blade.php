@extends('layouts-fe.template')
@section('title', 'UCIC | Kegiatan Organisasi HIMA')
@section('style-fe')
    <style>
        .card {
            font-family: "Familjen Grotesk", sans-serif;

            &:hover,
            &:focus-within {
                transform: scale(1.08);
                box-shadow: 0 0.4rem 0.4rem rgb(0, 0, 0);
                transition: 0.2s ease-in-out;
                transform: translateY(-1rem);
                backdrop-filter: blur(0.5rem);
            }

            &:not(:focus-within) {
                transition: 0.2s ease-in-out;
            }
        }

        .square-image img {
            max-width: 80%;
            max-height: 80%;
            overflow: hidden;
        }

        .hima-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .hima-title {
            font-weight: bold;
            overflow: hidden;
        }

        .hima-time {
            display: flex;
        }

        .hima-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#about {
            margin-top: 50px;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
        <h1><strong>Himpunan Mahasiswa UCIC</strong></h1>
    </div>
    <div class="container d-flex justify-content-center mt-3 gap-4 mb-5">
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
    <br>
    @forelse ($hima as $item)
        <div class="container card card-body border-primary mt-5 mb-5">
            <div class="row content">
                <div class="col-lg-4 mt-1">
                    <div class="square-image d-flex justify-content-center">
                        <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 mt-1">
                    <h4 class="hima-title right-aligned-paragraph mb-3"><a
                            href="{{ route('detail-hima', $item->id) }}">{{ $item->nama_kegiatan }}</a></h4>

                    <div class="hima-info">
                        <h6><strong>Yang Mengadakan Kegiatan : {{ $item->nama_himpunan }}</strong></h6>
                        <div class="hima-time text-muted">
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
                        <a href="{{ route('detail-hima', $item->id) }}" class="btn btn-primary"
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
                        <h4 class="text-center text-primary">Belum ada informasi kegiatan HIMA.</h4>
                    </div>
                </div>
            </div>
        </section><!-- End About Section -->
    @endforelse
    <div class="container">
        {{ $hima->links() }}
    </div>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
