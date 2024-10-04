@extends('admin.layouts.master')
@section('main-content')

<div class="container">
    <div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Profile</h4>
        <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="#">
            <i class="icon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="separator">
            <i class="icon-arrow-right"></i>
        </li>
        <li class="nav-item">
            <a href="#">Profile</a>
        </li>
        </ul>
    </div>
    <div class="page-category">

        <!-- Begin Page Content -->
        <div class="container">
         <div class="row justify-content-center"> 
            <div class="col-12 col-md-12 ">  
                <div class="card">
                        <form action="{{ url('redirect/admin/profile/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <p class="h4">Update Profile</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div width="50px"  class="mb-3">
                                                <img src="{{ asset(Auth::user()->profile_photo_path) }}" width="130px" alt="">
                                            </div>
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control" id="fullName">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" name="name" class="form-control" id="fullName" value="{{ Auth::user()->name }}" placeholder="Enter your full name">
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
                        <form action="{{ route('update.password') }}" method="post" >
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

@endsection