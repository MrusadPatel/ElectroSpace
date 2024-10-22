@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-1 align-self-end">
          <div class="page-header mb-2 mt-1">
            <h4 class="page-title">Cash on Delivery</h4>
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
                <a href="#">Cash on Delivery</a>
            </li>
            </ul>
        </div>

        <div class="card mb-2">
            <div class="card-header">
              <div class="d-flex align-items-center">
                <h4 class="card-title">Cash on Delivery</h4>
              </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.cod-setting.update',1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group form-inline col-md-9 ">
                        <label for="defaultSelect" class="col-md-3 col-form-label">Cash on Delivery Status</label>
                        <select class="form-select form-control" id="defaultSelect" name="status">
                          <option {{ $codSetting->status == 1 ? 'selected' : ''  }} value="1">Enable</option>
                          <option  {{ $codSetting->status == 0 ? 'selected' : ''  }}  value="0">Disable</option>
                          
                        </select>
                    </div>

    
                    <button class="btn btn-success" type="submit">Update</button>
                </form>
            </div>
          </div>

          </div>
        </div>
    </section>
   
@endsection

