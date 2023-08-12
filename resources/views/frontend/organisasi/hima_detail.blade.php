@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Kegiatan Organisasi HIMA')
@section('style-fe')
@endsection

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="breadcrumbs">
                <a href="{{ route('organisasi-hima') }}">Organisasi HIMA</a>
                <span class="separator"><i class="bi bi-chevron-double-right"></i></span>
                <a href="{{ route('detail-hima', $hima->id) }}">Detail Kegiatan HIMA
                    "{{ $hima->nama_kegiatan }}"</a>
            </div>
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">

                        <h2 class="entry-title">
                            {{ $hima->nama_himpunan }} -
                            {{ $hima->nama_kegiatan }}
                        </h2>
                        <div class="col-md-3 mb-3 mt-3">
                            <img src="{{ asset('storage/' . $hima->gambar) }}" alt="" class="img-top"
                                width="300px">
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="2020-01-01">{{ \Carbon\Carbon::parse($hima->dari_tanggal)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($hima->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($hima->deskripsi) !!}
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Lihat Kegiatan HIMA Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($rekhima->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-hima', $recommended->id) }}">
                                            {{ $recommended->nama_himpunan }} - {{ $recommended->nama_kegiatan }}
                                        </a></b>
                                </li>
                            @endforeach
                            {{-- @php
                                dd($beasiswa);
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
