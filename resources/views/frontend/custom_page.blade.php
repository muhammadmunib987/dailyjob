@extends('app')
@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title" style="background-image: url('{{ asset("/storage/assets/img/" . $page->banner_image) }}'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="page-caption">
      <h2>{{ $page->title }}</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-arrow-right"></i> {{ $page->title }}</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== --> 

<!-- ================ Page Content ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <h3 class="mrg-bot-20">{{ $page->title }}</h3>
    <div>{!! $page->content !!}</div>
  </div>
</section>
<!-- ================ End Page Content ======================= --> 

<!-- ================ Newsletter Section ======================= -->
<section class="newsletter theme-bg" style="background-image:url(assets/img/bg-new.png)">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading light">
          <h2>Subscribe Our Newsletter!</h2>
          <p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
        <div class="newsletter-box text-center">
          <div class="input-group"> 
            <span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
            <input type="text" class="form-control" placeholder="Enter your Email...">
          </div>
          <button type="button" class="btn theme-btn btn-radius btn-m">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ End Newsletter Section ======================= -->

@endsection
