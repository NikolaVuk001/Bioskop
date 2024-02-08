<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>Bioskop</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

        {{-- Personal CSS --}}
        <link rel="stylesheet" href="css/app-sW5s0cay.css">
        <link rel="stylesheet" href="css/app.css">
        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        {{-- Owl Carousel CSS --}}
        <link rel="stylesheet" href="css/owl.carousel.css">    
        <link rel="stylesheet" href="css/owl.carousel.min.css">    
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        {{-- Frontend Theme CSS --}}        
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
        

        
        

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="js/jquery-3.5.1.min.js"></script>        
        <script src="js/modalVideoClosing.js"></script>
       
        
        
        
        
        
    </head>
    <body class="">
        
        @include('inc.navbar')
            <!-- Page Content -->
            <main>                                            
                
                @yield('content')                                                
            </main>
        @include('inc.footer')




        {{-- JS --}}
        {{-- Laravel Startup JS --}}
        <script src="js\all.min.js"></script>
        <script src="js\app-JzZ5dANH.js"></script>
        {{-- BootStrap JS --}}
        <script src="js\bootstrap.js"></script>
        <script src="js\bootstrap.min.js"></script>
        {{-- Personal JS --}}
        <script src="js\DateSkripta.js"></script>
        <script src="js\InputDateFunc.js"></script>
        {{-- DatePicker JS --}}
        <script src="js\NativeDatePicker.js"></script>
        {{-- Jquery JS --}}
        <script src="js\jquery-3.5.1.min.js"></script>
        {{-- Owl Carousel JS --}}
        <script src="js\owl.carousel.min.js"></script>
        <script src="js\owl.carousel.js"></script>
        <script src="js\owl-carousel.js"></script>
        {{-- Fontawsome Icons JS --}}
        <script src="https://kit.fontawesome.com/4218e3e5e5.js" crossorigin="anonymous"></script>
        {{-- Frontend Theme JS --}}
        <script src="{{asset('frontennd/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/element-in-view.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/slick.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/ajax-form.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/wow.min.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/plugins.js')}}"></script>
        <script src="{{asset('frontennd/assets/js/main.js')}}"></script>
    </body>
    
</html>

