@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Brand</h4>
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
                <a href="#">Manage Product</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Create Brand</a>
            </li>
            </ul>
        </div>
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title text-body-secondary">Create Brand</h4>
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
                    
                <form action="{{route('brand.store')}}" method="POST"  enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label>Logo</label>
                        <div><input type="file" class="form-control-file" name="logo"></div>
                    </div>
    
                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">Name</label>
                        <div class="col-md-9 p-0">
                        <input type="text" class="form-control input-full" name="name" value="{{old('name')}}" placeholder="Enter Input">
                        </div>
                    </div>
    
                    <div class="form-group form-inline col-md-9 ">
                        <label for="defaultSelect" class="col-md-3 col-form-label">Is Featured</label>
                        <select class="form-select form-control" id="defaultSelect" name="is_featured">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                          
                        </select>
                    </div>

                    <div class="form-group form-inline col-md-9 ">
                        <label for="defaultSelect" class="col-md-3 col-form-label">Status</label>
                        <select class="form-select form-control" id="defaultSelect" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                          
                        </select>
                    </div>
    
                    <button class="btn btn-success" type="submit">Create</button>

                </form>
                
                
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection

