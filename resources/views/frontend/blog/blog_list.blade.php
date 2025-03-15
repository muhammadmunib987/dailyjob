@extends('app')

@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Latest Blogs</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> Blogs</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<section class="padd-top-80 padd-bot-60">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-7">
        @foreach($blogs as $blog)
          <div class="blog-card">
            <div class="blog-image">
              <a href="{{ route('blog.detail', $blog->id) }}">
                <img src="{{ asset($blog->image ?? 'assets/img/default_blog.jpg') }}" alt="{{ $blog->title }}">
              </a>
            </div>
            <div class="blog-content">
              <h3><a href="{{ route('blog.detail', $blog->id) }}">{{ $blog->title }}</a></h3>
              <p class="blog-meta">By <strong>{{ $blog->author }}</strong> | {{ $blog->created_at->format('M d, Y') }}</p>
              <p>{{ Str::limit(strip_tags($blog->content), 150, '...') }}</p>
              <a href="{{ route('blog.detail', $blog->id) }}" class="btn theme-btn">Read More</a>
            </div>
          </div>
        @endforeach
        
        <div class="pagination-container">
          {{ $blogs->links() }}
        </div>
      </div>
      
      <!-- Sidebar -->
      <div class="col-md-4 col-sm-5">
        <div class="sidebar">
          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-search padd-r-10"></i>Search Blogs</h4>
            </div>
            <div class="widget-boxed-body">
              <form action="{{ route('blog.search') }}" method="GET">
                <input type="text" name="keyword" class="form-control" placeholder="Search...">
                <button type="submit" class="btn theme-btn">Search</button>
              </form>
            </div>
          </div>

          <div class="widget-boxed">
            <div class="widget-boxed-header">
              <h4><i class="ti-list padd-r-10"></i>Categories</h4>
            </div>
            <div class="widget-boxed-body">
              <ul>
                @foreach($categories as $category)
                  <li><a href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
