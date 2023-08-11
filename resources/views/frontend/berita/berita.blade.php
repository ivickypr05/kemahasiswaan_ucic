@extends('layouts-fe.template')
@section('title', 'UCIC | Berita')
@section('style-fe')
    <style>
        .card {
            width: 268px;
            height: 500px;
            padding: 10px;
            font-family: "Times New Roman", sans-serif;

            &:hover,
            &:focus-within {
                transform: scale(1.08);
                box-shadow: 0 0.4rem 0.4rem rgb(0, 0, 0);
                transition: 0.2s ease-in-out;
                transform: translateY(-1rem);
                backdrop-filter: blur(0.5rem);
            }

            &:not(:focus-within) {
                transition: 0.2s ease-in-out;
            }
        }

        .card-title {
            font-family: "Helvetica", sans-serif;
        }

        .card-text {
            font-family: "Times New Roman", sans-serif;
            font-size: 13px;
        }

        .responsive-img {
            max-width: 100%;
            max-height: 100%;
            margin: auto;
            overflow: hidden;


        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }
    </style>
@endsection
@section('content-fe')
    <div class="container mb-4" style="padding-top: 10%!important;">
        <div class="d-flex justify-content-center">
            <h1><strong>Berita Universitas Catur Insan Cendekia</strong></h1>
        </div>

    </div>
    <section id="about" class="about">
        <div class="container">
            <div class="row content d-flex justify-content-center">
                @forelse ($berita as $item)
                    <div class="mt-1 mb-5 col-md-3">
                        {{-- card --}}
                        <div class="card card-deck">
                            <h4 class="card-title text-center"><strong>{{ $item->title }}</strong></h4>
                            <hr>
                            <h6 class="card-text text-center"><i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} - <i
                                    class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</h6>
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="responsive-img" width="100%">
                            @php
                                $limitedContent = Str::limit($item->content, 150);
                                $formattedContent = nl2br($limitedContent);
                            @endphp
                            <p class="mt-1" style="text-align: justify;">{!! $formattedContent !!}</p>
                            @if (strlen($item->content) > 1)
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('detail-berita', $item->id) }}"
                                        class="btn btn-primary rounded">Selengkapnya</a>
                                </div>
                            @endif


                        </div>

                    </div>
                @empty
                    <section id="pricing" class="pricing mb-5">
                        <div class="container">
                            <div class="row content">
                                <div class="col-lg-12">
                                    <br>
                                    <br>
                                    <h4 class="text-center text-primary">Belum ada Berita</h4>
                                </div>
                            </div>
                        </div>
                    </section><!-- End About Section -->
            </div>
        </div>
    </section><!-- End About Section -->
    @endforelse
    {{ $berita->links() }}
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
