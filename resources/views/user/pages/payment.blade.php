@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    
    
    <div class="jumbotron color-grey-light mt-5 pt-5 mb-0 pb-0" >
        <div class="d-flex align-items-center ">
        <div class="container text-center pt-3">
            <h3 class="mb-0 fs-2 fw-bolder">Payment Page</h3>
        </div>
        </div>
    </div>

    <div class="container">

        <!--Section: Block Content-->
        <section class="mt-5 mb-4">
  
          <!--Grid row-->
          <div class="row">
  
            <!--Grid column-->
            <div class="col-lg-7 mb-4">
  
              <!-- Card -->
              <div class="card wish-list pb-1">
                <div class="card-header"> <h5 class=" fs-5  fw-bold">Select Payment Method</h5> </div>
                <div class="card-body ">
                    <ul class="d-grid justify-content-center align-item-center">
                        <li class="my-2"><button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>RazorPay</button></li>
                        <li class="my-2"><button type="button" class="btn btn-primary btn-rounded" data-mdb-ripple-init>Cash on Delivery</button></li>
                    </ul>                  
                </div>
              </div>
              <!-- Card -->
            </div>

  
            <!--Grid column-->
            <div class="col-lg-5">
  
              <!-- Card -->
              <div class="card mb-4">
                <div class="card-header fw-bold fs-5 ">
                    Order Summary
                </div>
                <div class="card-body">
                    
  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Subtotal
                      <span>Rs. {{getCartTotal()}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                      Shipping Fee (+)
                      <span id="shipping_fee">Rs. {{getShppingFee()}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                        Coupon (-)
                        <span>Rs. {{getCartDiscount()}}</span>
                      </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                      <div>
                        <strong>Total</strong>
                        <strong>
                          <p class="mb-0">(including Tax)</p>
                        </strong>
                      </div>
                      <span><strong>Rs. {{getFinalPayableAmount()}}</strong></span>
                    </li>
                  </ul>                
                </div>
              </div>
              <!-- Card -->
  
  
            </div>
            <!--Grid column-->
  
          </div>
          <!--Grid row-->
  
        </section>
        <!--Section: Block Content-->
  
  
    </div>
  
@endsection

@push('scripts')

<script>
   
</script>


@endpush