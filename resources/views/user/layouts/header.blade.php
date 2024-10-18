@php
  $categories = \App\Models\Category::where('status',1)
  ->with(['subCategories' => function($query){
      $query->where('status',1)
      ->with(['childCategories'=>function($query){
        $query->where('status',1);
      }]);
  }
  ])
  ->get();   
@endphp


<header style="height: 90px;" class="nav navbar fixed-top bg-body-tertiary">
    <div class="container container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png')}}" alt="Logo" width="200" height="60" class="d-inline-block align-text-top">
        
      </a>
      

      <div class="dropdown ms-5">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          Category
        </button>
        <ul class="dropdown-menu">
          @foreach($categories as $category)
            <li class="menu-item">
              <a href="#" class="nav-link"><i class="{{$category->icon}} mx-2"></i>{{$category->name}}</a>
              <div class="submenu menu-tier">
                  <ul class="nav flex-column">
                    @foreach($category->subCategories as $subCategory)
                      <li class="menu-item">
                          <a href="#" class="nav-link">{{$subCategory->name}}</a>
                          <div class="submenu menu-tier">
                              <ul class="nav flex-column">
                                  @foreach($subCategory->childCategories as $childCategory)
                                  <li class="menu-item"><a href="#" class="nav-link">{{$childCategory->name}}</a></li>
                                  @endforeach
                              </ul>
                          </div>
                      </li>
                      @endforeach
                  </ul>
              </div>
            </li>
            @endforeach
        </ul>
      </div>

      <form class="d-flex mx-auto" role="search">
       
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Search</button>
      </form>

      <div class="nav nav-pills   flex-column flex-sm-row">
        @if(Route::has('login'))
          @auth
              <x-app-layout>
      
              </x-app-layout>
          @else
            <a href="{{route('login')}}" ><button type="button" class="btn btn-outline-primary mx-2">LOGIN</button></a>
            <a href="{{route('register')}}" ><button type="button" class="btn btn-outline-primary mx-2">REGISTER</button></a>
          @endauth
        @endif
        <a class="flex-sm-fill text-sm-center  position-relative  btn btn-outline-primary mx-2" href="{{route('cart-details')}}">
          <i class="bi bi-cart"></i> Cart
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 11px">
            {{Cart::content()->count()}}
          </span>
        </a>
        @if(Route::has('login'))
          @auth
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </button>
                <ul class="dropdown-menu">
                  <li><a href="{{url('/redirect/user/dashboard')}}"><button class="dropdown-item" type="button">Dashboard</button></a></li>
                  <li><a href="{{url('/redirect/user/profile')}}"><button class="dropdown-item" type="button">Profile</button></a></li>
                  <li><button class="dropdown-item" type="button">Something else here</button></li>
                </ul>
              </div>
          @else
          <a class="flex-sm-fill text-sm-center btn btn-outline-primary mx-2" href="{{url('about')}}" >ABOUT US</a>
          
          @endauth
        @endif
        
        
      </div>
    </div>
    </header>