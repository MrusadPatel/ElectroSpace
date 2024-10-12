@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5  pt-1 align-self-end">
          <div class="page-header mb-2 mt-1">
            <h4 class="page-title">Product Image Gallery</h4>
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
                <a href="#">Product</a>
            </li>
            </ul>
        </div>

            <div class="card  mb-2">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h5 class="card-title ">Product : {{$product->name}}</h5>
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
            
                <form action="{{route('product-image-gallery.store')}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image <code class="ms-1">( Multiple Images Supported )</code> </label>
                        <div><input type="file" class="form-control-file" name="image[]" multiple></div>
                    </div>
                      <input type="hidden " hidden name="product" value="{{$product->id}}">
                    <button class="btn btn-success ms-2" type="submit">Upload</button>

                </form>
                
              </div>
            </div>

            <div class="card ">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">All Product Images</h4>
                </div>
              </div>
              <div class="card-body">
                
                {{$dataTable->table()}}
                
              </div>
            </div>
          </div>
        </div>
    </section>
   
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush