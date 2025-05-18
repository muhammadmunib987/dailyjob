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
          <form action="{{ route('subscribe') }}" method="POST">
            @csrf
            <div class="input-group">
              <span class="input-group-addon"><span class="ti-email theme-cl"></span></span>
              <input type="email" class="form-control" name="email" placeholder="Enter your Email..." required>
            </div>
            <button type="submit" class="btn theme-btn btn-radius btn-m">Subscribe</button>
          </form>

          @if(session('message'))
          <p style="margin-top: 10px;">{{ session('message') }}</p>
          @endif
        </div>
      </div>
    </div>

  </div>
</section>