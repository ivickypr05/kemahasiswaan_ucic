@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Berita')
@section('style-fe')
    <style>
        #blog {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="d-flex justify-content-end">
                <p class="text-muted">
                    Berita / Detail
                </p>
            </div>
            <div class="row">

                <div class="col-lg-8 entries">
                    <article class="entry entry-single">

                        <h2 class="entry-title">
                            <a href="{{ route('berita') }}">{{ $berita->title }}</a>
                        </h2>

                        <div class="entry-meta">

                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($berita->dari_tanggal)->translatedFormat('d F Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($berita->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                            </li>

                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($berita->content) !!}
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Lihat Berita UCIC Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($rekberita->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-berita', $recommended->id) }}">
                                            {{ $recommended->title }}
                                        </a></b>
                                </li>
                            @endforeach
                            {{-- @php
                                dd($berita);
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
