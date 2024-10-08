@extends('user.layouts.master')
{{-- @section('title')
{{$settings->site_name}} || e-Commerce HTML Template
@endsection --}}

@section('content')

    @include('user.home.sections.banner-slider')
    
 
 
  <!-- section 1 :- our best Tour Satrts here -->

    @include('user.home.sections.best-products')

  <!-- section 2 our services starts here -->

  @include('user.home.sections.our-services')

  <!-- section 3 testimonials start here -->

  @include('user.home.sections.testimonials')

@endsection
