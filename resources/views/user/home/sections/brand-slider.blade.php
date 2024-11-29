<section class="tours mt-5 mb-5">

     <div class="container">
          <h1>brand slider</h1>
          
          <div class="splide " style="background-color: " aria-label="Splide Basic HTML Example">
               <div class="splide__track">
                       <ul class="splide__list">
                              @foreach ($brands as $brand)
                              <li class="splide__slide">
                                   <div>
                                        <img src="{{asset($brand->logo)}}" class="h-100 w-100 d-block" alt="">
                                   </div>
                              </li>
                              @endforeach
                       </ul>
               </div>
          </div>

     </div>
 
 </section>
 
@push('scripts')
 
 {{-- handles flash sale product slider --}}
     <script>
          var splide = new Splide( '.splide', {
            perPage: 5,
            focus  : center,
            gap: 20,
            width: '100%',
            autoHeight: true,
            pagination : false,
            omitEnd: true,
            } );

            splide.mount();
          
     </script>
 
     
@endpush