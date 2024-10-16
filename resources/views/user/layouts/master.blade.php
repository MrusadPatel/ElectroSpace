<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>
        @yield('title')
    </title>

    @yield('metas')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('user/css/splide.min.css')}}">
    @vite(['resources/js/app.js'])

    <style>
        a
        {
          text-decoration: none;
          color: black;
        }

        .menu-container {
            display: flex;
        }
        .menu-tier {
            min-width: 200px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .menu-tier:last-child {
            border-right: none;
        }
        .menu-item {
            position: relative;
            cursor: pointer;
        }
        .menu-item > a {
            display: block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            color: #212529;
        }
        .menu-item:hover > a {
            background-color: #e9ecef;
        }
        .submenu {
            display: none;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 1000;
        }
        .menu-item:hover > .submenu {
            display: block;
        }

        .flash-sale-banner {
            background-color: #ff6b6b;
            color: white;
            padding: 20px;
        }
        .countdown {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .btn-products {
            background-color: white;
            color: #ff6b6b;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-products:hover {
            background-color: #ff8c8c;
            color: white;
        }
        @media (max-width: 767.98px) {
            .flash-sale-banner .row > div {
                text-align: center;
                margin-bottom: 15px;
            }
        }

        .product-card {
            max-width: 300px;
            margin: 20px auto;
        }
        .badge-top-left {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .wishlist-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
            color: #6c757d;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .wishlist-btn:hover {
            border-color: #007bff;
            color: #007bff;
        }
        .wishlist-btn.active {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }
       

      </style>
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
        @include('user.layouts.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
        {{-- @include('frontend.layouts.menu') --}}
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--============================
        Main Content Start
    ==============================-->
        @yield('content')
    <!--============================
       Main Content End
    ==============================-->


    

    <!--============================
        FOOTER PART START
    ==============================-->
        @include('user.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('user/js/splide.min.js')}}"></script>
        
    @stack('scripts')
    
</body>

</html>
