@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-1 align-self-end">
          <div class="page-header mb-2 mt-1">
            <h4 class="page-title">Razorpay Payment Gateway</h4>
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
                <a href="#">Manage Payments</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Razorpay</a>
            </li>
            </ul>
        </div>

        <div class="card mb-2">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Flash Sale End Date</h4>
              </div>
            </div>
            <div class="card-body">
                <form action="{{route('razorpay-setting.update',1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group form-inline col-md-9 ">
                        <label for="defaultSelect" class="col-md-3 col-form-label">Razorpay Status</label>
                        <select class="form-select form-control" id="defaultSelect" name="status">
                          <option {{ $razorpaySetting->status == 1 ? 'selected' : '' }} value="1">Enable</option>
                          <option  {{ $razorpaySetting->status == 0 ? 'selected' : '' }}  value="0">Disable</option>
                          
                        </select>
                    </div>

                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">RazorPay Key</label>
                        <div class="col-md-9 p-0">
                        <input type="text" class="form-control input-full" name="razorpay_key" value="{{$razorpaySetting->razorpay_key}}" placeholder="Enter Input">
                        </div>
                    </div>

                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">Razorpay Secret Key</label>
                        <div class="col-md-9 p-0">
                        <input type="text" class="form-control input-full"  name="razorpay_secret_key"  value="{{$razorpaySetting->razorpay_secret_key}}" placeholder="Enter Input">
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