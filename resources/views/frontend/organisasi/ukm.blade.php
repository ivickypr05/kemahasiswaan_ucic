@extends('layouts-fe.template')
@section('title', 'UCIC | Kegiatan Organisasi UKM')
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

        .ukm-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .ukm-title {
            font-weight: bold;
            overflow: hidden;
        }

        .ukm-time {
            display: flex;
        }

        .ukm-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    <div class="container d-flex justify-content-center mb-5" style="padding-top: 10%!important;">
        <h1>Unit Kegiatan Mahasiswa UCIC</h1>
    </div>
    @forelse ($ukm as $item)
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
                        <h4 class="ukm-title right-aligned-paragraph mb-3">{{ $item->nama_kegiatan }}</h4>

                        <div class="ukm-info">
                            <h6><strong>Yang Mengadakan Kegiatan : {{ $item->nama_himpunan }}</strong></h6>
                            <div class="ukm-time">
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
                            <a href="{{ route('detail-ukm', $item->id) }}" class="btn btn-primary"
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
                        <br>
                        <br>
                        <h4 class="text-center text-primary">Belum ada informasi kegiatan UKM.</h4>
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
