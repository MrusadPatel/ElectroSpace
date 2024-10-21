@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    
    
    <div class="jumbotron color-grey-light mt-5 pt-5 mb-0 pb-0" >
        <div class="d-flex align-items-center ">
        <div class="container text-center pt-3">
            <h3 class="mb-0 fs-2 fw-bolder">Checkout</h3>
        </div>
        </div>
    </div>

    <!--============================
        CONTACT PAGE START
    ==============================-->
  
    <div class="container">

        <!--Section: Block Content-->
        <section class="mt-5 mb-4">
  
          <!--Grid row-->
          <div class="row">
  
            <!--Grid column-->
            <div class="col-lg-8 mb-4">
  
              <!-- Card -->
              <div class="card wish-list pb-1">
                <div class="card-body">
  
                  <h5 class="mb-4  fs-5  fw-bold">Shipping details</h5>

                  <div class="row">
                    @foreach ($addresses as $address)
                        <div class="col-6 col-md-6 mb-3 ">  
                            <div class="card">
                                <div class="card-header fw-semibold fs-6 ">
                                    <div class="">
                                        <input class=" shipping_address" data-id="{{$address->id}}" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Select Address
                                        </label>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="mb-3">
                                        <li class="mb-2"><span class=" fw-semibold me-4">Name : </span> {{$address->name}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">Phone : </span> {{$address->phone}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">Email : </span> {{$address->email}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">Country : </span> {{$address->country}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">City : </span> {{$address->city}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">State : </span> {{$address->state}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">Zip Code : </span> {{$address->zip}} </li>
                                        <li class="mb-2"><span class=" fw-semibold me-4">Address : </span> {{$address->address}} </li>
                                    </ul>

                                    <div class="d-flex">
                                        <a href="{{route('address.edit', $address->id)}}" class="btn btn-primary me-2"><span class="me-2"><i class="fas fa-edit"></i></span>Edit</a> 
                                        
                                        <form action="{{route('address.destroy', $address->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash me-2"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                  </div>
  
                  
  
                </div>
              </div>
              <!-- Card -->
  
            </div>
            <!--Grid column-->
  
            <!--Grid column-->
            <div class="col-lg-4">
  
              <!-- Card -->
              <div class="card mb-4">
                <div class="card-header fw-bold fs-5 ">
                    Shipping Methods
                </div>
                <div class="card-body">
                    @foreach ($shippingMethods as $method)
                        @if ($method->type == 'min_cost' && getCartTotal() >= $method->min_cost)
                            <div class=" mb-1">
                                <input class="shipping_method" type="radio" name="a" data-id="{{$method->cost}}"  value="{{$method->id}}" >
                                <label class="form-check-label" >
                                    {{$method->name}}
                                    <span>Cost : Rs. {{$method->cost}}</span>
                                </label>
                            </div>
                        @elseif($method->type == 'flat_cost') 
                            <div class=" mb-1">
                                <input class="shipping_method" type="radio" name="a" data-id="{{$method->cost}}"  value="{{$method->id}}" >
                                <label class="form-check-label" >
                                    {{$method->name}}
                                    <span>Cost : Rs. {{$method->cost}}</span>
                                </label>
                            </div>
                        @endif
                    @endforeach
                    
                    <hr class="my-3">
  
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                      Subtotal
                      <span>Rs. {{getCartTotal()}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                      Shipping Fee (+)
                      <span id="shipping_fee">Rs. 0</span>
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
                      <span><strong id="total_amount" data-id="{{getMainCartTotal()}}">Rs. {{getMainCartTotal()}}</strong></span>
                    </li>
                  </ul>
                  
                  <form action="" id="checkOutForm" >
                        <input type="hidden" name="shipping_method_id" value="" id="shipping_method_id">
                        <input type="hidden" name="shipping_address_id" value="" id="shipping_address_id">
                        
                  </form>
                  <a href="" id="submitCheckoutForm" class="btn btn-primary btn-block waves-effect waves-light">Make purchase</a>
                  
  
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

    <!--============================
        CONTACT PAGE END
    ==============================-->
@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       
        $('input[type="radio"]').prop('checked', false);
        $('#shipping_method_id').val("");
        $('#shipping_address_id').val("");

        $('.shipping_method').on('click', function(){
            let shippingFee = $(this).data('id');
            let currentTotalAmount = $('#total_amount').data('id')
            let totalAmount = currentTotalAmount + shippingFee;
            
            $('#shipping_method_id').val($(this).val());
            $('#shipping_fee').text("Rs. "+shippingFee);

            $('#total_amount').text("Rs. "+totalAmount)
        })

        $('.shipping_address').on('click', function(){
            $('#shipping_address_id').val($(this).data('id'));
        })

         // submit checkout form
         $('#submitCheckoutForm').on('click', function(e){
            e.preventDefault();
            if($('#shipping_method_id').val() == ""){
                alert('Shipping method is requred');
            }else if ($('#shipping_address_id').val() == ""){
                alert('Shipping address is requred');
            }else {
                $.ajax({
                    url: "{{route('user.checkout.form-submit')}}",
                    method: 'POST',
                    data: $('#checkOutForm').serialize(),
                    beforeSend: function(){
                        $('#submitCheckoutForm').html('<i class="fas fa-spinner fa-spin fa-1x"></i>')
                    },
                    success: function(data){
                        if(data.status === 'success'){
                            $('#submitCheckoutForm').text('Place Order')
                            // redirect user to next page
                            window.location.href = data.redirect_url;
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            }

        })

       
    })
</script>


@endpush