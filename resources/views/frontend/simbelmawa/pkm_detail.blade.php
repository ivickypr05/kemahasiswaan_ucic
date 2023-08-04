@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Program PKM 8 Bidang')
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

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/' . $pkm->gambar) }}" alt="" class="img-top" width="300px">
                        </div>
                        <h2 class="entry-title">
                            <a href="{{ route('pkm') }}">{{ $pkm->judul }}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="2020-01-01">{{ \Carbon\Carbon::parse($pkm->dari_tanggal)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($pkm->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($pkm->deskripsi) !!}
                        </div>
                        <div class="entry-content mt-4">
                            <p><strong> Klik dibawah untuk melihat Pedoman PKM! </strong></p>

                            <a href="{{ asset('storage/' . $pkm->pedoman) }}" target="_blank"
                                class="btn btn-transparent btn-outline-primary border-3 rounded rounded-pill">Pedoman
                                {{ $pkm->judul }}</a>

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
