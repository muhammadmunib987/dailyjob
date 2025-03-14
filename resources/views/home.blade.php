@extends('app')
@section('content')

<!-- ======================= Start Banner ===================== -->
<div class="utf_main_banner_area" style="background-image:url(assets/img/slider_bg.jpg);" data-overlay="8">
  <div class="container">
    <div class="col-md-8 col-sm-10">
      <div class="caption cl-white home_two_slid">
        <h2>Search Between More Then <span class="theme-cl">50,000</span> Open Jobs.</h2>
        <p>Trending Jobs Keywords: <span class="trending_key"><a href="#">Web Designer</a></span> <span class="trending_key"><a href="#">Web Developer</a></span> <span class="trending_key"><a href="#">IOS Developer</a></span> <span class="trending_key"><a href="#">Android Developer</a></span></p>
      </div>
      <form method="GET" action="{{ route('job.search') }}">
    <fieldset class="utf_home_form_one">
        <div class="col-md-4 col-sm-4 padd-0">
            <input type="text" name="keyword" class="form-control br-1" placeholder="Search Keywords..." />
        </div>
        

        <!-- Dynamic Category Dropdown -->
        <div class="col-md-3 col-sm-3 padd-0">
            <select class="wide form-control" name="category">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dynamic Designation Dropdown -->
        <div class="col-md-3 col-sm-3 padd-0">
            <select class="wide form-control" name="designation">
                <option value="">Select Designation</option>
                @foreach($designations as $designation)
                    <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 col-sm-2 padd-0 m-clear">
            <button type="submit" class="btn theme-btn cl-white seub-btn">Search</button>
        </div>
    </fieldset>
</form>

    </div>
  </div>
</div>
<!-- ======================= End Banner ===================== -->

<!-- ================= Job start ========================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <ul class="nav nav-tabs nav-advance theme-bg" role="tablist">
      <li class="nav-item active"> <a class="nav-link" data-toggle="tab" href="#recent" role="tab"> Latest Jobs</a> </li>
      <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#" role="tab"> Recent Jobs</a> </li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane fade in show active" id="recent" role="tabpanel">
        <div class="row">
          <!-- Single Job -->
          @foreach ($jobs as $job)
          <div class="col-md-3 col-sm-6">
            <div class="utf_grid_job_widget_area">
              <span class="job-type full-type">{{ $job->jobType->title ?? 'Full Time' }}</span>

              <div class="utf_job_like">
                <label class="toggler toggler-danger">
                  <input type="checkbox">
                  <i class="fa fa-heart"></i>
                </label>
              </div>

              <div class="u-content">
                <div class="avatar box-80">
                  <a href="#">
                    <img class="img-responsive" src="{{ asset('assets/img/company_logo_1.png') }}" alt="">
                  </a>
                </div>
                <h6><a href="{{ route('job_detail', $job->id) }}">{{ $job->title }}</a></h6>
                <p class="text-muted">{{ $job->location }}</p>
              </div>

              <div class="utf_apply_job_btn_item">
                <a href="{{ route('job_detail', $job->id) }}" class="btn job-browse-btn btn-radius br-light">View Detail</a>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>

    </div>
    <div class="col-md-12 mrg-top-20 text-center">
      <a href="{{route('job.search')}}" class="btn theme-btn btn-m">Browse All Jobs</a>
    </div>
  </div>
</section>

<!-- ================= Category start ========================= -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Job Categories</h2>
          <p>Lorem Ipsum is simply dummy text printing and type setting industry Lorem Ipsum been industry standard dummy text ever since when unknown printer took a galley.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        @foreach($designations as $designation)
        <div class="col-md-3 col-sm-6">
          <a href="{{ route('search.jobs', ['id' => Crypt::encrypt($designation->id), 'type' => 'designation']) }}" title="{{ $designation->title }}">
            <div class="utf_category_box_area">
              <div class="utf_category_desc">
                <div class="utf_category_icon">
                  <i class="{{ $designation->icon }}" aria-hidden="true"></i>
                </div>
                <div class="category-detail utf_category_desc_text">
                  <h4>{{ $designation->title }}</h4>
                  <p>{{ $designation->jobs_count ?? 0 }} Jobs</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach


        <div class="col-md-12 mrg-top-20 text-center">
          <a href="browse-category.html" class="btn theme-btn btn-m">View All Categories</a>
        </div>
      </div>
    </div>
  </div>
</section>

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