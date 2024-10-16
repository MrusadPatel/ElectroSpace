@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    
     <!-- Breadcrumb -->
     @php
       
        $currentDate = date('Y-m-d');
    @endphp

    <!--============================
        ABOUT PAGE START
    ==============================-->
    <section class="py-5">
        <div class="container">
            <nav aria-label="breadcrumb" class="mt-3 mb-3 pt-5">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Flash Sale</li>
                </ol>
            </nav>
          <div class="row gx-5 ">
            <aside class="col-lg-6">
                <div id="main-carousel" class="splide border rounded-4 mb-3 d-flex justify-content-center  w-100 " aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                    <div class="splide__track w-75"  style="width: 400px ;" >
                        <ul class="splide__list" style="width: 500px ;" >
                            <li class="splide__slide " style="width: 500px ;" >
                                <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset($product->thumb_image)}}" alt="">
                            </li>
                            @foreach ($product->productImageGallerires as $productImage)
                                <li class="splide__slide">
                                    <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="{{asset($productImage->image)}}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="thumbnail-carousel" class="splide d-flex justify-content-center mb-3" aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide border mx-1 rounded-2">
                                <img width="100%" height="100%" class="rounded-2" src="{{asset($product->thumb_image)}}" alt="">
                            </li>
                            @foreach ($product->productImageGallerires as $productImage)
                                <li class="splide__slide border mx-1 rounded-2">
                                    <img width="100%" height="100%" class="rounded-2" src="{{asset($productImage->image)}}" alt="">
                                </li>
                            @endforeach
                        </ul>
                    </div>
		        </div>
              <!-- thumbs-wrap.// -->
              <!-- gallery-wrap .end// -->
            </aside>
            <main class="col-lg-6">
              <div class="ps-lg-3">
                <h4 class="title text-dark fs-3">{{$product->name}}</h4>
                <div class="d-flex flex-row my-3">
                  <div class="text-warning mb-1 me-2">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span class="ms-1">
                      4.5
                    </span>
                  </div>
                  <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                  <span class="text-success ms-2">In stock</span>
                </div>
      
                <div class="mb-3">
                    @if($product->offer_price >0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date )
                        <span class="text-muted fw-bolder  text-decoration-line-through fs-4 ">Rs. {{$product->price}}</span>
                        <span class="text-danger fw-bold ms-2 fs-3">Rs. {{$product->offer_price}}</span>
                    @else
                        <span class="text-muted  fw-bold ms-2">Rs. {{$product->price}}</span>
                    @endif
                </div>
      
                <p>{!! $product->short_description !!}</p>
      
                <div class="row">    
                  <dt class="col-3">Brand</dt>
                  <dd class="col-9">{{$product->brand->name}}</dd>
                </div>
      
                <hr>
      
                <div class="row mb-4">
                  
                  <!-- col.// -->
                  <div class="col-md-4 col-6 mb-3">
                    <label class="mb-2 d-block">Quantity</label>
                    <div class="input-group mb-3" style="width: 170px;">
                      <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                        <i class="fas fa-minus"></i>
                      </button>
                      <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1">
                      <button class="btn btn-white border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                        <i class="fas fa-plus"></i>
                      </button>
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-warning shadow-0"> Buy now </a>
                <a href="#" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
                <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i class="me-1 fa fa-heart fa-lg"></i> Save </a>
              </div>
            </main>
          </div>
        </div>
      </section>

      <section class="bg-light border-top py-4">
        <div class="container">
          <div class="row gx-4">
            <div class="col-lg-12 mb-4">
              <div class="border rounded-2 px-3 py-3 bg-white">
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3 ms-5 ps-5" id="ex1" role="tablist">
                  <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-75 active  btn-outline-light btn " id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Description</a>
                  </li>
                  <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-75 btn-outline-light btn" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Seller Info</a>
                  </li>
                  <li class="nav-item d-flex" role="presentation">
                    <a class="nav-link d-flex align-items-center justify-content-center w-75 btn-outline-light btn" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">Reviews</a>
                  </li>
                </ul>
                <!-- Pills navs ends -->
      
                <!-- Pills content -->
                <div class="tab-content" id="ex1-content">

                  {{-- Description starts here --}}
                  <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                      {!! $product->long_description !!}
                  </div>

                  {{-- Seller info starts here --}}
                  <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    Tab content or sample information now <br>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  </div>

                  {{-- reviews start here --}}
                  <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    Another tab content or sample information now <br>
                    Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.
                  </div>
                </div>
                <!-- Pills content  end-->
              </div>
            </div>
            
          </div>
        </div>
      </section>
    <!--============================
        ABOUT PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
            var main = new Splide('#main-carousel', {
                type: 'fade',
                rewind: true,
                pagination: false,
                arrows: false,
            });


            var thumbnails = new Splide('#thumbnail-carousel', {
                fixedWidth: 100,
                fixedHeight: 90,
                gap: 10,
                rewind: true,
                pagination: false,
                isNavigation: true,
                breakpoints: {
                    600: {
                        fixedWidth: 60,
                        fixedHeight: 44,
                    },
                },
            });


            main.sync(thumbnails);
            main.mount();
            thumbnails.mount();
        });
</script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const tabLinks = document.querySelectorAll('.nav-link');
    const tabContents = document.querySelectorAll('.tab-pane');

    tabLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Remove active class from all links and contents
            tabLinks.forEach(l => l.classList.remove('active'));
            tabContents.forEach(c => {
                c.classList.remove('show', 'active');
            });

            // Add active class to clicked link
            this.classList.add('active');

            // Show corresponding content
            const contentId = this.getAttribute('href');
            const content = document.querySelector(contentId);
            content.classList.add('show', 'active');
        });
    });
});
</script>
@endpush