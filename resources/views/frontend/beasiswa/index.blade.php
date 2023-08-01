@extends('layouts-fe.template')
@section('title', 'UCIC | Beasiswa')
@section('style-fe')
    <style>
        .square-image {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            position: relative;
            overflow: hidden;
        }

        .square-image img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: auto;
            height: 100%;
            object-fit: cover;
            object-position: center center;
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
            margin-top: 10px;
        }
    </style>
@endsection
<div class="container d-flex justify-content-center" style="padding-top: 10%!important;">
    <h1>Beasiswa Universitas Catur Insan Cendekia</h1>
</div>
@section('content-fe')
    <section id="pricing" class="pricing">
        <div class="container">
            @forelse ($beasiswa->chunk(2) as $chunk)
                <div class="row content">
                    @foreach ($chunk as $item)
                        <div class="col-lg-6 col-md-6">
                            <div class="box" style="margin-top: 20px;">
                                <div class="square-image">
                                    <img src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                        alt="">
                                </div>
                                <br>
                                <div class="beasiswa-info">
                                    <div class="beasiswa-title">
                                        <h5 class="card-title"><b>{{ $item->title }}</b></h5>
                                    </div>
                                    <div class="beasiswa-time">
                                        <i class="fa fa-calendar"></i>
                                        <p>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} -
                                            {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                @php
                                    $limitedContent = Str::limit($item->content, 300);
                                    $formattedContent = nl2br($limitedContent);
                                @endphp
                                <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                                @if (strlen($item->content) > 200)
                                    <a href="{{ route('detail-beasiswa', $item->id) }}" class="btn btn-primary">Read
                                        More</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <section id="pricing" class="pricing mb-5">
                    <div class="container">
                        <div class="row content">
                            <div class="col-lg-12">
                                <br></br>
                                <h4 class="text-center text-primary">Belum ada informasi Beasiswa.</h4>
                            </div>
                        </div>
                    </div>
                </section><!-- End About Section -->
            @endforelse
        </div>
    </section><!-- End About Section -->
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection
