
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts-fe.partials.head')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts-fe.partials.navbar')

  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url('https://aboutcirebon.id/wp-content/uploads/2021/01/22.jpg')">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Selamat datang di <span>Portal Kemahasiswaan</span> UCIC </h2>
              <p class="animate__animated animate__fadeInUp">Kemahasiswaan UCIC adalah website untuk menyampaikan informasi bagi para mahasiswa.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url('https://aboutcirebon.id/wp-content/uploads/2021/01/22.jpg')">
          <div class="carousel-container">
            <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Selamat datang di <span>Portal Kemahasiswaan</span> UCIC </h2>
              <p class="animate__animated animate__fadeInUp">Portal Kemahasiswaan UCIC merupakan sebuah platform yang dirancang khusus untuk memenuhi kebutuhan informasi mahasiswa.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url('https://aboutcirebon.id/wp-content/uploads/2021/01/22.jpg')">
          <div class="carousel-container">
            <div class="container">
            <h2 class="animate__animated animate__fadeInDown">Selamat datang di <span>Portal Kemahasiswaan</span> UCIC </h2>
              <p class="animate__animated animate__fadeInUp">Di sini, Anda akan menemukan berbagai informasi terkait kegiatan kampus, acara akademik dan non-akademik, pendaftaran mata kuliah, jadwal kuliah, pengumuman penting, dan banyak lagi.</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

  @yield('content-fe')


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts-fe.partials.footer')

  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts-fe.partials.foot')


</body>

</html>