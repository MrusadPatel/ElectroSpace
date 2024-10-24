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
                       <h3 class="h3 ps-3"><span class="me-3"><i class="far fa-address-book"></i></span>Address</h3>
                        <div class="page-category">
                    
                            <!-- Begin Page Content -->
                            <div class="container card  px-4 py-4">
                                <div class="row justify-content-center"> 
                                    @foreach ($addresses as $address)
                                        <div class="col-6 col-md-6 mb-3 ">  
                                            <div class="card">
                                                <div class="card-header fw-bold fs-5">
                                                  Billing Address
                                                </div>
                                                <div class="card-body">
                                                    <ul class="mb-3">
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Name : </span> {{$address->name}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Phone : </span> {{$address->phone}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Email : </span> {{$address->email}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Country : </span> {{$address->country}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">City : </span> {{$address->city}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">State : </span> {{$address->state}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Zip Code : </span> {{$address->zip}} </li>
                                                        <li class="mb-2"><span class=" fw-semibold me-4">Address : </span> {{$address->address}} </li>
                                                    </ul>

                                                    <div class="d-flex">
                                                        <a href="{{route('address.edit', $address->id)}}" class="btn btn-primary me-2"><span class="me-2"><i class="fas fa-edit"></i></span>Edit</a> 
                                                        
                                                        <form action="{{route('address.destroy', $address->id)}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash me-2"></i> Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                              </div>
                                        </div>
                                    @endforeach
                                    
                                    <div class="col-md-12">
                                        <a href="{{route('address.create')}}"><button class="btn btn-primary py-2  "><span class="me-2"><i class="fas fa-plus"></i></span>Add New Address</button></a>
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