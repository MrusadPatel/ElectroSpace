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
                  <h4 class="card-title text-body-secondary">Create Coupons</h4>
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
                    
                <form action="{{route('coupons.store')}}" method="POST" >
                     @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="name" value="{{old('name')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Code</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="code" value="{{old('code')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Quantity</label>
                                <div class="col-md-9 p-0">
                                <input type="number" class="form-control input-full" name="qty" value="{{old('qty')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">    
                                <label class="col-md-3 col-form-label">Max Use Per Person</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="max_use" value="{{old('max_use')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline ">
                                <label for="inlineinput" class="col-md-3 col-form-label">Start Date</label>
                                <div class="col-md-3 p-0">
                                <input type="date" class="form-control input-full " id="inlineinput" name="start_date" value="{{old('start_date')}}"  placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline ">
                                <label for="inlineinput" class="col-md-3 col-form-label">End Date</label>
                                <div class="col-md-3 p-0">
                                <input type="date" class="form-control input-full " id="inlineinput" name="end_date" value="{{old('end_date')}}"  placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline col-md-9 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Discount Type</label>
                                <select class="form-select form-control" id="defaultSelect" name="discount_type">
                                <option value="percent">Percentage (%)</option>
                                <option value="amount">Amount</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Discount Value</label>
                                <div class="col-md-9 p-0">
                                <input type="text" class="form-control input-full" name="discount" value="{{old('discount')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline col-md-9 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                                <select class="form-select form-control" id="defaultSelect" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success" type="submit">Create</button>

                </form>
                
                
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection

@push('scripts')


@endpush