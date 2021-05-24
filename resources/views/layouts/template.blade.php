<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
    <head>
        <title> @yield('titulo')</title>
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <link rel="icon" href="{{asset('images/icon.ico')}}" type="image/x-icon">
        <!-- Stylesheets-->
        {{-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Poppins:300,400,500"> --}}
        <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
        <link rel="stylesheet" href="{{asset('/css/fonts.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    
    </head>
    <body>
           
        <div class="page">
           
            <header class="section page-header">
                <!--------------------------------------- MENU--------------------------------------------------------------->
                @include('componentes.menu')
            </header>

            @yield('banner')
            

            @yield('contenido')


            <!-- ------------------------------------------------Footer------------------------------------------->
            <footer class="section footer-variant-2 footer-modern context-dark section-top-image section-top-image-dark">
                
                @include('componentes.footer')
                
            </footer>
        </div>

    
        <script src="{{asset('/js/core.min.js')}}"></script>
        <script src="{{asset('/js/script.js')}}"></script>
      
    </body>
</html>