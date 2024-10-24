@extends('user.dashboard.layouts.master')

@section('content')

<section class="mt-5 pt-5  bg-secondary">
    <div class="container-fluid">
        <div class="row">
            
            @include('user.dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <div class="container">
                        <div class="page-inner">
                       <h3 class="h3 ps-3 fw-bolder"><span class="me-3"><i class="far fa-address-book"></i></span>Create Address</h3>
                        <div class="page-category">
                    
                            <!-- Begin Page Content -->
                            <div class="container">
                                <div class="row justify-content-center"> 
                                    <div class="col-12 col-md-12 mb-3 ">  
                                        <div class="card">
                                            <div class="card-body px-4">
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
                                                
                                                <form action="{{ route('address.store') }}" method="POST">
                                                @csrf
                                                    <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="fullName" class="form-label fw-semibold fs-5">Name</label>
                                                                        <input type="text" name="name" class="form-control" id="fullName" value="{{ old('name') }}" >
                                                                    </div>
                                                                </div>
                                                                                                                        
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="mobileNo" class="form-label fw-semibold fs-5">Email</label>
                                                                        <input type="email" name="email" class="form-control" id="mobileNo" value="{{ old('email') }}" >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">Phone</label>
                                                                        <input type="number" name="phone" class="form-control" id="mobileno" value="{{ old('phone') }}"  >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">Country</label>
                                                                        <input type="text" name="country" class="form-control" id="mobileno" value="{{ old('country') }}"  >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">State</label>
                                                                        <input type="text" name="state" class="form-control" id="mobileno" value="{{ old('state') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">City</label>
                                                                        <input type="text" name="city" class="form-control" id="mobileno" value="{{ old('city') }}"  >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">Zip Code</label>
                                                                        <input type="number" name="zip" class="form-control" id="mobileno" value="{{ old('zip') }}"  >
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label fw-semibold fs-5">Address</label>
                                                                        <input type="text" name="address" class="form-control" id="mobileno" value="{{ old('address') }}"  >
                                                                    </div>
                                                                </div>                                
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Create</button>
                                                </form>
                                            </div>
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