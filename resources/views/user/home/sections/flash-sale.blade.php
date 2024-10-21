<section class="tours mt-5 mb-5">

    <div class="container">
        <div class="flash-sale-banner">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <h2>Flash Sale!</h2>
                    <p class="mb-0">Don't miss out on our amazing deals.</p>
                </div>
                <div class="col-md-4 text-center">
                    <p class="mb-0">Sale ends in:</p>
                    <div id="countdown" class="countdown"></div>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{url('/redirect/user/flash-sale')}}" class="btn btn-products btn-lg">See All Products</a>
                </div>
            </div>
        </div>

        <div class="splide mt-5" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
              <ul class="splide__list">
                @foreach ($flashSaleItems as $item)
                    @php
                        $product = \App\Models\Product::find($item->product_id);
                        $currentDate = date('Y-m-d');
                    @endphp
                    <li class="splide__slide">
                        <div class="product-card card">
                            <span class="badge bg-primary badge-top-left">{{productType($product->product_type)}}</span>
                            <a class="wishlist-btn add_to_wishlist" id="wishlistBtn" data-id="{{$product->id}}">
                                <i class="far fa-heart" ></i>
                            </a>
                            <a href="{{route('product-detail', $product->slug)}}"><img src="{{asset($product->thumb_image)}}" class="card-img-top" alt="Product Image"></a>
                            <div class="card-body  border-top">
                                <a href="{{route('product-detail', $product->slug)}}"><h5 class="card-title fs-6">{{$product->name}}</h5></a>
                                <p class="card-text">
                                    @if($product->offer_price >0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date )
                                        <span class="text-muted text-decoration-line-through ">Rs. {{$product->price}}</span>
                                        <span class="text-danger fw-bold ms-2">Rs. {{$product->offer_price}}</span>
                                    @else
                                        <span class="text-muted  fw-bold ms-2">Rs. {{$product->price}}</span>
                                        
                                    @endif
                                </p>
                                <form  class="shopping-cart-form">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <input  type="hidden" name="qty" value="1" class="form-control text-center border border-secondary" placeholder="1" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
                                </form>
                            </div>
                        </div>	
                    </li> 
                @endforeach
              </ul>
            </div>
        </div>
    </div>

    
  


</section>

  @push('scripts')

    {{-- script to handel add to cart feature --}}
  <script>
    $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
          }
        });
  
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
  
            $.ajax({
                method: 'POST',
                data: formData,
                url: '{{ route("add-to-cart") }}',
                success: function(data) {
                    if(data.status == 'success')
                    { 
                        alert(data.message);
                    }else if(data.status == 'error'){
                        alert(data.message);
                    }
                },
                error: function(data) {
                
                },
                
            })
        })

          // add product to wishlist
          $('.add_to_wishlist').on('click', function(e){
            e.preventDefault();
            let id = $(this).data('id');

            $.ajax({
                method: 'GET',
                url: "{{route('user.wishlist.store')}}",
                data: {id:id},
                success:function(data){
                    if(data.status === 'success'){
                        $('#wishlist_count').text(data.count)
                        alert(data.message);
                    }else if(data.status === 'error'){
                        alert(data.message);
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        })


    })
  </script>
  
      
  <script>
     // Assume this date string is provided by Laravel
        // Format: "YYYY-MM-DD HH:MM:SS"
        var endDateString = "{{ $flashSaleDate->end_date }}";  // This should be replaced with your actual Laravel variable
        
        var countDownDate = new Date(endDateString).getTime();

        function updateCountdown() {
            var now = new Date().getTime();
            var distance = countDownDate - now;

            if (distance < 0) {
                document.getElementById("countdown").innerHTML = "EXPIRED";
                return;
            }

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
        }

        // Update the countdown every 1 second
        setInterval(updateCountdown, 1000);

        // Initial call to display countdown immediately
        updateCountdown();
</script>
    
{{-- handles flash sale product slider --}}
    <script>
         var splide = new Splide( '.splide', {
            perPage: 5,
            focus  : 0,
            gap: 20,
            width: '100%',
            autoHeight: true,
            pagination : false,
            omitEnd: true,
            } );

            splide.mount();

    </script>

    
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const wishlistBtn = document.getElementById('wishlistBtn');
            const heartIcon = wishlistBtn.querySelector('i');
            
            wishlistBtn.addEventListener('click', function() {
                
                this.classList.toggle('active');
                heartIcon.classList.toggle('far');
                heartIcon.classList.toggle('fas');
                
            });
        });
    </script>

   

   
  @endpush