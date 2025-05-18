@extends('app')
@section('content')

<!-- ======================= Page Title ===================== -->
<div class="page-title">
  <div class="container">
    <div class="page-caption">
      <h2>Create an Account</h2>
      <p><a href="{{ url('/') }}" title="Home">Home</a> <i class="ti-angle-double-right"></i> SignUp</p>
    </div>
  </div>
</div>
<!-- ======================= End Page Title ===================== --> 

<!-- ================ Fill Forms ======================= -->
<section class="padd-top-80 padd-bot-80">
  <div class="container">
      <div class="log-box">
        <form class="log-form" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" >
                <!-- @error('name') 
                  <span class="text-danger">{{ $message }}</span> 
                @enderror -->
              </div>
            </div>

            <!-- Email -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" >
                @error('email') 
                  <span class="text-danger">{{ $message }}</span> 
                @enderror
              </div>
            </div>

              <!-- Phone -->
              <div class="col-md-4">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                @error('phone') 
                  <span class="text-danger">{{ $message }}</span> 
                @enderror
              </div>
            </div>
            
            <!-- Password -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="********" >
                @error('password') 
                  <span class="text-danger">{{ $message }}</span> 
                @enderror
              </div>
            </div>

            <!-- Confirm Password -->
            <div class="col-md-4">
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" placeholder="********" >
                @error('password_confirmation') 
                  <span class="text-danger">{{ $message }}</span> 
                @enderror
              </div>
            </div>          


            <!-- Submit Button -->
            <div class="col-md-12">
              <div class="form-group text-center mrg-top-15">
                <button type="submit" class="btn theme-btn btn-m full-width">Sign Up</button>
              </div>
            </div>

            <div class="clearfix"></div>			
        </form>
      </div>
  </div>
</section>

@endsection
