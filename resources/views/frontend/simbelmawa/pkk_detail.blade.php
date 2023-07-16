@extends('layouts-fe.template')

@section('style-fe')
    <style>
        #blog {
        margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <h2 class="entry-title">
                <a href="#">{{ $pkk->judul }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="2020-01-01">{{ \Carbon\Carbon::parse($pkk->dari_tanggal)->translatedFormat('d F Y') }} -  {{ \Carbon\Carbon::parse($pkk->sampai_tanggal)->translatedFormat('d F Y') }}</time></a></li>
                </ul>
              </div>

              <div class="entry-content">
                {!! nl2br($pkk->deskripsi) !!}
              </div>

            </article><!-- End blog entry -->

          </div><!-- End blog entries list -->

        </div>

      </div>
    </section><!-- End Blog Single Section -->
@endsection

@section('script-fe')
<script>
$('#example').dataTable();
</script>
@endsection
