@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Beasiswa')
@section('style-fe')
@endsection

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="breadcrumbs">
                <a href="{{ route('beasiswa') }}">Beasiswa</a>
                <span class="separator"><i class="bi bi-chevron-double-right"></i></span>
                <a href="{{ route('detail-beasiswa', $beasiswa->id) }}">Detail Beasiswa "{{ $beasiswa->title }}"</a>
            </div>
            <div class="row">
                <div class="col-lg-8 entries">
                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            {{ $beasiswa->title }}
                        </h2>
                        <div class="entry-meta">
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($beasiswa->dari_tanggal)->translatedFormat('d F Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($beasiswa->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                            </li>
                        </div>
                        <div class="d-flex justify-content-start">
                            <img src="{{ asset('storage/' . $beasiswa->gambar) }}" width="300px">
                        </div>
                        <div class="entry-content right-aligned-paragraph mt-3">
                            {!! nl2br($beasiswa->content) !!}
                        </div>
                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Pengumuman Beasiswa
                                Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($rekbeasiswa->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-beasiswa', $recommended->id) }}">
                                            {{ $recommended->title }}
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
