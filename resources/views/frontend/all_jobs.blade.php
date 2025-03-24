@extends('app')
@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Brose Job</h2>
      <p><a href="#" title="Home">Home</a> <i class="ti-angle-double-right"></i> Browse Job</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== -->

<!-- ================ Fill Forms ======================= -->

<section class="padd-top-80 padd-bot-80">
  <div class="container">
    <div class="row">

    
    <div class="col-md-3 col-sm-5">
    <form method="GET" action="{{ route('job.search') }}">
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-body">
                <div class="search_widget_job">
                    <div class="field_w_search">
                        <input type="text" class="form-control" name="keyword" placeholder="Search Keywords" value="{{ request('keyword') }}">
                    </div>
                    <div class="field_w_search">
                        <input type="text" class="form-control" name="location" placeholder="All Locations" value="{{ request('location') }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Salary Filter -->
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-header"><h4>Offered Salary</h4></div>
            <div class="widget-boxed-body">
                <div class="side-list no-border">
                    <ul>
                        @foreach([
                            '1' => 'Under $10,000',
                            '2' => '$10,000 - $15,000',
                            '3' => '$15,000 - $20,000',
                            '4' => '$20,000 - $30,000',
                            '5' => '$30,000 - $40,000'
                        ] as $key => $label)
                        <li>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="salary_{{ $key }}" name="salary[]" value="{{ $key }}" {{ in_array($key, (array)request('salary', [])) ? 'checked' : '' }}>
                                <label for="salary_{{ $key }}"></label>
                            </span> {{ $label }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Job Type Filter -->
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-header"><h4>Job Type</h4></div>
            <div class="widget-boxed-body">
                <div class="side-list no-border">
                    <ul>
                        @foreach($jobTypes as $jobType)
                        <li>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="job_type_{{ $jobType->id }}" name="job_type[]" value="{{ $jobType->id }}" {{ in_array($jobType->id, (array)request('job_type', [])) ? 'checked' : '' }}>
                                <label for="job_type_{{ $jobType->id }}"></label>
                            </span> {{ $jobType->title }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Designation Filter -->
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-header br-0">
                <h4>Designation <a href="#designation" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
            </div>
            <div class="widget-boxed-body collapse" id="designation">
                <div class="side-list no-border">
                    <ul>
                        @foreach($designations as $designation)
                        <li>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="designation_{{ $designation->id }}" name="designation[]" value="{{ $designation->id }}" {{ in_array($designation->id, (array)request('designation', [])) ? 'checked' : '' }}>
                                <label for="designation_{{ $designation->id }}"></label>
                            </span> {{ $designation->title }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Experience Filter -->
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-header br-0">
                <h4>Experience <a href="#experience" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
            </div>
            <div class="widget-boxed-body collapse" id="experience">
                <div class="side-list no-border">
                    <ul>
                        @foreach([
                            '11' => '1 Year To 2 Year',
                            '21' => '2 Year To 3 Year',
                            '31' => '3 Year To 4 Year',
                            '41' => '4 Year To 5 Year',
                            '51' => '5 Year To 7 Year',
                            '61' => '7 Year To 10 Year'
                        ] as $key => $label)
                        <li>
                            <span class="custom-checkbox">
                                <input type="checkbox" id="experience_{{ $key }}" name="experience[]" value="{{ $key }}" {{ in_array($key, (array)request('experience', [])) ? 'checked' : '' }}>
                                <label for="experience_{{ $key }}"></label>
                            </span> {{ $label }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Job Shift -->
        <div class="widget-boxed padd-bot-0">
            <div class="widget-boxed-header"><h4>Job Shift</h4></div>
            <div class="widget-boxed-body">
                <div class="side-list no-border">
                    <ul>
                        <li><span class="custom-checkbox">
                            <input type="checkbox" id="shift_morning" name="job_shift[]" value="Morning" {{ in_array('Morning', (array)request('job_shift', [])) ? 'checked' : '' }}>
                            <label for="shift_morning"></label>
                        </span> Morning</li>
                        <li><span class="custom-checkbox">
                            <input type="checkbox" id="shift_evening" name="job_shift[]" value="Evening" {{ in_array('Evening', (array)request('job_shift', [])) ? 'checked' : '' }}>
                            <label for="shift_evening"></label>
                        </span> Evening</li>
                        <li><span class="custom-checkbox">
                            <input type="checkbox" id="shift_night" name="job_shift[]" value="Night" {{ in_array('Night', (array)request('job_shift', [])) ? 'checked' : '' }}>
                            <label for="shift_night"></label>
                        </span> Night</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="col-md-12 col-sm-12">
            <button class="btn theme-btn" type="submit">Search Jobs</button>
        </div>
    </form>
</div>


      <!-- Start Job List -->

      <div class="col-md-9 col-sm-7">
        <div class="row mrg-bot-20">
            <div class="col-md-4 col-sm-12 col-xs-12 browse_job_tlt">
                <h4 class="job_vacancie">{{ $jobs->total() }} Jobs &amp; Vacancies</h4>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="fl-right short_by_filter_list">
                    <div class="search-wide short_by_til">
                        <h5>Sort By</h5>
                    </div>
                    <div class="search-wide full">
                        <select class="wide form-control" id="sort_by">
                            <option value="most_recent">Most Recent</option>
                            <option value="most_viewed">Most Viewed</option>
                            <option value="most_searched">Most Searched</option>
                        </select>
                    </div>
                    <div class="search-wide full">
                        <select class="wide form-control" id="per_page">
                            <option value="10">10 Per Page</option>
                            <option value="20">20 Per Page</option>
                            <option value="30">30 Per Page</option>
                            <option value="50">50 Per Page</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($jobs as $job)
            <div class="job-verticle-list">
                <div class="vertical-job-card">
                    <div class="vertical-job-header">
                        <div class="vrt-job-cmp-logo">
                            <a href="{{ route('job_detail', $job->id) }}">
                                <img src="{{ asset('public/assets/img/company_logo_1.png') }}" class="img-responsive" alt="">
                            </a>
                        </div>
                        <h4><a href="{{ route('job_detail', $job->id) }}">{{ $job->title ?? 'Job Title' }}</a></h4>
                        <span class="com-tagline">{{ $job->category->title ?? 'Software Development' }}</span>
                        <span class="pull-right vacancy-no">No. <span class="v-count">{{ $job->no_of_position ?? 1 }}</span></span>
                    </div>
                    <div class="vertical-job-body">
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-xs-12">
                                <ul class="can-skils">
                                    <li><strong>Job Posted: </strong>{{ $job->created_at->diffForHumans() }}</li>
                                    <li><strong>Job Type: </strong>{{ $job->jobType->title ?? 'Full Time' }}</li>
                                    @if(count($job->skills)>0)
                                    <li><strong>Skills: </strong>
                                        <div>
                                            @foreach($job->skills as $skill)
                                             <span class="skill-tag">{{$skill->title}}</span>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    <li><strong>Experience: </strong>{{ $job->min_experience ?? 0 }} - {{ $job->max_experience ?? 'N/A' }} Years</li>
                                    <li><strong>Location: </strong>{{ $job->location ?? 'Not specified' }}</li>
                                </ul>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="vrt-job-act">
                                    <a href="#" data-toggle="modal" data-target="#apply-job" class="btn-job theme-btn job-apply">Apply Now</a>
                                    <a href="{{ route('job_detail', $job->id) }}" class="btn-job light-gray-btn">View Job</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="clearfix"></div>

        <!-- pagination desgin   -->
        <div class="utf_flexbox_area padd-0">
    @if ($jobs->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($jobs->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">«</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $jobs->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($jobs->links()->elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $jobs->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($jobs->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $jobs->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">»</span>
                </li>
            @endif
        </ul>
    @endif
</div>



    </div>


    </div>
    <!-- End Row -->
  </div>
</section>

<!-- ================ End Fill Forms ======================= -->

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