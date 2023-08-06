@extends('layouts-fe.template')
@section('title', 'UCIC | Detail Kegiatan Organisasi BKM')
@section('style-fe')
    <style>
        #blog {
            margin-top: 100px;
        }

        .img-top {
            max-width: 100%;
            height: 100%;
            display: block;
            margin: 0 auto;
            display: block;
            /* untuk mengatur gambar menjadi tengah */

        }
    </style>

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        <h2 class="entry-title">
                            <a href="{{ route('prestasi-akademik') }}">Akademik - {{ $preakademik->title }}</a>
                        </h2>
                        <div class="entry-meta">
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time
                                    datetime="2020-01-01">{{ \Carbon\Carbon::parse($preakademik->tanggal)->translatedFormat('d F Y') }}
                            </li>
                            <div class="row mb-3 d-flex justify-content-center">
                                <div class="col-md-3">
                                    @if ($preakademik->gambar_2)
                                        <img src="{{ asset('storage/' . $preakademik->gambar_2) }}" alt="Gambar 2"
                                            class="img-top">
                                    @else
                                        <img src="https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg"
                                            alt="Gambar 1" class="img-top">
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/' . $preakademik->gambar_1) }}" alt="Gambar 1"
                                        class="img-top">
                                </div>
                                <div class="col-md-3">
                                    @if ($preakademik->gambar_3)
                                        <img src="{{ asset('storage/' . $preakademik->gambar_3) }}" alt="Gambar 2"
                                            class="img-top">
                                    @else
                                        <img src="https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg"
                                            alt="Gambar 1" class="img-top">
                                    @endif
                                </div>
                            </div>

                        </div>
                        <h6 class="text-dark">Tingkat :
                            {{ $preakademik->tingkat_kejuaraan }} </h6>
                        @if ($preakademik->categories == null)
                            <h6 class="text-dark">tidak ada
                                kategori</h6>
                        @else
                            <h6 class="text-dark">Kategori :
                                {{ $preakademik->categories->nama }}
                            </h6>
                        @endif
                        <hr>
                        <div class="entry-content text-dark"><strong> Nama Peserta : </strong> <br>
                            {!! nl2br($preakademik->nama) !!}
                        </div>
                        <br>
                        <div class="entry-content text-dark"><strong> Deskripsi : </strong> <br>
                            {!! nl2br($preakademik->deskripsi) !!}
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
