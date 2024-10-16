@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Coupons</h4>
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
                <a href="#">Manage Coupons & Offers</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Coupons</a>
            </li>
            </ul>
        </div>
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title text-body-secondary">Update Coupons</h4>
                </div>
              </div>
              <div class="card-body">

                        @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif
                    
                <form action="{{route('coupons.update', $coupon->id)}}" method="POST" >
                     @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="name" value="{{$coupon->name}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Code</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="code" value="{{$coupon->code}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Quantity</label>
                                <div class="col-md-9 p-0">
                                <input type="number" class="form-control input-full" name="qty" value="{{$coupon->quantity}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">    
                                <label class="col-md-3 col-form-label">Max Use Per Person</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="max_use" value="{{$coupon->max_use}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline ">
                                <label for="inlineinput" class="col-md-3 col-form-label">Start Date</label>
                                <div class="col-md-3 p-0">
                                <input type="date" class="form-control input-full " id="inlineinput" name="start_date" value="{{$coupon->start_date}}"  placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline ">
                                <label for="inlineinput" class="col-md-3 col-form-label">End Date</label>
                                <div class="col-md-3 p-0">
                                <input type="date" class="form-control input-full " id="inlineinput" name="end_date" value="{{$coupon->end_date}}"  placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline col-md-9 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Discount Type</label>
                                <select class="form-select form-control" id="defaultSelect" name="discount_type">
                                <option {{$coupon->discount_type == 'percent' ? 'selected' : ''}}  value="percent">Percentage (%)</option>
                                <option {{$coupon->discount_type == 'amount' ? 'selected' : ''}}  value="amount">Amount</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Discount Value</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="discount" value="{{$coupon->discount}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline col-md-9 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                                <select class="form-select form-control" id="defaultSelect" name="status">
                                <option {{$coupon->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                <option {{$coupon->status == 0 ? 'selected' : ''}}  value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Update</button>

                </form>
                
                
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection

@push('scripts')


@endpush