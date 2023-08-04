@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Kegiatan Organisasi UKM')
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

                        <h2 class="entry-title">
                            <a href="{{ route('organisasi-ukm') }}">{{ $ukm->nama_ukm }} - {{ $ukm->nama_kegiatan }}</a>
                        </h2>
                        <div class="col-md-3 mb-3 mt-3">
                            <img src="{{ asset('storage/' . $ukm->gambar) }}" alt="" class="img-top" width="300px">
                        </div>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="2020-01-01">{{ \Carbon\Carbon::parse($ukm->dari_tanggal)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($ukm->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                                </li>
                            </ul>
                        </div>

                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($ukm->deskripsi) !!}
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
