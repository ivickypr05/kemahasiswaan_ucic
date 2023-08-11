@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Beasiswa')
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
                    Beasiswa / Detail
                </p>
            </div>
            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">

                        <h2 class="entry-title">
                            <a href="{{ route('beasiswa') }}">{{ $beasiswa->title }}</a>
                        </h2>

                        <div class="entry-meta">

                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($beasiswa->dari_tanggal)->translatedFormat('d F Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($beasiswa->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                            </li>

                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($beasiswa->content) !!}
                        </div>

                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->

            </div>

        </div>
    </section><!-- End Blog Single Section -->
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
