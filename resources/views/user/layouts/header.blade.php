<header style="height: 90px;" class="nav navbar fixed-top bg-body-tertiary">
    <div class="container container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="images/logo.png" alt="Logo" width="200" height="60" class="d-inline-block align-text-top">
        
      </a>
      
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
            <a href="{{route('login')}}" ><button type="button" class="btn btn-outline-primary mx-1">LOGIN</button></a>
            <a href="{{route('register')}}" ><button type="button" class="btn btn-outline-primary mx-1">REGISTER</button></a>
          @endauth
        @endif
        <a class="flex-sm-fill text-sm-center  btn btn-outline-primary mx-1" href="{{url('login')}}"><i class="bi bi-cart"></i> Cart</a>
        <a class="flex-sm-fill text-sm-center btn btn-outline-primary mx-1" href="{{url('about')}}">ABOUT US</a>
        <a class="flex-sm-fill text-sm-center btn btn-outline-primary mx-1" href="{{url('contact')}}" >CONTACT</a>
      </div>
    </div>
    </header>