@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-11 mt-5 pt-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Slider</h4>
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
                <a href="#">Manage Website</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Slider</a>
            </li>
            </ul>
        </div>
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">Add Row</h4>
                  <a href="{{route('slider.create')}}" class="btn btn-primary btn-round ms-auto">
                    {{-- <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal"> --}}
                        <i class="fa fa-plus"></i>
                        Create New
                    {{-- </button> --}}
                </a>
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