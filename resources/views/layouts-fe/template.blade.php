<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts-fe.partials.head')
    @yield('style-fe')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts-fe.partials.navbar')

  <!-- End Header -->

  <main id="main">

    @yield('content-fe')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts-fe.partials.footer')

  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('layouts-fe.partials.foot')

  @yield('script-fe')

</body>

</html>
