@extends('app')
@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title" style="background-image: url('{{ asset($page->banner_image) }}'); background-size: cover; background-position: center;">
  <div class="container">
    <div class="page-caption">
      <h2>{{ $page->title }}</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-arrow-right"></i> {{ $page->title }}</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== --> 

<!-- ================ Page Content ======================= -->

  <div class="container-fluid">
    <!-- <h3 class="mrg-bot-20">{{ $page->title }}</h3> -->
    {!! $page->content !!}

  </div>

<!-- ================ End Page Content ======================= --> 

<!-- ================ Newsletter Section ======================= -->
@include('include.newsletter')
<!-- ================ End Newsletter Section ======================= -->
<style>
  
</style>
@endsection
