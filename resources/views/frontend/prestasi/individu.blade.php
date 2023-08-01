@extends('layouts-fe.template')
@section('title', 'UCIC | Prestasi Individu')
@section('style-fe')
    <style>
        .card-img-tip {
            max-width: 100%;
            height: 100%;
            display: block;
            margin: 0 auto;
            /* untuk mengatur gambar menjadi tengah */

        }


        .beasiswa-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .beasiswa-title {
            font-weight: bold;
        }

        .beasiswa-time {
            display: flex;
            align-items: center;
        }

        .beasiswa-time i {
            margin-right: 5px;
        }

        /* Tambahkan margin-top pada section#about */
        section#pricing {
            margin-top: 100px;
        }

        .card {
            font-family: 'Familjen Grotesk', sans-serif;


            &:hover,
            &:focus-within {
                transform: translatey(-3px);
                box-shadow: 0 1rem 1rem rgb(0, 0, 0);
                transform: translateY(-1rem);
                backdrop-filter: blur(1.5rem);
            }

        }

        .card-body .h6 {
            position: relative;
            width: 222px;
            height: 500px;
            background: rgba(255, 255, 255, 0.05);
            margin: 5px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(10px);
            font-size: 20px;
        }
    </style>
@endsection
<div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
    <h1>Prestasi Individu Mahasiswa UCIC</h1>
</div>
@section('content-fe')
    <section id="about" class="about">
        <div class="container">
            <div class="row content d-flex justify-content-center">
                @forelse ($preindividu as $item)
                    <div class="mt-1 mb-5 col-md-4">
                        {{-- card --}}
                        <div class="card card-deck">
                            <img src="{{ asset('storage/' . $item->gambar_1) }}" class="card-img-tip" width="150px"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center"><strong>{{ $item->title }}</strong></h5>
                                <hr>
                                <h6 class="card-text"> Tingkat :
                                    {{ $item->tingkat_kejuaraan }} </h6>
                                @if ($item->categories == null)
                                    <h6 class=" text-muted"><i>tidak ada
                                            kategori</i></h6>
                                @else
                                    <h6 class="text-muted"><i>Kategori :
                                            {{ $item->categories->nama }}</i>
                                    </h6>
                                @endif
                                <h6 class=" text-muted d-flex justify-content-end">Tanggal :
                                    {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }} </h6>
                                <br>
                                <h6 class="card-text"><strong>Nama Peserta : {{ $item->nama }} </strong></h6>

                                @php
                                    $limitedContent = Str::limit($item->deskripsi, 100);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->deskripsi) > 100)
                                    <a href="{{ route('detail-prestasi-individu', $item->id) }}" class="btn btn-primary"
                                        style="float:right">Lihat Detail</a>
                                @endif

                            </div>
                        </div>

                    </div>
                @empty
                    <section id="pricing" class="pricing mb-5">
                        <div class="container">
                            <div class="row content">
                                <div class="col-lg-12">
                                    <br></br>
                                    <br></br>
                                    <h4 class="text-center text-primary">Belum ada informasi data prestasi Individu.</h4>
                                </div>
                            </div>
                        </div>
                    </section><!-- End About Section -->

            </div>
        </div>
    </section><!-- End About Section -->
    @endforelse
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
