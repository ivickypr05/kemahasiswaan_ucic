@extends('layouts-fe.template')

@section('style-fe')
    <style>
        .box {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .box>div {
            width: 100%;
        }

        .box>div:last-child {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .square-image {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .small-square-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
    </style>
@endsection

@section('content-fe')
    <section id="pricing" class="pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h5><b>Halaman Berita</b></h5>
                    </center>
                    <br><br>
                </div>
                @forelse ($berita as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="box">
                            <div>
                                <h5 class="card-title"><b>{{ $item->title }}</b></h5>
                                <p>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} -
                                    {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                            <div class="square-image">
                                <img class="small-square-img"
                                    src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                                    alt="">
                            </div>
                            @php
                                $limitedContent = Str::limit($item->content, 300);
                                $formattedContent = nl2br($limitedContent);
                            @endphp
                            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
                            @if (strlen($item->content) > 200)
                                <a href="{{ route('detail-berita', $item->id) }}" class="btn btn-primary">Read More</a>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-lg-12">
                        <br><br><br>
                        <h4 class="text-center">Belum ada informasi Berita.</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('script-fe')
    <script>
        $('#example').dataTable();
    </script>
@endsection