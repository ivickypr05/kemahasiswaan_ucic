@extends('layouts-fe.app')

@section('style-fe')

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
  
@endsection

@section('script-fe')
<script>
$('#example').dataTable();
</script>
@endsection