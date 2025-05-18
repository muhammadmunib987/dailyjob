@extends('app')
@section('content')

<!-- ======================= Start Banner ===================== -->
<div class="utf_main_banner_area" style="background-image:url(public/assets/img/slider_bg.jpg);height: 350px;" data-overlay="8">
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
              @foreach($topcategories as $category)
              <option value="{{ $category->id }}">{{ $category->title }}</option>
              @endforeach
            </select>
          </div>

          <!-- Dynamic Designation Dropdown -->
          <div class="col-md-3 col-sm-3 padd-0">
            <select class="wide form-control" name="designation">
              <option value="">Select Designation</option>
              @foreach($topdesignations as $designation)
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
<section class="utf_manage_jobs_area padd-top-80 padd-bot-80">
    <div class="container">
        <div class="row">
            <!-- Blog Content (Main Section) -->
            <div class="col-lg-9 col-md-8">
                    <h2>Latest Jobs</h2>
                <div class="table-responsive">
                    <table class="table table-lg table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Location</th>
                                <th>Last Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                            <tr>
                                <td>
                                    <a href="job-detail.html">
                                        <img src="{{ asset('public/assets/img/company_logo_1.png') }}" class="avatar-lg" alt="Avatar">
                                        {{ Str::limit($job->title, 30) }}
                                        <span class="mng-jb">Apple Inc</span>
                                    </a>
                                </td>
                                <td><i class="ti-location-pin"></i> {{ Str::limit($job->location, 30) }}</td>
                                <td><i class="ti-credit-card"></i> {{$job->job_expiry_date}}</td>
                                <td>
                                    <a href="{{ route('job_detail', $job->slug) }}" class="btn theme-btn btn-m">View Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 text-center mrg-top-20">
                    <a href="{{ route('job.search') }}" class="btn theme-btn btn-m">Browse All Jobs</a>
                </div>
            </div>

            <!-- Sidebar (Recent Blogs & Jobs) -->
            <div class="col-lg-3 col-md-4 col-12">
                <div class="row">
                    <!-- Recent Blogs -->
                    <div class="col-lg-12  col-md-12 col-xs-6">
                        <div class="widget">
                            <h4 class="widget-title">Recent Blogs</h4>
                            <div class="row">
                                @foreach($recentBlogs as $recentBlog)
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="blog-card">
                                        <a href="{{ route('blog.detail', $recentBlog->slug) }}">
                                            <div class="blog-card-content d-flex align-items-center">
                                                <img src="{{ asset( ($recentBlog->feature_image ?? 'default_blog.png')) }}" alt="{{ $recentBlog->title }}" class="recent-blog-img">
                                                <div class="blog-text">
                                                    <span class="blog-title">{{ Str::limit($recentBlog->title, 20, '...') }}</span>
                                                    <p class="blog-description">{{ Str::limit($recentBlog->short_description, 25, '...') }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Recent Jobs -->
                    <div class="col-lg-12  col-md-12 col-xs-6">
                        <div class="widget">
                            <h4 class="widget-title">Recent Jobs</h4>
                            <div class="row">
                                @foreach($recentjobs as $job)
                                <div class="col-12 col-md-6 col-lg-12">
                                    <div class="job-card">
                                        <a href="{{ route('job_detail', $job->slug) }}">
                                            <div class="job-content">
                                                <span class="job-title">{{ Str::limit($job->title, 25, '...') }}</span>
                                                <!-- <p class="job-description">{{ Str::limit($job->job_description, 40, '...') }}</p> -->
                                                <p class="job-date">{{ $job->created_at->format('M d, Y') }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div> <!-- End of Sidebar Row -->
            </div> <!-- End of Sidebar -->
        </div> <!-- End of Main Row -->
    </div> <!-- End of Container -->
</section>


<!-- ================= Category start ========================= -->
<section class="utf_job_category_area">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Job Categories</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

        @foreach($topdesignations as $designation)
        <div class="col-md-3 col-sm-6">
          <a href="{{ route('search.jobs', ['id' => Crypt::encrypt($designation->id), 'type' => 'designation']) }}" title="{{ $designation->title }}">
            <div class="utf_category_box_area">
              <div class="utf_category_desc">
                <!-- <div class="utf_category_icon">
                  <i class="icon-bargraph" aria-hidden="true"></i>
                </div> -->
                <div class="category-detail utf_category_desc_text">
                  <h1 style="font-size:22px">{{ $designation->title }}</h1>
                  <p>{{ $designation->jobs_count ?? 0 }} Jobs</p>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach


        <div class="col-md-12 mrg-top-20 text-center">
          <a href="{{route('categories')}}" class="btn theme-btn btn-m">View All Categories</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= Category start ========================= -->
<section class="padd-top-80 padd-bot-60">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2>Latest Blog</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          @foreach($blogs as $blog)
          <div class="col-md-4 mb-4">
              <div class="card blog-card shadow-lg border-0 rounded-lg">
                <div class="blog-image position-relative">
                  <a href="{{ route('blog.detail', $blog->slug) }}">
                    <img src="{{ asset(($blog->feature_image ?? 'assets/img/default_blog.png')) }}" alt="{{ $blog->title }}" class="img-fluid">
                  </a>
                  <span class="badge bg-primary position-absolute top-0 start-0 m-2">New</span>
                </div>
                <div class="card-body blog-content p-4">
                  <h5 class="card-title"><a href="{{ route('blog.detail', $blog->slug) }}" class="text-dark text-decoration-none">{{ Str::limit(strip_tags($blog->title), 40, '...') }}</a></h5>
                  <p class="blog-meta text-muted small"> | {{ $blog->created_at->format('M d, Y') }}</p>
                  <p class="card-text text-secondary">{!! Str::limit(strip_tags($blog->short_description), 80, '...') !!}</p>
                  <a href="{{ route('blog.detail', $blog->slug) }}" class="btn btn-outline-primary btn-sm mt-2">Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ================ Newsletter Section ======================= -->+
@include('include.newsletter')
<!-- ================ End Newsletter Section ======================= -->


@endsection