@extends('admin.layouts.master')
@section('main-content')

    <section class="pt-5 ">
      
        <div class="row justify-content-center">
          
        <div class="col-12 mt-5 pt-4 px-4 align-self-end">
          <div class="page-header">
            <h4 class="page-title">Pending Orders</h4>
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
                <a href="#">Manage Orders</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="#">Pending Orders</a>
            </li>
            </ul>
        </div>
            <div class="card ">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">All Pending Orders</h4>
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