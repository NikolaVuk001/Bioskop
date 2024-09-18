<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#000000">
        
        <title>Bioskop</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

        <link rel="icon" href= "{{asset('assets/icons/cinema-svgrepo-com.svg')}}" 
          type="image/x-icon"> 

        {{-- Personal CSS --}}
        <link rel="stylesheet" href="{{asset('css/app-sW5s0cay.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css?r=12565')}}">
        {{-- Bootstrap CSS --}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">        
        {{-- Owl Carousel CSS --}}
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">    
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">    
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
        {{-- Frontend Theme CSS --}}        
        <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/default.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">


        {{-- CSS Style Za Vece Button-e u Bootstrapu --}}
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/tutorials/buttons/button-1/assets/css/button-1.css">

        {{-- Stirpe Js --}}
        <script src="https://js.stripe.com/v3/"></script>


        {{-- Toaser Css Notifikacije --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >


        <!-- Responsive datatable examples -->
        <link href="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" /> 

        <!-- DataTables -->
        <link href="{{ asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- jquery.vectormap css -->
        <link href="{{ asset('backend/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

         <!-- Responsive examples -->
         <script src="{{ asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
         <script src="{{ asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

         <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        
        

       

        
        
        

        
        
        
        
        <script src="{{asset('js/form-multiple-click-prevent.js')}}"></script>       
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>        
        <script src="{{asset('js/modalVideoClosing.js')}}"></script>
       
        
        
        
        
        
    </head>
    <body class="d-flex flex-column min-vh-100">
        
        @include('inc.navbar')            
            <main>                                            
            
                @yield('content')                                                
            </main>
        @include('inc.footer')




        {{-- JS --}}
        {{-- Laravel Startup JS --}}
        <script src="{{ asset('js\all.min.js') }}"></script>
        <script src="{{ asset('js\app-JzZ5dANH.js') }}"></script>
        {{-- BootStrap JS --}}
        <script src="{{ asset('js\bootstrap.bundle.min.js') }}"></script>       
        {{-- Personal JS --}}
        <script src="{{ asset('js\DateSkripta.js') }}"></script>
        <script src="{{ asset('js\InputDateFunc.js') }}"></script>
        {{-- DatePicker JS --}}
        <script src="{{ asset('js\NativeDatePicker.js') }}"></script>
        {{-- Jquery JS --}}
        <script src="{{ asset('js\jquery-3.5.1.min.js') }}"></script>
        {{-- Owl Carousel JS --}}
        <script src="{{ asset('js\owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js\owl.carousel.js') }}"></script>
        <script src="{{ asset('js\owl-carousel.js') }}"></script>
        {{-- Fontawsome Icons JS --}}
        <script src="https://kit.fontawesome.com/4218e3e5e5.js" crossorigin="anonymous"></script>
        {{-- Frontend Theme JS --}}
        <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
        
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/element-in-view.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-form.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

        {{-- Validation Script --}}
        <script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

        {{-- Toester Skripta Za Notifikacije--}}
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>

         
        
        
        
    </body>
    
</html>

