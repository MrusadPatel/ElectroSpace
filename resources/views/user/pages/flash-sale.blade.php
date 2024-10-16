@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    


    <!--============================
        Flash Sale PAGE START
    ==============================-->
    <section class="container my-5 pt-4  pb-5">
        <div class="flash-sale-banner mb-3 mt-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Flash Sale!</h2>
                    <p class="mb-0">Don't miss out on our amazing deals.</p>
                </div>
                <div class="col-md-6 text-end">
                    <p class="mb-0">Sale ends in:</p>
                    <div id="countdown" class="countdown"></div>
                </div>
            </div>
        </div>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Flash Sale</li>
                </ol>
            </nav>
    
            <h1 class="mb-4">Our Products</h1>
    
            <!-- Product Grid -->
            <div class="row">
                @foreach ($flashSaleItems as $item)
                    @php
                        $product = \App\Models\Product::find($item->product_id);
                        $currentDate = date('Y-m-d');
                    @endphp
                    <div class="col-md-3">
                        <div class="product-card card">
                            <span class="badge bg-primary badge-top-left">{{productType($product->product_type)}}</span>
                            <button class="wishlist-btn" id="wishlistBtn">
                                <i class="far fa-heart"></i>
                            </button>
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
                                <button class="btn btn-primary"><i class="fas fa-shopping-cart me-2"></i>Add to Cart</button>
                            </div>
                        </div>	
                    </div> 
                @endforeach
            </div>

            <div class="d-flex justify-content-center align-items-center"> 
                @if($flashSaleItems->hasPages())
                    {{$flashSaleItems->links()}}
                @endif
            </div>
        
    </section>
    <!--============================
        Flash Sale PAGE END
    ==============================-->
@endsection

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

@endpush