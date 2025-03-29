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
                <img src="{{ asset($job->company_logo ?? 'public/assets/img/company_logo_1.png') }}" class="width-100" alt="">
                <h4 class="meg-0">{{ $job->title }}</h4>
                <span>{{ $job->location }}</span>
                <div class="text-center">
                  <button type="button" onclick="applyNow('{{ $job->apply_via }}', '{{ $job->job_contact_email }}', '{{ $job->job_contact_no }}', '{{ $job->company_website }}')" class="btn-job theme-btn job-apply">Apply Now</button>
                </div>
              </div>
              <div class="col-md-8 user_job_detail">
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-credit-card padd-r-10"></i> {{ $job->min_salary }} - {{ $job->max_salary }} /Month</div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-calendar padd-r-10"></i><span class="full-type">{{ ucfirst(optional($job->jobType)->title) }}</span></div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-user padd-r-10"></i><span class="cl-danger">{{ $job->no_of_position }} Open Positions</span></div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-shield padd-r-10"></i>{{ $job->min_experience }} - {{ $job->max_experience }} Year(s) Exp.</div>
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-email padd-r-10"></i>{{ $job->job_contact_email }}</div>
                @if($job->job_contact_no)
                <div class="col-sm-12 mrg-bot-10"> <i class="ti-mobile padd-r-10"></i>{{ $job->job_contact_no }}</div>
                @endif
              </div>
            </div>
          </div>
        </div>

        <!-- Job Description Section -->
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Description</h4>
          </div>
          <div class="detail-wrapper-body">
            <p>{{ $job->job_description }}</p>
          </div>
        </div>

        <!-- Requirements Section -->
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Requirements</h4>
          </div>
          <div class="detail-wrapper-body">
            <ul class="detail-list">
              @foreach(explode("\n", $job->job_requirement) as $requirement)
              <li>{{ trim($requirement) }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <!-- How to Apply Section (Only if available) -->
        @if($job->how_to_apply)
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>How to Apply</h4>
          </div>
          <div class="detail-wrapper-body">
            <p>{{ $job->how_to_apply }}</p>
          </div>
        </div>
        @endif

        <!-- Job Application Form (if exists) -->
        @if($job->document)
        <div class="detail-wrapper">
          <div class="detail-wrapper-header">
            <h4>Job Application Form</h4>
          </div>
          <div class="detail-wrapper-body text-center">
            <!-- Small PDF Preview -->
            <iframe src="{{ asset($job->document) }}" width="100%" height="300px" style="border:1px solid #ccc;"></iframe>

            <!-- Download Button -->
            <div class="text-center mrg-top-10">
              <a href="{{ asset($job->document) }}" class="btn-job theme-btn job-apply" download>Download Form</a>
            </div>
          </div>
        </div>
        @endif

      </div>
      <!-- Sidebar -->
      <div class="col-md-4 col-sm-5">
          <div class="sidebar">
            <div class="widget-boxed">
              <div class="widget-boxed-header">
                <h4><i class="ti-location-pin padd-r-10"></i>Job Overview</h4>
              </div>
              <div class="widget-boxed-body">
                <ul>
                  <li><i class="ti-credit-card padd-r-10"></i>Salary: {{ $job->min_salary }} - {{ $job->max_salary }}</li>
                  @if($job->external_website_link)
                  <li><i class="ti-world padd-r-10"></i><a href="{{ $job->external_website_link }}" target="_blank">Company Website</a></li>
                  @endif
                  <li><i class="ti-email padd-r-10"></i>{{ $job->job_contact_email }}</li>
                  <li><i class="ti-pencil-alt padd-r-10"></i>Education: {{ optional($job->education)->name ?? 'N/A' }}</li>
                  <li><i class="ti-shield padd-r-10"></i>{{ $job->min_experience }} - {{ $job->max_experience }} Years Exp.</li>
                </ul>
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
              <h5><a href="{{ route('job_detail', $similar->id) }}">{{ substr($job->title, 0, 30) }}</a></h5>
              <p class="text-muted">{{ $similar->location }}</p>
            </div>
            <div class="utf_apply_job_btn_item">
              <a href="{{ route('job_detail', $similar->id) }}" class="btn job-browse-btn btn-radius br-light">Apply Now</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  </div>
</section>

@include('include.newsletter')

<script>
  function applyNow(method, email, phone, website) {
    if (method === 'email') {
      window.location.href = "mailto:" + email;
    } else if (method === 'whatsapp') {
      window.location.href = "https://wa.me/" + phone;
    } else if (method === 'external_website') {
      window.open(website, '_blank');
    }
  }
</script>

@endsection