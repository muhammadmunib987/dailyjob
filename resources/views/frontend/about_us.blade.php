@extends('app')
@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>About Us</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-arrow-right"></i> About Us</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== --> 

<!-- ================ Fill Forms ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <h3 class="mrg-bot-20">Welcome to About Us</h3>
    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
  </div>
</section>
<!-- ================ End Fill Forms ======================= --> 

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
          <div class="input-group"> <span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
            <input type="text" class="form-control" placeholder="Enter your Email...">
          </div>
          <button type="button" class="btn theme-btn btn-radius btn-m">Subscribe</button>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection