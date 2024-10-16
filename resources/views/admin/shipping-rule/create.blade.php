@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Shipping Rules</h4>
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
                <a href="#">Manage Policy</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Shipping Rules</a>
            </li>
            </ul>
        </div>
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title text-body-secondary">Create Shipping Rule</h4>
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
                    
                <form action="{{route('shipping-rule.store')}}" method="POST" >
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
                            <div class="form-group form-inline col-md-9 ">
                                <label for="defaultSelect" class="col-md-3 col-form-label">Type</label>
                                <select class="form-select form-control" id="defaultSelect" name="type">
                                <option value="flat_cost">Flat Cost</option>
                                <option value="min_cost">Minimum Order Amount</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label class="col-md-3 col-form-label">Minimum Amount</label>
                                <div class="col-md-9 p-0">
                                <input type="number" class="form-control input-full" name="min_cost" value="{{old('min_cost')}}" placeholder="Enter Input">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">    
                                <label class="col-md-3 col-form-label">Cost</label>
                                <div class="col-md-9 p-0">
                                <input type="number" class="form-control input-full" name="cost" value="{{old('cost')}}" placeholder="Enter Input">
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