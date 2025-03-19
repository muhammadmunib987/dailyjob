<!-- ================= footer start ========================= -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4">
        <a href="index.html"><img class="footer-logo" src="{{asset('public/assets')}}/img/logo.png" alt=""></a>
        <p>Lorem Ipsum is simply dummy text of printing and type setting industry. Lorem Ipsum been industry standard dummy text ever since.</p>
        <!-- Social Box -->
        <div class="f-social-box">
          <ul>
            <li><a href="#"><i class="fa fa-facebook facebook-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-google google-plus-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter twitter-cl"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram instagram-cl"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9 col-sm-8">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <h4>Job Categories</h4>
            <ul>
              @foreach ($jobCategories as $category)
              <li>
                <a href="{{ route('search.jobs', ['id' => Crypt::encrypt($category->id), 'type' => 'category']) }}">
                  <i class="fa fa-angle-double-right"></i> {{ $category->title }}
                </a>
              </li>
              @endforeach
            </ul>
          </div>

          <div class="col-md-3 col-sm-6">
            <h4>Job Type</h4>
            <ul>
              @foreach ($jobTypes as $type)
              <li>
                <a href="{{ route('search.jobs', ['id' => Crypt::encrypt($type->id), 'type' => 'job_type']) }}">
                  <i class="fa fa-angle-double-right"></i> {{ $type->title }}
                </a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4>Resources</h4>
            <ul>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> My Account</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Support</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> How It Works</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Underwriting</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i> Employers</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6">
            <h4>Quick Links</h4>
            <ul>
              <li><a href="{{ route('page.show', 'about-us') }}"><i class="fa fa-angle-double-right"></i> About Us</a></li>
              <li><a href="{{route('contact-us')}}"><i class="fa fa-angle-double-right"></i> Contact Us</a></li>
              <li><a href="{{ route('page.show', 'privacy-policy') }}"><i class="fa fa-angle-double-right"></i> Privacy Policy</a></li>
              <li><a href="{{ route('page.show', 'terms-conditions') }}"><i class="fa fa-angle-double-right"></i> Term & Condition</a></li>
              <li><a href="{{ route('page.show', 'disclaimer') }}"><i class="fa fa-angle-double-right"></i> Disclaimer</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="copyright text-center">
          <p>Copyright © 2021 All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Signup Code -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="myModalLabel1">
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
          <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#employer" role="tab"> <i class="ti-user"></i> Sign In</a> </li>
          <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#candidate" role="tab"> <i class="ti-user"></i> Sign Up</a> </li>
        </ul>
        <!-- Nav tabs -->
        <!-- Tab panels -->
        <div class="tab-content">
          <!-- Employer Panel 1-->
          <div class="tab-pane fade in show active" id="employer" role="tabpanel">
          <form method="POST" action="{{ route('login') }}">
            @csrf
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <input type="password"  name="password" class="form-control" placeholder="Password">
              </div>
              <div class="form-group"> <span class="custom-checkbox">
                  <input type="checkbox" id="4">
                  <label for="4"></label>
                  Remember Me </span>
                <!-- <a href="#" title="Forget" class="fl-right">Forgot Password?</a>  -->
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn theme-btn full-width btn-m">LogIn</button>
              </div>
            </form>

          </div>
          <!--/.Panel 1-->

          <!-- Candidate Panel 2-->
          <div class="tab-pane fade" id="candidate" role="tabpanel">
            <form method="POST" action="{{ route('register') }}">
              @csrf <!-- Laravel CSRF Protection -->

              <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
              </div>

              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
              </div>

              <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="{{ old('phone') }}" required>
              </div>

              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
              </div>

              <div class="form-group">
                <span class="custom-checkbox">
                  <input type="checkbox" id="remember">
                  <label for="remember"></label>
                  Remember Me
                </span>
              </div>

              <div class="form-group text-center">
                <button type="submit" class="btn theme-btn full-width btn-m">Sign Up</button>
              </div>
            </form>
          </div>

        </div>
        <!-- Tab panels -->
      </div>
    </div>
  </div>
</div>
<!-- End Signup -->
<div><a href="#" class="scrollup">Scroll</a></div>

<!-- Jquery js-->
<script src="{{asset('public/assets')}}/js/jquery.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{asset('public/assets')}}/plugins/bootstrap/js/bootsnav.js"></script>
<script src="{{asset('public/assets')}}/js/viewportchecker.js"></script>
<script src="{{asset('public/assets')}}/js/slick.js"></script>
<script src="{{asset('public/assets')}}/plugins/bootstrap/js/wysihtml5-0.3.0.js"></script>
<script src="{{asset('public/assets')}}/plugins/bootstrap/js/bootstrap-wysihtml5.js"></script>
<script src="{{asset('public/assets')}}/plugins/aos-master/aos.js"></script>
<script src="{{asset('public/assets')}}/plugins/nice-select/js/jquery.nice-select.min.js"></script>
<script src="{{asset('public/assets')}}/js/custom.js"></script>
<script>
  $(window).load(function() {
    $(".page_preloader").fadeOut("slow");;
  });
  AOS.init();
</script>
</body>

<!-- Mirrored from utouchdesign.com/themes/envato/escort/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2025 20:23:48 GMT -->

</html>