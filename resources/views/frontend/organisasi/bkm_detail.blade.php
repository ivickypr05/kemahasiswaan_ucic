@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Kegiatan Organisasi BKM')
@section('style-fe')
@endsection

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="breadcrumbs">
                <a href="{{ route('organisasi-bkm') }}">Organisasi BKM</a>
                <span class="separator"><i class="bi bi-chevron-double-right"></i></span>
                <a href="{{ route('detail-bkm', $bkm->id) }}">Detail Kegiatan BKM
                    "{{ $bkm->nama_kegiatan }}"</a>
            </div>
            <div class="row">

                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            {{ $bkm->nama_kegiatan }}
                        </h2>

                        <div class="col-md-4 mb-3 mt-3">
                            <img src="{{ asset('storage/' . $bkm->gambar) }}" alt="" class="img-top" width="300px">
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="2020-01-01">{{ \Carbon\Carbon::parse($bkm->mulai_tanggal)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($bkm->akhir_tanggal)->translatedFormat('d F Y') }}</time></a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($bkm->deskripsi) !!}
                        </div>
                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Lihat Kegiatan BKM Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($rekbkm->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-bkm', $recommended->id) }}">
                                            {{ $recommended->nama_kegiatan }}
                                        </a></b>
                                </li>
                            @endforeach
                            {{-- @php
                                dd($bkm);
                            @endphp --}}
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
