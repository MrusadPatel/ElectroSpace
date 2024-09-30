@extends('user.layouts.master')
{{-- @section('title')
{{$settings->site_name}} || e-Commerce HTML Template
@endsection --}}

@section('content')

<div id="carouselExampleAutoplaying" class="carousel slide position-relative" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>


    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/swiper-slide-1.jpg" style="height: 850px;" class="d-block w-100" alt="...">
        <div class="container">
           <div style="width: 600px ; color: white;" class=" float-start position-absolute top-50 start-10 translate-middle-y">
            <h1 class="mb-5" >HUNDREDS OF AMAZING <br> PRODUCTS</h1>
            <p class="mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quasi molestias, magni ab at aliquam, fuga fugiat numquam maxime ducimus, quod perspiciatis distinctio necessitatibus omnis ipsam ullam ad quas delectus laboriosam.
            </p>
            <button type="button" class="btn btn-outline-warning btn-lg">Learn More</button>
           </div>

        </div>
      </div>

      <div class="carousel-item">
        <img src="images/swiper-slide-2.jpg" style="height: 850px;" class="d-block w-100" alt="...">
        <div class="container">
          <div style="width: 600px ; color: white;" class=" float-start position-absolute top-50 start-10 translate-middle-y">
           <h1 class="mb-5" >THE TRIP OF YOUR DREAM</h1>
           <p class="mb-4">Our travel agency is ready to offer you an exciting vacation that is designed to fit your own needs and wishes. Whether it’s an exotic cruise or a trip to your favorite resort, you will surely have the best experience.
           </p>
           <button type="button" class="btn btn-outline-warning btn-lg">Learn More</button>
          </div>
       </div>
      </div>

      <div class="carousel-item">
        <img src="images/swiper-slide-1.jpg" style="height: 850px;" class="d-block w-100" alt="...">
        <div class="container">
          <div style="width: 600px ; color: white;" class=" float-start position-absolute top-50 start-10 translate-middle-y">
           <h1 class="mb-5" >UNIQUE TRAVEL INSIGHTS</h1>
           <p class="mb-4">Our team is ready to provide you with unique weekly travel insights that include photos, videos, and articles about untravelled tourist paths. We know everything about the places you’ve never been to!
           </p>
           <button type="button" class="btn btn-outline-warning btn-lg">Learn More</button>
          </div>
       </div>
      </div>
    </div>
    
  </div>
 
  <!-- section 1 :- our best Tour Satrts here -->

  <section class="tours mt-5 mb-5">
    <div class="p5 container">
      <div class="row  py-5">
        <div class="col-8"> <h1>OUR BEST Products</h1> </div>
        <div class="col-4 d-grid gap-2 d-md-flex justify-content-md-end"> <button type="button" class="btn btn-primary btn-lg">VIEW ALL</button> </div>
      </div>

      <div class="row gy-4 row-cols-3 py-4 ">

        <div class="col-4 ">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">iPhone 15 Pro</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 70,000</a>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1 (1).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">iPhone 15 Pro Max</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 50,000</a>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1 (2).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">Samsung Galaxy S24 Ultra</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 20,000</a>
            </div>
          </div>
        </div>

        <div class="col-4 ">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1 (3).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">Samsung Galaxy S24 Pro</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 24,000</a>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1 (4).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">Samsung Galaxy S24</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 15,000</a>
            </div>
          </div>
        </div>

        <div class="col-4">
          <div class="card w-100 text-center" style="width: 18rem; border: none;">
            <img src="images/pic1 (5).jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-start fs-4">Samsung Galaxy S24</p>
              <p class="card-text text-center ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
              <a href="#" class="btn btn-primary">From Rs. 78,000</a>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- section 2 our services starts here -->

  <section style="background-color: rgba(226, 220, 220, 0.323);" class="services mt-5 pb-5 mb-5">
    <div class="p5 container">
      <div class="row  py-5">
        <div class="col-12 text-center"> <h1>OUR SERVICES</h1> </div>
      </div>

      <div class="row gy-4 row-cols-4 py-4 ">

        <div class="col-3 ">
          <div class="card p-4 w-100 text-center" style="width: 18rem; border: none;">
            <i style="font-size: 4rem; color: blue;" class="bi bi-airplane-fill text-center"></i>
            <div class="card-body">
              <p class="card-text text-start my-4 fs-5">Air Tickets</p>
              <hr>
              <p class="card-text text-start my-4 ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="card p-4 w-100 text-center" style="width: 18rem; border: none;">
            <i style="font-size: 4rem; color: blue;" class="bi bi-train-front-fill text-center"></i>
            <div class="card-body">
              <p class="card-text text-start my-4 fs-5">Voyages & Cruises</p>
              <hr>
              <p class="card-text text-start my-4 ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="card p-4 w-100 text-center" style="width: 18rem; border: none;">
            <i style="font-size: 4rem; color: blue;" class="bi bi-buildings-fill text-center"></i>
            <div class="card-body">
              <p class="card-text text-start my-4 fs-5">Hotel Bookings</p>
              <hr>
              <p class="card-text text-start  my-4">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
            </div>
          </div>
        </div>

        <div class="col-3 ">
          <div class="card p-4 w-100 text-center" style="width: 18rem; border: none;">
            <i style="font-size: 4rem; color: blue;" class="bi bi-cloud-sun-fill text-center"></i>
            <div class="card-body">
              <p class="card-text text-start my-4 fs-5">Tailored Summer Tours</p>
              <hr>
              <p class="card-text text-start my-4 ">Lorem ipsum dolor sit amet consectetur repellendus rem odit dolore eaque quos!</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- section 3 testimonials start here -->

  <section style="background-color: rgba(226, 220, 220, 0.323);" class="services mt-5 pb-5 mb-5">
    <div class="p5 container">
      <div class="row  py-5">
        <div class="col-12 text-center"> <h1>TESTIMONIALS</h1> </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
              <button style="background-color: blue;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button style="background-color: blue;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button style="background-color: blue;" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner ">
              <div class="carousel-item  active">
                <div class="card mx-auto pb-4 mb-3" style="max-width: 1150px; border: none ; background-color: #e2dcdc0c;">
                  <div class="row g-0">
                    <div class="col-md-4 p-5  py-5">
                      <img src="images/person1.jpg" style="border-radius: 50%;" class="img-fluid ms-5" alt="...">
                    </div>
                    <div class="col-md-8  pe-4 py-2">
                      <div class="card-body">
                        <i class="bi bi-quote" style="font-size: 4rem; color: blue;"></i>
                        <p class="card-text fs-5">Just wanted to say many, many thanks for helping me set up an amazing Costa Rican adventure! My nephew and I had a blast! All of the accommodations were perfect as were the activities that we did (canopy, coffee tour, hikes, fishing, and massages!) We have such fond memories and can't thank you enough!</p>
                        <h5 class="card-title">Samantha Smith</h5>
                        <p class="card-text"><small class="text-body-secondary">Regular Customer</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card mx-auto pb-4 mb-3" style="max-width: 1150px; border: none ; background-color: #e2dcdc0c;">
                  <div class="row g-0">
                    <div class="col-md-4 p-5  py-5">
                      <img src="images/person2.jpg" style="border-radius: 50%;" class="img-fluid ms-5" alt="...">
                    </div>
                    <div class="col-md-8  pe-4 py-2">
                      <div class="card-body">
                        <i class="bi bi-quote" style="font-size: 4rem; color: blue;"></i>
                        <p class="card-text fs-5">Just wanted to say many, many thanks for helping me set up an amazing Costa Rican adventure! My nephew and I had a blast! All of the accommodations were perfect as were the activities that we did (canopy, coffee tour, hikes, fishing, and massages!) We have such fond memories and can't thank you enough!</p>
                        <h5 class="card-title">Debra Ortega</h5>
                        <p class="card-text"><small class="text-body-secondary">Regular Customer</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="card mx-auto pb-4 mb-3" style="max-width: 1150px; border: none ; background-color: #e2dcdc0c;">
                  <div class="row g-0">
                    <div class="col-md-4 p-5  py-5">
                      <img src="images/person3.jpg" style="border-radius: 50%;" class="img-fluid ms-5" alt="...">
                    </div>
                    <div class="col-md-8  pe-4 py-2">
                      <div class="card-body">
                        <i class="bi bi-quote" style="font-size: 4rem; color: blue;"></i>
                        <p class="card-text fs-5">Just wanted to say many, many thanks for helping me set up an amazing Costa Rican adventure! My nephew and I had a blast! All of the accommodations were perfect as were the activities that we did (canopy, coffee tour, hikes, fishing, and massages!) We have such fond memories and can't thank you enough!</p>
                        <h5 class="card-title">Ann McMillan</h5>
                        <p class="card-text"><small class="text-body-secondary">Regular Customer</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

@endsection
