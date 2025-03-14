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
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-body">
            <div class="search_widget_job">
              <div class="field_w_search">
                <input type="text" class="form-control" placeholder="Search Keywords">
              </div>
              <div class="field_w_search">
                <input type="text" class="form-control" placeholder="All Locations">
              </div>
            </div>
          </div>
        </div>
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-header">
            <h4>Offerd Salary</h4>
          </div>
          <div class="widget-boxed-body">
            <div class="side-list no-border">
              <ul>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="1">
                    <label for="1"></label>
                  </span> Under $10,000 <span class="pull-right">102</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="2">
                    <label for="2"></label>
                  </span> $10,000 - $15,000 <span class="pull-right">78</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="3">
                    <label for="3"></label>
                  </span> $15,000 - $20,000 <span class="pull-right">12</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="4">
                    <label for="4"></label>
                  </span> $20,000 - $30,000 <span class="pull-right">85</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="5">
                    <label for="5"></label>
                  </span> $30,000 - $40,000 <span class="pull-right">307</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-header">
            <h4>Job Type</h4>
          </div>
          <div class="widget-boxed-body">
            <div class="side-list no-border">
              <ul>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="a1">
                    <label for="a1"></label>
                  </span> Full Time <span class="pull-right">102</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="b1">
                    <label for="b1"></label>
                  </span> Part Time <span class="pull-right">78</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="c1">
                    <label for="c1"></label>
                  </span> Internship <span class="pull-right">12</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="d1">
                    <label for="d1"></label>
                  </span> Freelancer <span class="pull-right">85</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="e1">
                    <label for="e1"></label>
                  </span> Contract Base <span class="pull-right">307</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-header br-0">
            <h4>Designation <a href="#designation" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
          </div>
          <div class="widget-boxed-body collapse" id="designation">
            <div class="side-list no-border">
              <ul>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="a">
                    <label for="a"></label>
                  </span> Web Designer <span class="pull-right">102</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="b">
                    <label for="b"></label>
                  </span> Php Developer <span class="pull-right">78</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="c">
                    <label for="c"></label>
                  </span> Project Manager <span class="pull-right">12</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="d">
                    <label for="d"></label>
                  </span> Human Resource <span class="pull-right">85</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="e">
                    <label for="e"></label>
                  </span> CMS Developer <span class="pull-right">307</span>
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="f">
                    <label for="f"></label>
                  </span> App Developer <span class="pull-right">256</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-header br-0">
            <h4>Experince <a href="#experince" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
          </div>
          <div class="widget-boxed-body collapse" id="experince">
            <div class="side-list no-border">
              <ul>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="11">
                    <label for="11"></label>
                  </span> 1Year To 2Year
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="21">
                    <label for="21"></label>
                  </span> 2Year To 3Year
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="31">
                    <label for="31"></label>
                  </span> 3Year To 4Year
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="41">
                    <label for="41"></label>
                  </span> 4Year To 5Year
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="51">
                    <label for="51"></label>
                  </span> 5Year To 7Year
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="61">
                    <label for="61"></label>
                  </span> 7Year To 10Year
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="widget-boxed padd-bot-0">
          <div class="widget-boxed-header br-0">
            <h4>Qualification <a href="#qualification" data-toggle="collapse"><i class="pull-right ti-plus" aria-hidden="true"></i></a></h4>
          </div>
          <div class="widget-boxed-body collapse" id="qualification">
            <div class="side-list no-border">
              <ul>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="12">
                    <label for="12"></label>
                  </span> High School
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="22">
                    <label for="22"></label>
                  </span> Intermediate
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="32">
                    <label for="32"></label>
                  </span> Graduation
                </li>
                <li> <span class="custom-checkbox">
                    <input type="checkbox" id="42">
                    <label for="42"></label>
                  </span> Master Degree
                </li>
              </ul>
            </div>
          </div>
        </div>
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
                                <img src="{{ asset('assets/img/company_logo_1.png') }}" class="img-responsive" alt="">
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
                                    <li><strong>Job Id: </strong>{{ $job->id ?? 'G00000' }}</li>
                                    <li><strong>Job Type: </strong>{{ $job->jobType->title ?? 'Full Time' }}</li>
                                    <li><strong>Skills: </strong>
                                        <div>
                                            <span class="skill-tag">HTML</span>
                                            <span class="skill-tag">CSS</span>
                                            <span class="skill-tag">JavaScript</span>
                                        </div>
                                    </li>
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