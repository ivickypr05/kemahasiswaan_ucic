@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Program PPK Ormawa')
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
                    SIMBELMAWA / PPK Ormawa / Detail
                </p>
            </div>
            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . $pkk->gambar) }}" alt="" class="img-top" width="300px">
                        </div>
                        <h2 class="mt-3 entry-title">
                            <a href="{{ route('pkk') }}">{{ $pkk->judul }}</a>
                        </h2>
                        <div class="entry-meta">
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($pkk->dari_tanggal)->translatedFormat('d F Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($pkk->sampai_tanggal)->translatedFormat('d F Y') }}</time></a>
                            </li>

                        </div>


                        <div class="entry-content right-aligned-paragraph">
                            {!! nl2br($pkk->deskripsi) !!}
                        </div>
                        <div class="entry-content mt-4">
                            <p><strong> Klik dibawah untuk melihat Pedoman PPK! </strong></p>

                            <a href="{{ asset('storage/' . $pkk->pedoman) }}" target="_blank"
                                class="btn btn-transparent btn-outline-primary border-3 rounded rounded-pill">Pedoman
                                PPK Ormawa</a>

                        </div>
                    </article><!-- End blog entry -->

                </div><!-- End blog entries list -->
                <div class="col-lg-4">
                    <div class="recommended">
                        <h3 class="d-flex justify-content-center recommended-title mb-3"><b>Lihat Pengumuman PPK Lainnya</b>
                        </h3>
                        <hr>
                        <ul class="recommended-list">
                            @foreach ($rekpkk->take(5) as $recommended)
                                <li class="recommended-list-item">
                                    <b><a href="{{ route('detail-pkk', $recommended->id) }}">
                                            {{ $recommended->judul }}
                                        </a></b>
                                </li>
                            @endforeach
                            {{-- @php
                                dd($pkk);
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
