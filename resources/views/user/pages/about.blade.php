@extends('user.layouts.master')

{{-- @section('title')
{{$settings->site_name}} || About
@endsection --}}

@section('content')
    


    <!--============================
        ABOUT PAGE START
    ==============================-->
    <section class="container my-5 pt-4  pb-5">
        <h1 class="text-center mt-5 mb-5">About ElectroSpace</h1>
        
        <div class="row">
            <div class="col-md-6">
                <img src="/api/placeholder/600/400" alt="ElectroTech Store" class="img-fluid rounded mb-3">
            </div>
            <div class="col-md-6">
                <h2>Our Story</h2>
                <p>Founded in 2010, ElectroTech has been at the forefront of the online electronics retail industry. We started with a simple mission: to provide high-quality electronics at competitive prices with exceptional customer service.</p>
                <p>Over the years, we've grown from a small startup to a leading online electronics retailer, serving customers worldwide with a wide range of products from smartphones and laptops to smart home devices and audio equipment.</p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-4">
                <h3>Our Mission</h3>
                <p>To empower our customers with cutting-edge technology and unparalleled support, making their digital lives easier and more enjoyable.</p>
            </div>
            <div class="col-md-4">
                <h3>Our Vision</h3>
                <p>To be the go-to destination for all electronic needs, known for our extensive selection, competitive prices, and exceptional customer experience.</p>
            </div>
            <div class="col-md-4">
                <h3>Our Values</h3>
                <ul>
                    <li>Customer-first approach</li>
                    <li>Innovation and adaptability</li>
                    <li>Integrity and transparency</li>
                    <li>Environmental responsibility</li>
                </ul>
            </div>
        </div>

        <div class="text-center mt-5">
            <h2>Why Choose ElectroTech?</h2>
            <div class="row mt-4">
                <div class="col-md-3">
                    <img src="/api/placeholder/80/80" alt="Wide Selection" class="rounded-circle mb-3">
                    <h4>Wide Selection</h4>
                    <p>Over 10,000 products from top brands</p>
                </div>
                <div class="col-md-3">
                    <img src="/api/placeholder/80/80" alt="Expert Support" class="rounded-circle mb-3">
                    <h4>Expert Support</h4>
                    <p>24/7 customer service</p>
                </div>
                <div class="col-md-3">
                    <img src="/api/placeholder/80/80" alt="Fast Shipping" class="rounded-circle mb-3">
                    <h4>Fast Shipping</h4>
                    <p>Free delivery on orders over $50</p>
                </div>
                <div class="col-md-3">
                    <img src="/api/placeholder/80/80" alt="Secure Shopping" class="rounded-circle mb-3">
                    <h4>Secure Shopping</h4>
                    <p>SSL encryption and multiple payment options</p>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        ABOUT PAGE END
    ==============================-->
@endsection
