@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Prestasi Non Akademik')
@section('style-fe')
    <style>
        .img-top {
            max-width: 100%;
            height: 100%;
            margin: 0 auto;
            display: block;
            /* untuk mengatur gambar menjadi tengah */

        }
    </style>

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="breadcrumbs">
                <a href="{{ route('prestasi-nonakademik') }}">Prestasi Non Akademik</a>
                <span class="separator"><i class="bi bi-chevron-double-right"></i></span>
                <a href="{{ route('detail-prestasi-nonakademik', $prenonakademik->id) }}">Detail Prestasi Non Akademik
                    "{{ $prenonakademik->title }}"</a>
            </div>
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            Non Akademik - {{ $prenonakademik->title }}
                        </h2>
                        <div class="entry-meta">
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($prenonakademik->tanggal)->translatedFormat('d F Y') }}
                            </li>
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-4">
                                    @if ($prenonakademik->gambar_2)
                                        <img src="{{ asset('storage/' . $prenonakademik->gambar_2) }}" alt="Gambar 2"
                                            class="img-top">
                                    @else
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $prenonakademik->gambar_1) }}" alt="Gambar 1"
                                        class="img-top">
                                </div>
                                <div class="col-md-4">
                                    @if ($prenonakademik->gambar_3)
                                        <img src="{{ asset('storage/' . $prenonakademik->gambar_3) }}" alt="Gambar 2"
                                            class="img-top">
                                    @else
                                    @endif
                                </div>
                            </div>

                        </div>
                        <h6 class="text-dark">Tingkat :
                            {{ $prenonakademik->tingkat_kejuaraan }} </h6>
                        @if ($prenonakademik->categories == null)
                            <h6 class="text-dark">tidak ada
                                kategori</h6>
                        @else
                            <h6 class="text-dark">Kategori :
                                {{ $prenonakademik->categories->nama }}
                            </h6>
                        @endif
                        <hr>
                        <div class="entry-content text-dark"><strong> Nama Peserta : </strong> <br>
                            {!! nl2br($prenonakademik->nama) !!}
                        </div>
                        <br>
                        <div class="entry-content text-dark"><strong> Deskripsi : </strong> <br>
                            {!! nl2br($prenonakademik->deskripsi) !!}
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Prestasi Non Akademik
                                Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($reknonakademik->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-prestasi-nonakademik', $recommended->id) }}">
                                            {{ $recommended->title }}
                                        </a></b>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- End Blog Single Section -->
@endsection



@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
