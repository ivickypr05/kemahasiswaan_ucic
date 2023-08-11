@extends('layouts-fe.app')
@section('title', 'Kemahasiswaan Universitas Catur Insan Cendekia')
@section('style-fe')
    <style>
        .square-image img {
            max-width: 90%;
            max-height: 90%;
            overflow: hidden;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .title {
            font-weight: bold;
            overflow: hidden;
        }

        .time {
            display: flex;
            align-items: center;
        }

        .time i {
            margin-right: 5px;
        }

        .card {
            width: 350px;
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

        .card-organisasi {
            font-family: "Familjen Grotesk", sans-serif;
            margin: 10px;
            padding: 10px;

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

        .card-berita {
            width: 275px;
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

        .card-title-berita {
            font-family: "Helvetica", sans-serif;
        }

        .card-text-berita {
            font-family: "Times New Roman", sans-serif;
            font-size: 13px;
        }

        .responsive-img-berita {
            max-width: 100%;
            max-height: 50%;
            margin: auto;
            overflow: hidden;
        }

        /* Tambahkan margin-top pada section#about */
    </style>
@endsection

@section('content-fe')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-6">
                    <h4><b>Tentang Kemahasiswaan UCIC</b></h4>
                    <p class="right-aligned-paragraph">Selamat datang di Web Portal - Kemahasiswaan UCIC. Informasi dan
                        Layanan Mahasiswa yang dirancang
                        khusus
                        untuk memberikan informasi yang relevan dan layanan yang dibutuhkan oleh para mahasiswa.
                        Portal Kemahasisaan UCIC ini dapat mengakses pengumuman penting, Layanan Kemahasiswaan, serta
                        informasi akademik dan non-akademik lainnya dengan mudah.
                        Selain itu, kami juga memperhatikan peran organisasi kemahasiswaan dalam pengembangan diri
                        mahasiswa
                        yang didalamnya terdapat organisasi BKM (Badan Kegiatan Mahasiswa), UKM (Unit Kegiatan
                        Mahasiswa)
                        dan HIMA (Himpunan Mahasiswa).</p>
                </div>
                <div class="col-lg-6">
                    <img style="width:100%" src="{{ asset('img/cic.png') }}" alt="">
                </div>
            </div>
        </div>
    </section><!-- End About Section -->

    @if (!$beasiswa->isEmpty())
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <center>
                        <h2><b>Daftar Beasiswa</b></h2>
                    </center>
                    <br><br>
                </div>
                @forelse ($beasiswa->take(2) as $item)
                    <div class="container">
                        <hr style="border: 1px solid black">
                        <div class="row content mb-4">
                            <div class="col-lg-4 mt-4">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                                <h4 class="title right-aligned-paragraph">
                                    <a href="{{ route('detail-beasiswa', $item->id) }}">{{ $item->title }}</a>
                                </h4>
                                <div class="info">
                                    <div class="time">
                                        <i class="mb-3 bi bi-clock"></i>
                                        <p class="">
                                            {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                            -
                                            {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->content, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-1" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->content) > 500)
                                    <a href="{{ route('detail-beasiswa', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <br><br><br>
    @if (!$preakademik->isEmpty() || !$prenonakademik->isEmpty())
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2><b>Prestasi Mahasiswa UCIC</b></h2>
                    </center>
                    <br><br>
                </div>
                @forelse ($preakademik->take(2) as $item)
                    <div class="mt-1 mb-5 col-md-4">
                        {{-- card --}}
                        <div class="card card-deck">
                            <img src="{{ asset('storage/' . $item->gambar_1) }}" class="responsive-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><strong>Akademik - {{ $item->title }}</strong></h5>
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
                @endforeach

                @forelse ($prenonakademik->take(1) as $item)
                    <div class="mt-1 mb-5 col-md-4">
                        {{-- card --}}
                        <div class="card card-deck">
                            <img src="{{ asset('storage/' . $item->gambar_1) }}" class="responsive-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><strong>Non Akademik - {{ $item->title }}</strong></h5>
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
                                        <a href="{{ route('detail-prestasi-nonakademik', $item->id) }}"
                                            class="btn btn-primary rounded">Detail Prestasi</a>
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>

    @endif
    <br><br><br>
    @if (!$bkm->isEmpty() || !$ukm->isEmpty() || !$hima->isEmpty())
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2><b>Kegiatan Organisasi Mahasiswa UCIC</b></h2>
                    </center>
                    <br><br>
                </div>
                @forelse ($bkm->take(1) as $item)
                    <div class="container card-organisasi border border-primary">
                        <div class="row content">
                            <div class="col-lg-4 mt-1">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-1">
                                <h4 class="title right-aligned-paragraph">{{ $item->nama_kegiatan }}</h4>
                                <div class="info mb-1">
                                    <div class="time">
                                        <i class="bi bi-clock"></i>
                                        {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                        - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 2)
                                    <a href="{{ route('detail-bkm', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach

                @forelse ($ukm->take(1) as $item)
                    <div class="container card-organisasi border border-primary mt-3">
                        <div class="row content">
                            <div class="col-lg-4 mt-1">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-1">
                                <h4 class="title right-aligned-paragraph mb-3">{{ $item->nama_kegiatan }}</h4>

                                <div class="info">
                                    <h6><strong>Yang Mengadakan Kegiatan : {{ $item->nama_ukm }}</strong></h6>
                                    <div class="time">
                                        <i class="bi bi-clock"></i>
                                        {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                        - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 2)
                                    <a href="{{ route('detail-ukm', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach

                @forelse ($hima->take(1) as $item)
                    <div class="container card-organisasi border border-primary mt-3">
                        <div class="row content">
                            <div class="col-lg-4 mt-1">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-1">
                                <h4 class="title right-aligned-paragraph mb-3">{{ $item->nama_kegiatan }}</h4>

                                <div class="info">
                                    <h6><strong>Yang Mengadakan Kegiatan : {{ $item->nama_himpunan }}</strong></h6>
                                    <div class="time">
                                        <i class="bi bi-clock"></i>
                                        {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }}
                                        - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 2)
                                    <a href="{{ route('detail-hima', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
        </section>
    @endif
    <br><br><br>
    @if (!$pkm->isEmpty() || !$pkk->isEmpty())
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2><b>Daftar Informasi SIMBELMAWA</b></h2>
                    </center>
                    <br><br>
                </div>
                @forelse ($pkm->take(1) as $item)
                    <div class="container">
                        <hr style="border: 1px solid black">
                        <div class="row content mb-4">
                            <div class="col-lg-4 mt-4">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                                <h4 class="title right-aligned-paragraph">
                                    <a href="{{ route('detail-pkm', $item->id) }}">{{ $item->judul }}</a>
                                </h4>
                                <div class="info mb-3">
                                    <div class="time">
                                        <i class="mb-3 bi bi-clock"></i>
                                        <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                            - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 500)
                                    <a href="{{ route('detail-pkm', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

                @forelse ($pkk->take(1) as $item)
                    <div class="container">
                        <hr style="border: 1px solid black">
                        <div class="row content">
                            <div class="col-lg-4 mt-4">
                                <div class="square-image d-flex justify-content-center">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 pt-4 pt-lg-0 mt-3">
                                <h4 class="title right-aligned-paragraph">
                                    <a href="{{ route('detail-pkk', $item->id) }}">{{ $item->judul }}</a>
                                </h4>
                                <div class="info mb-3">
                                    <div class="time">
                                        <i class="mb-3 bi bi-clock"></i>
                                        <p>{{ \Carbon\Carbon::parse($item->mulai_tanggal)->translatedFormat('d F Y') }}
                                            - {{ \Carbon\Carbon::parse($item->akhir_tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 500);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 500)
                                    <a href="{{ route('detail-pkk', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Selengkapnya</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <br><br><br>
    @if (!$berita->isEmpty())
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2><b>Berita Universitas Catur Insan Cendekia</b></h2>
                    </center>
                    <br><br>
                </div>
                @foreach ($berita->take(4) as $item)
                    <div class="mt-1 mb-5 col-md-3">
                        {{-- card --}}
                        <div class="card-berita card-deck border border-2">
                            <h4 class="card-title-berita text-center"><strong>{{ $item->title }}</strong></h4>
                            <hr>
                            <h6 class="card-text-berita text-center"><i class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} - <i
                                    class="bi bi-clock"></i>
                                {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</h6>
                            <img src="{{ asset('storage/' . $item->gambar) }}" class="responsive-img-berita"
                                width="100%" height="150px">
                            @php
                                $limitedContent = Str::limit($item->content, 130);
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
                @endforeach
            </div>
        </div>

    @endif
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
