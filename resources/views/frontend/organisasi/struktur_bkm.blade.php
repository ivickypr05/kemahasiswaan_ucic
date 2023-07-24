@extends('layouts-fe.template')

@section('style-fe')
    <style>
        .square-image {
            width: 100%;
            height: 0;
            padding-bottom: 75%;
            position: relative;
            overflow: hidden;
        }

        .square-image img {
            position: absolute;
            /* top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
            width: 100%;
            height: 100%;
            /* object-fit: cover;
            object-position: center center; */
        }

        .content {
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .text-container {
        text-align: center;
        }

        section#about {
            margin-top: 100px;
        }
    </style>
@endsection

@section('content-fe')
    @forelse ($strukturbkm as $item)
        <section id="about" class="about mb-5">
            <div class="container">
                <div class="row content">
                    <div class="col-lg-6">
                        <div class="square-image">
                            <h3 class="text-center">Struktur Organisasi BKM</h3>
                            <br><br>
                            <img src="{{ asset('storage/' . ($item->struktur_bkm)) }}"
                                alt="">
                        </div>
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
                        <h4 class="text-center">Belum ada Struktur Organisasi BKM.</h4>
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
