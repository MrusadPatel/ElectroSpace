@extends('user.dashboard.layouts.master')

@section('content')

@php
   
    

@endphp

<section class="mt-5 pt-5 bg-secondary " > 
    <div class="container-fluid">
        <div class="row">
            
            @include('user.dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>

                <div class="container py-2">
                    <div class="row g-4">
                        
                        <div class="col-md-3">
                            <a href="{{route('user.orders.index')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-cart-plus fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Total Orders</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">{{$totalOrders}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('user.orders.index')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-money-bill fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Total Amount Spent</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">Rs. {{$totalMoney}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('user.orders.index')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-money-bill fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Total Amount Saved</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">Rs. {{$totalCouponAmount}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            
                        
                        <div class="col-md-3">
                            <a href="{{route('user.orders.index')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-cart-plus fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Pending Orders</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">{{$pendingOrders}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
            
                        
                        <div class="col-md-3">
                            <a href="{{route('user.orders.index')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-cart-plus fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Completed Orders</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">{{$completedOrders}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3">
                            <a href="{{route('user.wishlist')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-heart fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Wishlist</div>
                                            <div class="d-flex align-items-center">
                                                <span class="stat-value">{{$wishlist}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-2">
                            <a href="{{route('profile')}}">
                                <div class="stat-card">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-circle">
                                            <i class="fas fa-user-alt fs-4 text-white"></i>
                                        </div>
                                        <div>
                                            <div class="stat-label fs-6 fw-semibold">Profile</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            
            </main>
        </div>
    </div>
</section>
@endsection