@extends('layouts-fe.template')

@section('style-fe')
<style>
  section#contact {
    margin-top: 100px;
  }
</style>

@endsection

@section('content-fe')

    <section id="contact" class="contact mb-5">
      <div class="container">

        <div class="row content">
          <div class="col-lg-6">
                <iframe style="border:0; width: 100%; height: 320px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.296980321091!2d108.55121841424463!3d-6.733576795132232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1d8ebc133e3f%3A0x91385801f5822049!2sUNIVERSITAS%20CIC!5e0!3m2!1sen!2sid!4v1677997552754!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" >
          <h5 style="text-align:center">
            Hubungi Kami
          </h5>
            <div class="row">
                 <form action="{{ route('send-mail') }}" method="post" >
                 @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="msg" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div style="float:left"><button type="submit" class="btn mt-2 btn-primary">Send</button></div>
                </form>
            </div>
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