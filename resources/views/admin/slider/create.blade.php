@extends('admin.layouts.master')
@section('main-content')


{{-- <div aria-live="polite" aria-atomic="true" class="bg-body-secondary position-relative  rounded-3">

<div class="toast-container p-3" id="top-0 end-0">

<div id="errorToast" role="alert" class="toast"  aria-live="assertive" aria-atomic="true">
<div class="toast-header">
  <strong class="me-auto">Bootstrap</strong>
  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
</div>
<div class="toast-body">
  
</div>
</div>

</div>

</div> --}}


<section class="pt-5 ">
    <div class="row justify-content-center">
    <div class="col-10 mt-5 pt-4 align-self-end">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Create Slider</h4>
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
           <form action="{{route('slider.store')}}" method="post" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label>Banner</label>
                    <input type="file" class="form-control-file" name="banner">
                </div>

                <div class="form-group form-inline">
                    <label class="col-md-3 col-form-label">Type</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" name="type" value="{{old('type')}}" placeholder="Enter Input">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Title</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" id="inlineinput" value="{{old('title')}}"  name="title" placeholder="Enter Input">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Starting Price</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" id="inlineinput" value="{{old('starting_price')}}"  name="starting_price" placeholder="Enter Input">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Button Url</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" id="inlineinput" name="btn_url" value="{{old('btn_url')}}"  placeholder="Enter Input">
                    </div>
                </div>

                <div class="form-group form-inline">
                    <label for="inlineinput" class="col-md-3 col-form-label">Serial No.</label>
                    <div class="col-md-9 p-0">
                    <input type="text" class="form-control input-full" id="inlineinput" name="serial" value="{{old('serial')}}"  placeholder="Enter Input">
                    </div>
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