<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('frontend') }}/fonts/icomoon/style.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="{{ asset('frontend') }}/css/aos.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">

</head>

<body>

    <div class="site-wrap">


        @include('frontend.partials._navbar')

        @yield('content')

        @include('frontend.partials._footer')

        
    </div>

    <script src="{{ asset('frontend') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery-ui.js"></script>
    <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/js/aos.js"></script>

    <script src="{{ asset('frontend') }}/js/main.js"></script>

</body>

</html>
