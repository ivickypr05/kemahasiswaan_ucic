@extends('layouts-fe.template')
@section('title', 'UCIC | Prestasi Akademik')
@section('style-fe')
    <style>
        .card {
            width: 360px;
            height: 600px;
            border: 1px solid #0267ff;
            border-radius: 8px;
            background-color: #ffffff;
            padding: 10px;
            margin: 8px;
            font-family: "Familjen Grotesk", sans-serif;

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

        .responsive-img {
            max-width: 100%;
            height: 100%;
            margin: auto;
            overflow: hidden;
            /* untuk mengatur gambar menjadi tengah */

        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }
    </style>
@endsection
@section('content-fe')
    <div class="container d-flex justify-content-center mb-4" style="padding-top: 10%!important;">
        <h1><strong>Prestasi Akademik Mahasiswa UCIC</strong></h1>
    </div>
    <section id="about" class="about">
        <div class="container">
            <div class="row content d-flex justify-content-start">
                @forelse ($preakademik as $item)
                    <div class="mt-1 mb-5 col-md-4">
                        {{-- card --}}
                        <div class="card card-deck">
                            <img src="{{ asset('storage/' . $item->gambar_1) }}" class="responsive-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><strong><a
                                            href="{{ route('detail-prestasi-akademik', $item->id) }}">{{ $item->title }}</a></strong>
                                </h5>
                                <hr style="color: #0267ff">
                                <h6 class="card-text"> Tingkat :
                                    {{ $item->tingkat_kejuaraan }} </h6>
                                @if ($item->categories == null)
                                    <h6 class=" text-muted">tidak ada
                                        kategori</h6>
                                @else
                                    <h6 class="card-text">Kategori :
                                        {{ $item->categories->nama }}
                                    </h6>
                                @endif
                                <h6 class="card-text d-flex justify-content-end gap-1"><i class="bi bi-clock"></i>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</h6>
                                <br>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 100);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-1" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 1)
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('detail-prestasi-akademik', $item->id) }}"
                                            class="btn btn-primary rounded">Detail Prestasi</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                @empty
                    <section id="pricing" class="pricing mb-5">
                        <div class="container">
                            <div class="row content">
                                <div class="col-lg-12">
                                    <br>
                                    <br>
                                    <h4 class="text-center text-primary">Belum ada informasi data prestasi Akademik.</h4>
                                </div>
                            </div>
                        </div>
                    </section><!-- End About Section -->
            </div>
        </div>
    </section><!-- End About Section -->
    @endforelse
    <div class="container">

        {{ $preakademik->links() }}
    </div>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
