@extends('layouts-fe.template')

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
        section#about {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    @forelse ($pretim as $item)
    <section id="about" class="about mb-5">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
            <img style="width:100%" src=" {{ asset('img/ukm/'.($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }} " alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" style="padding-top: 10%!important;">
            <div class="row">
                <div class="left" style="float:left">
                    <h4> <b>{{ $item->title }}</b> </h4>
                </div>
                <div class="right" style="float:right">
                    <p style="float:right"> {{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} -  {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }} </p>
                </div>
            </div>
            <p class="mt-2">{{ $item->content }}</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    @empty
        <section id="about" class="about mb-5">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-12">
                        <br></br>
                        <br></br>
                        <br></br>
                        <h4 class="text-center">Belum ada informasi Prestasi Non Akademik.</h4>
                    </div>
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