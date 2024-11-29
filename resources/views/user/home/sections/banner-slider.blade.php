<section class="mt-5 pt-5 conatiner-fluid" >
<div id="carouselExampleIndicators" class="carousel slide ">
    
    <div class="carousel-inner">
        @foreach($sliders as $slider)
            <div class="carousel-item active">
                <img src="{{asset($slider->banner)}}" class="d-block w-100" alt="...">
                <div class="container">
                    <div style="width: 600px ; color: rgb(10, 10, 10);" class=" float-start position-absolute top-50 start-10 translate-middle-y">
                     <h3 class="mb-4 fw-bolder font-monospace fs-3 text-primary" >{{$slider->type}}</h3>
                     <h1 class="mb-4 fw-bolder font-monospace fs-1" >{{$slider->title}}</h1>
                     <h6 class="mb-4 fw-bolder fs-4 text-primary" >Start at Rs. {{$slider->starting_price}}</h6>
                     <a href="{{$slider->btn_url}}" class="btn btn-primary btn-lg rounded">Shop Now</a>
                    </div>
                 </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>