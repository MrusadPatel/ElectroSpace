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
    @vite(['resources/js/app.js'])

    <style>
        a
        {
          text-decoration: none;
          color: black;
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
    <script>
        @if ($errors->any())
             @foreach ($errors->all() as $error)
                alert('{{ $error }}');
             @endforeach
        @endif
    </script>
</body>

</html>
