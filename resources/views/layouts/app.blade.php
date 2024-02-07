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

        <link rel="stylesheet" href="css/app.css">
        
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">

        <link rel="stylesheet" href="css/bootstrap.css">

     
        <link rel="stylesheet" href="css/owl.carousel.css">    
        <link rel="stylesheet" href="css/owl.carousel.min.css">    
        <link rel="stylesheet" href="css/owl.theme.default.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="js\modalVideoClosing.js"></script>
        
    </head>
    <body class="font-sans antialiased">
        

            <!-- Page Content -->
            <main>
                @include('inc.navbar')
                @yield('content')
                
                
            </main>
        </div>
    </body>
    <script src="js\all.min.js"></script>
<script src="js\bootstrap.bundle.min.js"></script>
<script src="js\bootstrap.js"></script>
<script src="js\bootstrap.min.js"></script>



<script src="js\DateSkripta.js"></script>
<script src="js\InputDateFunc.js"></script>
<script src="js\jquery-3.5.1.min.js"></script>
<script src="js\jquery.min.js"></script>

<script src="js\NativeDatePicker.js"></script>
<script src="js\owl.carousel.min.js"></script>
<script src="js\owl.carousel.js"></script>
<script src="js\owl-carousel.js"></script>
<script src="js\popper.js"></script>
<script src="https://kit.fontawesome.com/4218e3e5e5.js" crossorigin="anonymous"></script>
</html>

