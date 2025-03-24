@extends('app')

@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>{{ $blog->title }}</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> <a href="{{ route('blogs') }}">Blogs</a> <i class="ti-angle-double-right"></i> {{ $blog->title }}</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<section class="padd-top-80 padd-bot-70">
  <div class="container">
    <div class="row">
      <!-- Blog Content -->
      <div class="col-md-9">
        <div class="blog-detail">
          <img src="{{ asset('public/storage/' . ($blog->feature_image ?? 'default_blog.png')) }}" alt="{{ $blog->title }}" class="img-fluid rounded">

          <h2 class="mt-4">{{ $blog->title }}</h2>
          <p class="blog-meta text-muted">By <strong>{{ $blog->author }}</strong> | {{ $blog->created_at ? $blog->created_at->format('M d, Y') : 'Unpublished' }}</p>

          <p class="lead">{!! $blog->short_description !!}</p>
          <div class="blog-content">
            {!! $blog->content !!}
          </div>

          <div class="blog-tags mt-4">
            <strong>Tags:</strong>
            @foreach(json_decode($blog->tags, true) ?? [] as $tag)
            <span class="badge bg-primary">{{ $tag }}</span>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Sidebar -->
      <div class="col-lg-3 col-md-3 col-12">
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
                        <img src="{{ asset('public/storage/' . ($recentBlog->feature_image ?? 'default_blog.png')) }}" alt="{{ $recentBlog->title }}" class="recent-blog-img">
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
                @foreach($jobs as $job)
                <div class="col-12 col-md-6 col-lg-12">
                  <div class="job-card">
                    <a href="{{ route('job_detail', $job->id) }}">
                      <div class="job-content">
                        <span class="job-title">{{ Str::limit($job->title, 25, '...') }}</span>
                        <p class="job-description">{{ Str::limit($job->job_description, 40, '...') }}</p>
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

      <!-- Related Ads Section -->
      @if($relatedAds->count() > 0)
      <div class="row mt-5">
        <div class="col-md-12">
          <h3 class="mb-4">Related Ads</h3>
        </div>
        @foreach($relatedAds as $blog)
        <div class="col-md-4 mb-4">
          <div class="card blog-card shadow-lg border-0 rounded-lg">
            <div class="blog-image position-relative">
              <a href="{{ route('blog.detail', $blog->slug) }}">
                <img src="{{ asset('public/storage/' . ($blog->feature_image ?? 'default_blog.png')) }}" alt="{{ $blog->title }}" class="img-fluid">
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
      @endif
    </div>
</section>


<!-- ================ Newsletter Section ======================= -->
@include('include.newsletter')
<!-- ================ End Newsletter Section ======================= -->
@endsection