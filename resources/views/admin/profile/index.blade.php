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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
                                        </div>
                                    </div>                                  
                                </div>
                                <button type="submit" class="btn btn-primary">Update Profile</button>
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