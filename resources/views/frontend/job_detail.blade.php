@extends('app')

@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>{{ $job->title }}</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> {{ $job->title }}</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== --> 

<section class="padd-top-80 padd-bot-60">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        <div class="detail-wrapper">
          <div class="detail-wrapper-body">
            <div class="row">
              <div class="col-md-4 text-center user_profile_img">
                <img src="{{ asset($job->company_logo ?? 'assets/img/company_logo_1.png') }}" class="width-100" alt="">
                <h4 class="meg-0">{{ $job->title }}</h4>
                <span>{{ $job->company_address }}</span> 
                <div class="text-center">
                  <button type="button" data-toggle="modal" data-target="#signin" class="btn-job theme-btn job-apply">Apply Now</button>
                </div>
              </div>
              <div class="col-md-8 user_job_detail">
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-credit-card padd-r-10"></i>{{ $job->salary }} </div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-mobile padd-r-10"></i>{{ $job->contact_number }}</div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-email padd-r-10"></i>{{ $job->contact_email }}</div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-calendar padd-r-10"></i><span class="full-type">{{ ucfirst($job->job_type) }}</span></div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-user padd-r-10"></i><span class="cl-danger">{{ $job->open_positions }} Open Positions</span></div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-shield padd-r-10"></i>{{ $job->experience }} Year(s) Exp. </div>
              </div>
            </div>
          </div>
        </div>

        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Description</h4>
          </div>
          <div class="detail-wrapper-body">
            <p>{{ $job->description }}</p>
          </div>
        </div>

        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Skills</h4>
          </div>
          <div class="detail-wrapper-body">
            <ul class="detail-list">
              @foreach(explode(',', $job->skills) as $skill)
                <li>{{ trim($skill) }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Location</h4>
          </div>
          <div class="detail-wrapper-body">
            <iframe src="https://www.google.com/maps?q={{ urlencode($job->location) }}&output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen=""></iframe>
          </div>
        </div>

        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Requirements</h4>
          </div>
          <div class="detail-wrapper-body">
            <ul class="detail-list">
              @foreach(explode("\n", $job->requirements) as $requirement)
                <li>{{ trim($requirement) }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-md-4 col-sm-5">
        <div class="sidebar"> 
          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-location-pin padd-r-10"></i>Job Overview</h4>
            </div>
            <div class="widget-boxed-body">
              <div class="side-list no-border">
                <ul>
                  <li><i class="ti-credit-card padd-r-10"></i>Package: {{ $job->salary }}</li>
                  <li><i class="ti-world padd-r-10"></i><a href="{{ $job->company_website }}" target="_blank">{{ $job->company_website }}</a></li>
                  <li><i class="ti-mobile padd-r-10"></i>{{ $job->contact_number }}</li>
                  <li><i class="ti-email padd-r-10"></i>{{ $job->contact_email }}</li>
                  <li><i class="ti-pencil-alt padd-r-10"></i>{{ $job->education }}</li>
                  <li><i class="ti-shield padd-r-10"></i>{{ $job->experience }} Year Exp.</li>
                </ul>                
              </div>
            </div>
          </div>

          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-time padd-r-10"></i>Opening Hours</h4>
            </div>
            <div class="widget-boxed-body">
              <div class="side-list">
                <ul>
                  <li>Monday <span>9 AM - 5 PM</span></li>
                  <li>Tuesday <span>9 AM - 5 PM</span></li>
                  <li>Wednesday <span>9 AM - 5 PM</span></li>
                  <li>Thursday <span>9 AM - 5 PM</span></li>
                  <li>Friday <span>9 AM - 5 PM</span></li>
                  <li>Saturday <span>9 AM - 3 PM</span></li>
                  <li>Sunday <span>Closed</span></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-time padd-r-10"></i>Location</h4>
            </div>
            <div class="widget-boxed-body">
              <iframe src="https://www.google.com/maps?q={{ urlencode($job->location) }}&output=embed" width="100%" height="360" frameborder="0" style="border:0" allowfullscreen=""></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Similar Jobs Section -->
    <div class="row">
      <div class="col-md-12">
        <h4 class="mrg-bot-30">Similar Jobs</h4>
      </div>
    </div>
    <div class="row">
      @foreach($similar_jobs as $similar)
        <div class="col-md-3 col-sm-6">
          <div class="utf_grid_job_widget_area">
            <span class="job-type {{ $similar->job_type }}">{{ ucfirst($similar->job_type) }}</span>
            <div class="u-content">
              <div class="avatar box-80"> <img class="img-responsive" src="{{ asset($similar->company_logo) }}" alt=""> </div>
              <h5><a href="{{ route('job.detail', $similar->id) }}">{{ $similar->title }}</a></h5>
              <p class="text-muted">{{ $similar->location }}</p>
            </div>
            <div class="utf_apply_job_btn_item">
              <a href="{{ route('job.detail', $similar->id) }}" class="btn job-browse-btn btn-radius br-light">Apply Now</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@endsection
