@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    


    <!--============================
        Flash Sale PAGE START
    ==============================-->
    <div class="container my-5 pt-4  pb-5">
               
            <section class="h-100 h-custom" style="background-color: 3#d2c9ff;">
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                      <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                          <div class="row g-0">
                            <div class="col-lg-8">
                              <div class="ps-5 pb-5 pe-5 pt-4">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                  <h2 class="fw-bold mb-0">Shopping Cart</h2>
                                  <h6 class="mb-0 text-muted">{{count($cartItems)}} items</h6>
                                </div>
                                <hr class="my-4">
                                
                                @foreach($cartItems as $item)
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img
                                        src="{{asset($item->options->image)}}"
                                        class="img-fluid border rounded-3" alt="Cotton T-shirt">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <h6 class="fw-semibold fs-5">{{$item->name}}</h6>
                                        <h6 class="mb-0">Rs. {{$item->price}}</h6>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 product-decrement">
                                        <i class="fas fa-minus"></i>
                                        </button>
                
                                        <input id="form1" min="0" name="quantity" value="{{$item->qty}}" data-rowid="{{$item->rowId}}" type="text"
                                        class="form-control form-control-sm product-qty" />
                
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2 product-increment">
                                        <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h6 id="{{$item->rowId}}" class="mb-0">Rs. {{$item->price * $item->qty}}</h6>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="{{route('cart.remove-product', $item->rowId)}}" class="fs-5"><i class="fas fa-times"></i></a>
                                    </div>
                                    </div>
                
                                    <hr class="my-4">
                                @endforeach

                                @if(count($cartItems) == 0)
                                    <h3 class="text-center">Cart is Empty!</h3>
                                @endif
              
                                
                            </div>
                            </div>
                            <div class="col-lg-4 bg-body-tertiary">
                              <div class="ps-5 pb-5 pe-5 pt-4">
                                <h3 class="fw-bold mb-3 mt-2 pt-1">Summary</h3>
                                <hr class="my-4">
              
                                <div class="d-flex justify-content-between mb-4">
                                  <h6 class="text-uppercase">Subtotal</h6>
                                  <h5 id="sub_total">Rs. {{getCartTotal()}}</h5>
                                </div>

                                <div class="d-flex justify-content-between mb-4">
                                  <h6 class="text-uppercase">Discount (-)</h6>
                                  <h5 id="discount">Rs. {{getCartDiscount()}}</h5>
                                </div>
              
                                <div class="mb-5">
                                  <form  id="coupon_form">
                                    <div data-mdb-input-init class="form-outline mb-2">
                                      <input type="text" id="form3Examplea2" name="coupon_code" value="{{session()->has('coupon') ? session()->get('coupon')['coupon_code'] : ''}}" class="form-control form-control-lg" />
                                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                                    </div>
                                    <button  type="submit" class="btn btn-dark " data-mdb-ripple-color="dark">Apply</button>
                                  </form>
                                </div>
              
                                <hr class="my-4">
              
                                <div class="d-flex justify-content-between mb-5">
                                  <h6 class="text-uppercase fs-5">Total price</h6>
                                  <h5 id="cart_total" >Rs. {{getMainCartTotal()}}</h5>
                                </div>
              
                                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg"
                                  data-mdb-ripple-color="dark">Checkout</button>
              
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
                         
        
    </div>
    <!--============================
        Flash Sale PAGE END
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

        // incriment product quantity
        $('.product-increment').on('click', function(){
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) + 1;
            let rowId = input.data('rowid');
            input.val(quantity);

            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "Rs. "+data.product_total
                        $(productId).text(totalAmount)

                        renderCartSubTotal()
                        calculateCouponDescount()
                    }
                    else if(data.status === 'error')
                    {
                        alert(data.message);
                    }
                },
                error: function(data){

                }
            })
        })

        // decrement product quantity
        $('.product-decrement').on('click', function(){
            let input = $(this).siblings('.product-qty');
            let quantity = parseInt(input.val()) - 1;
            let rowId = input.data('rowid');

            if(quantity < 1){
                quantity = 1;
            }

            input.val(quantity);

            $.ajax({
                url: "{{route('cart.update-quantity')}}",
                method: 'POST',
                data: {
                    rowId: rowId,
                    quantity: quantity
                },
                success: function(data){
                    if(data.status === 'success'){
                        let productId = '#'+rowId;
                        let totalAmount = "Rs. "+data.product_total
                        $(productId).text(totalAmount)

                        renderCartSubTotal()
                        calculateCouponDescount()
                    }
                    else if(data.status == 'error')
                    {
                        alert(data.message);
                    }
                },
                error: function(data){

                }
            })

        })

         // get subtotal of cart and put it on dom
         function renderCartSubTotal(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.product-total') }}",
                success: function(data) {
                    $('#sub_total').text("Rs. "+data);
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }
      

          // applay coupon on cart

          $('#coupon_form').on('submit', function(e){
            e.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                method: 'GET',
                url: "{{ route('apply-coupon') }}",
                data: formData,
                success: function(data) {
                   if(data.status === 'error'){
                    alert(data.message);
                   }else if (data.status === 'success'){
                    calculateCouponDescount()
                    alert(data.message);
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })

        })



        // calculate discount amount
        function calculateCouponDescount(){
            $.ajax({
                method: 'GET',
                url: "{{ route('coupon-calculation') }}",
                success: function(data) {
                    if(data.status === 'success'){
                        $('#discount').text('Rs. '+data.discount);
                        $('#cart_total').text('Rs. '+data.cart_total);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        }

    })

</script>

@endpush