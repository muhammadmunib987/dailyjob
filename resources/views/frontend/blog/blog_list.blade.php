@extends('app')

@section('content')

<!-- ======================= Page Title ===================== -->

<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Latest Blogs</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> 
      Blogs</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<section class="padd-top-80 padd-bot-60">
  <div class="container">
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

        <div class="pagination-container d-flex justify-content-center mt-4">
          {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================ Newsletter Section ======================= -->
@include('include.newsletter')
<!-- ================ End Newsletter Section ======================= -->

@endsection