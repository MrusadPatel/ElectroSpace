@extends('user.dashboard.layouts.master')

@section('content')

<section class="mt-5 pt-5  bg-secondary">
    <div class="container-fluid">
        <div class="row">
            
            @include('user.dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <div class="container">
                        <div class="page-inner">
                       <h3 class="h3 ps-3"><span class="me-3"><i class="bi bi-person-fill"></i></span>Profile</h3>
                        <div class="page-category">
                    
                            <!-- Begin Page Content -->
                            <div class="container">
                             <div class="row justify-content-center"> 
                                <div class="col-12 col-md-12 mb-3 ">  
                                    <div class="card">
                                            
                                            <form action="{{ url('/redirect/user/profile') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-header">
                                                    <p class="h4">Basic Information</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <div width="130px" height="150px"  class="mb-3">
                                                                    <img src="{{Auth::user()->profile_photo_path ? asset(Auth::user()->profile_photo_path) : asset('user/images/default_profile_photot.jpg') }}" width="130px" height="150px"   alt="">
                                                                </div>
                                                                
                                                                <input type="file" name="image" class="form-control" id="fullName">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="fullName" class="form-label">Name</label>
                                                                <input type="text" name="name" class="form-control" id="fullName" value="{{ Auth::user()->name }}" placeholder="Enter your full name">
                                                            </div>
                                                        </div>
                                                                                                                
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="mobileNo" class="form-label">Mobile Number</label>
                                                                <input type="number" name="mobileno" class="form-control" id="mobileNo" value="" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email address</label>
                                                                <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}"  placeholder="Enter your email">
                                                            </div>
                                                        </div>
                                                                                         
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Profile</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                    
                                <!-- Change password card starts here -->
                                <div class="col-12 col-md-12 ">  
                                    <div class="card">
                                        @if ($errors->any())
                                            @foreach ($errors->all() as $error)
                                            <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
                                                <div class="d-flex">
                                                  <div class="toast-body">
                                                    <p class="mb-0 fw-bold">{{ $error }}</p>
                                                  </div>
                                                  <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                                </div>
                                              </div>
                                            @endforeach
                                        @endif
                                            <form action="{{ route('user.profile.update.password') }}" method="post" >
                                                @csrf
                                                <div class="card-header">
                                                    <p class="h4">Update Password</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Current Password</label>
                                                                <input type="password" class="form-control" name="current_password" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">New Password</label>
                                                                <input type="password" class="form-control" name="password" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Confirm New Password</label>
                                                                <input type="password" class="form-control" name="password_confirmation" >
                                                            </div>
                                                        </div>                                  
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                                </div>
                                            </form>
                                    </div>
                                </div>
                             </div>
                            </div>
                            <!-- End Page Content -->
                    
                    
                        </div>
                        </div>
                    </div>
                  </div>
            </main>
        </div>
    </div>
</section>
@endsection