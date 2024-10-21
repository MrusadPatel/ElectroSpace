@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    


    <!--============================
        Flash Sale PAGE START
    ==============================-->
    <div class="container my-5 pt-4  pb-5">

        <div class="jumbotron color-grey-light mt-2 pt-1 mb-0 pb-0" >
            <div class="d-flex align-items-center ">
            <div class="container text-center pt-3">
                <h3 class="mb-0 fs-2 fw-bolder">Wishlist</h3>
            </div>
            </div>
        </div>
               
            <section class="h-100 h-custom" style="background-color: 3#d2c9ff;">
                <div class="container pb-5 pt-3 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                      <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                          <div class="row g-0">
                            <div class="col-lg-12">
                              <div class="ps-5 pb-4 pe-5 pt-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                  <h2 class="fw-bold mb-0 fs-5">Whishlist Items</h2>
                                  <h6 class="mb-0 text-muted">3 items</h6>
                                </div>
                                <hr class="my-2">
                                
                                @foreach ($wishlistProducts as $item)
                                    
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-1 col-lg-1 col-xl-1">
                                            <img
                                            src="{{asset($item->product->thumb_image)}} "
                                            class="img-fluid border rounded-3" alt="Cotton T-shirt">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="fw-semibold fs-5">{{$item->product->name}}</h6>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            @if ($item->product->qty >0)
                                            <span class="badge badge-success fs-6">In Stock</span>
                                            @else
                                            <h6 class="fw-semibold fs-5">Out Of Stock</h6>
                                            @endif
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 id=" " class="mb-0">Rs. {{$item->product->price}}</h6>
                                        </div>
                                        <div class="col-md-2 col-lg-2 col-xl-2 text-end">
                                            <a href="{{route('product-detail', $item->product->slug)}}" class="btn btn-primary" >View Product</a>
                                        </div>
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a href="{{route('user.wishlist.destroy', $item->id)}} " class="fs-5"><i class="fas fa-times"></i></a>
                                        </div>
                                    </div>
                
                                    <hr class="my-1">
                                @endforeach  

                                {{-- @if(count($cartItems) == 0)
                                    <h3 class="text-center">Cart is Empty!</h3>
                                @endif --}}
              
                                
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


    })

</script>

@endpush