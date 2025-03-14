@extends('app')

@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Get In Touch</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> Contact</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ================ Fill Forms ======================= -->
<section class="padd-top-80 padd-bot-70">
  <div class="container">
    <div class="col-md-6 col-sm-6">
      <div class="row">
        @if(session('success'))
          <div class="alert alert-success">
            <strong>Success!</strong> {{ session('success') }}
          </div>
        @endif

        <form class="mrg-bot-40" method="POST" action="{{ route('contact.submit') }}">
          @csrf
          <div class="col-md-6 col-sm-6">
            <label>Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required />
          </div>
          <div class="col-md-6 col-sm-6">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email" required />
          </div>
          <div class="col-md-12 col-sm-12">
            <label>Subject:</label>
            <input type="text" class="form-control" name="subject" placeholder="Subject" required />
          </div>
          <div class="col-md-12 col-sm-12">
            <label>Message:</label>
            <textarea class="form-control height-120" name="message" placeholder="Message" required></textarea>
          </div>

          <!-- Google reCAPTCHA -->
          <div class="col-md-12 col-sm-12">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
            @error('g-recaptcha-response')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>

          <div class="col-md-12 col-sm-12">
            <button class="btn theme-btn" type="submit">Send Message</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-md-6 col-sm-6">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.566512514854!2d76.8192921147794!3d30.702470481647698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fecca1d6c0001%3A0xe4953728a502a8e2!2sChandigarh!5e0!3m2!1sen!2sin!4v1520136168627" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </div>
</section>
<!-- ================ End Fill Forms ======================= -->

@endsection
