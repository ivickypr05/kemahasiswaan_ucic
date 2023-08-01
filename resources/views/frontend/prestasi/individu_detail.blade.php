@extends('layouts-fe.template')

@section('style-fe')
    <style>
        #blog {
            margin-top: 100px;
        }

        .img-top {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            /* untuk mengatur gambar menjadi tengah */

        }
    </style>
@endsection

@section('content-fe')
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">

                    <article class="entry entry-single">
                        {{-- Add images above the title --}}
                        <div class="row mb-3 d-flex justify-content-center">
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $preindividu->gambar_1) }}" alt="Gambar 1" class="img-top"
                                    width="500px">
                            </div>
                            <div class="col-md-3">
                                @if ($preindividu->gambar_2)
                                    <img src="{{ asset('storage/' . $preindividu->gambar_2) }}" alt="Gambar 2"
                                        class="img-top" width="500px">
                                @else
                                    <img src="{{ asset('storage/' . $preindividu->gambar_1) }}" alt="Gambar 1"
                                        class="img-top" width="500px">
                                @endif
                            </div>
                            <div class="col-md-3">
                                @if ($preindividu->gambar_2)
                                    <img src="{{ asset('storage/' . $preindividu->gambar_3) }}" alt="Gambar 2"
                                        class="img-top" width="500px">
                                @else
                                    <img src="{{ asset('storage/' . $preindividu->gambar_1) }}" alt="Gambar 1"
                                        class="img-top" width="500px">
                                @endif
                            </div>
                        </div>
                        <h2 class="entry-title">
                            <a href="{{ route('prestasi-individu') }}">{{ $preindividu->title }}</a>
                        </h2>
                        <div class="entry-meta">
                            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                        datetime="2020-01-01">{{ \Carbon\Carbon::parse($preindividu->tanggal)->translatedFormat('d F Y') }}
                            </li>

                        </div>
                        <h6 class="text-dark"> Tingkat :
                            {{ $preindividu->tingkat_kejuaraan }} </h6>
                        @if ($preindividu->categories == null)
                            <h6 class="text-dark">tidak ada
                                kategori</h6>
                        @else
                            <h6 class="text-dark">Kategori :
                                {{ $preindividu->categories->nama }}
                            </h6>
                        @endif
                        <hr>
                        <h6 class="text-dark"><strong>Nama Peserta : {{ $preindividu->nama }} </strong></h6>
                        <div class="entry-content text-dark">
                            {!! nl2br($preindividu->deskripsi) !!}
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
