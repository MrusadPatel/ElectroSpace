@extends('user.dashboard.layouts.master')

@section('content')

<section class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            
            @include('user.dashboard.layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
                    <div class="container">
                        <div class="page-inner">
                       <h3 class="h3 ps-3"><span class="me-3"><i class="far fa-address-book"></i></span>Orders</h3>
                        <div class="page-category">
                    
                            <!-- Begin Page Content -->
                            <div class="container card  px-3 py-3">
                                {{-- <div class="row justify-content-center">  --}}
                                    
                                    <div class="card-body">
                
                                        {{$dataTable->table()}}
                                        
                                      </div>
                                    
                                {{-- </div> --}}
                            </div>
                            <!-- End Page Content -->
                    
                    
                        </div>
                        </div>
                    </div>
                  </div>
            </main>
        </div>
    </div>
</section>
@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush