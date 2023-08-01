@extends('layouts-fe.app')

@section('style-fe')
<style>

.box {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.box > div {
  width: 100%;
}

.box > div:last-child {
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


</style>

@endsection

@section('content-fe')


    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
  
          <div class="row content">
            <div class="col-lg-6">
              <h4> <b>Tentang Kemahasiswaan UCIC</b> </h4>
              <p>Selamat datang di Kemahasiswaan UCIC - Portal Informasi dan Layanan Mahasiswa yang dirancang khusus untuk memberikan informasi yang relevan dan layanan yang dibutuhkan oleh para mahasiswa. Di sini, Anda akan menemukan berbagai fitur dan konten yang akan membantu Anda dalam menjalani kehidupan kampus yang sukses dan memuaskan.</p>
              <p>Melalui portal ini, Anda dapat mengakses pengumuman penting, Layanan Kemahasiswaan, serta informasi akademik dan non-akademik lainnya dengan mudah. Kami juga menyediakan layanan beasiswa untuk mendukung keuangan Anda selama studi di UCIC. Informasi terkait berbagai kesempatan beasiswa dan prosedur aplikasi dapat ditemukan di halaman Beasiswa kami.</p>
              <p>Selain itu, kami juga memperhatikan peran organisasi kemahasiswaan dalam pengembangan diri mahasiswa. Kami memiliki Unit Kegiatan Mahasiswa (UKM) dan Badan Eksekutif Mahasiswa (BEM) yang merupakan wadah bagi Anda untuk mengekspresikan minat dan bakat serta berpartisipasi dalam pengembangan kampus. Kami mendorong Anda untuk bergabung dengan UKM sesuai minat Anda dan aktif dalam kegiatan BEM untuk memperoleh pengalaman berharga di luar lingkungan akademik.</p>
            </div>
            <div class="col-lg-6">
            <img style="width:100%" src="https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2023/02/24/1272804305.jpg" alt="">
          </div>
          </div>
  
        </div>
    </section><!-- End About Section -->

  <section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Beasiswa</b></h5></center>
        <br><br>
      </div>
      @foreach ($beasiswa->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->title }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->content, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->content) > 200)
              <a href="{{ route('detail-beasiswa', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Prestasi Tim</b></h5></center>
        <br><br>
      </div>
      @foreach ($pretim->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->title }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar_1 ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <p class="btn btn-primary">Read More</p>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Prestasi Individu</b></h5></center>
        <br><br>
      </div>
      @foreach ($preindividu->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->title }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar_1 ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <p class="btn btn-primary">Read More</p>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Organisasi BKM</b></h5></center>
        <br><br>
      </div>
      @foreach ($bkm->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->nama_kegiatan }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <a href="{{ route('detail-bkm', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Organisasi UKM</b></h5></center>
        <br><br>
      </div>
      @foreach ($ukm->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->nama_ukm }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <a href="{{ route('detail-ukm', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Organisasi HIMA</b></h5></center>
        <br><br>
      </div>
      @foreach ($hima->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->nama_himpunan }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }} </p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <a href="{{ route('detail-hima', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar PKM</b></h5></center>
        <br><br>
      </div>
      @foreach ($pkm->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->judul }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }} </p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <a href="{{ route('detail-pkm', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar PPK Ormawa</b></h5></center>
        <br><br>
      </div>
      @foreach ($pkk->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->judul }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }} </p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
                alt="">
            </div>

            @php
            $limitedContent = Str::limit($item->deskripsi, 300);
            $formattedContent = nl2br($limitedContent);
            @endphp
            <p class="mt-2" style="text-align: justify;">{!! $formattedContent !!}</p>
            @if (strlen($item->deskripsi) > 200)
              <a href="{{ route('detail-pkk', $item->id) }}" class="btn btn-primary">Read More</a>
            @endif
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>

<section id="pricing" class="pricing">
  <div class="container">

    <div class="row">
    <div class="col-lg-12">
        <center><h5><b>Daftar Berita</b></h5></center>
        <br><br>
      </div>
      @foreach ($berita->take(3) as $item)
        <div class="col-lg-4 col-md-6">
          <div class="box">
            <div>
              <h5 class="card-title"><b>{{ $item->title }}</b></h5>
              <p>{{ \Carbon\Carbon::parse($item->dari_tanggal)->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item->sampai_tanggal)->translatedFormat('d F Y') }}</p>
            </div>

            <div class="square-image">
              <img class="small-square-img" src="{{ asset('storage/' . ($item->gambar ?? 'https://c4.wallpaperflare.com/wallpaper/94/602/369/surface-light-silver-background-wallpaper-preview.jpg')) }}"
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
      @endforeach
    </div>

  </div>
</section>
  
@endsection

@section('script-fe')
<script>
$('#example').dataTable();
</script>
@endsection