@extends('admin.layouts.master')
@section('main-content')

    <div class="container">
        <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Admin Dashboard</h4>
            
        </div>
        <div class="page-category">

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('order.index')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas  fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Todays Orders</p>
                                    <h4 class="card-title">{{@$todaysOrder}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('admin.pending-orders')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                    <i class="fas  fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Todays Pending Orders</p>
                                    <h4 class="card-title">{{@$todaysPendingOrder}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('order.index')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas  fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Orders</p>
                                    <h4 class="card-title">{{@$totalOrders}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('admin.pending-orders')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas  fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Pending Orders</p>
                                    <h4 class="card-title">{{@$totalPendingOrders}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('admin.canceled-orders')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-danger bubble-shadow-small">
                                    <i class="fas  fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Cancelled Orders</p>
                                    <h4 class="card-title">{{@$totalCanceledOrders}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('admin.delivered-orders')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-cart-plus"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Completed Orders</p>
                                    <h4 class="card-title">{{@$totalCompleteOrders}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Todays Earnings</p>
                                    <h4 class="card-title">{{@$todaysEarnings}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">This Months Earnings</p>
                                    <h4 class="card-title">Rs. {{@$monthEarnings}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="fas fa-money-bill-alt"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">This Years Earnings</p>
                                    <h4 class="card-title">Rs. {{@$yearEarnings}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('brand.index')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-copyright"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Brands</p>
                                    <h4 class="card-title">{{@$totalBrands}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="{{route('category.index')}}">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                    <i class="fas fa-list"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Categories</p>
                                    <h4 class="card-title">{{@$totalCategories}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-sm-6 col-md-3">
                    <a href="">
                        <div class="card card-stats card-round">
                            <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                <div class="icon-big text-center icon-info bubble-shadow-small">
                                    <i class="fas fa-users"></i>
                                </div>
                                </div>
                                <div class="col col-stats ms-3 ms-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Total Users</p>
                                    <h4 class="card-title">{{@$totalUsers}}</h4>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </a>
                </div>

              </div>

        </div>
        </div>
    </div>

@endsection