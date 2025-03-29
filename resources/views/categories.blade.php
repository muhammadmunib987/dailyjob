@extends('app')
@section('content')
<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Job Categories</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> Job Categories</p>
    </div>
  </div>
</div>

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

      </div>
    </div>
  </div>
</section>

@include('include.newsletter')


@endsection