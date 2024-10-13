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
                    <a href="#" class="btn btn-products btn-lg">See All Products</a>
                </div>
            </div>
        </div>

        <div class="splide mt-5" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
              <ul class="splide__list">
                @foreach ($flashSaleItems as $item)
                    @php
                        $product = \App\Models\Product::find($item->product_id);
                    @endphp
                    <li class="splide__slide">
                        <div class="card w-100 text-center" style="width: 15rem; border: solid 1px grey;">
                            <img src="{{asset($product->thumb_image)}}" class="card-img-top" alt="...">
                            <div class="card-body border-top">
                            <p class="card-text text-start fs-5">{{$product->name}}</p>
                            <a href="#" class="btn btn-primary">From Rs. {{$product->price}}</a>
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

  @endpush