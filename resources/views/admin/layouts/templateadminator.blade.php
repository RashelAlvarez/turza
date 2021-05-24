<!doctype html>
<html >
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Dashboard</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}
    #loader.fadeOut{opacity:0;visibility:hidden}
    .spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);
    background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;
    animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link href="{{asset('/css/adminator/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/fonts.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/adminator/index.scss')}}">
    <link rel="stylesheet" href="{{asset('/css/adminator/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/css/adminator/themify-icons.css')}}">

    </head>
<body class="app">
  {{--     <div id="loader">
        <div class="spinner"></div>
      </div>
      <script>window.addEventListener('load', function load() {
        const loader = document.getElementById('loader');
        setTimeout(function() {
          loader.classList.add('fadeOut');
        }, 100);
        });
      </script> --}}
{{-- <div>
    <div class="sidebar">
        @include('cliente.menu')
    </div>
    <div class="page-container">
      <div class="header navbar">
          
          @include('cliente.header')

      </div>
      <main class="main-content bgc-grey-100">
              <div id="mainContent">
                <div class="row gap-20 masonry pos-r">
            
              
                  @yield('contenido')

                </div>
              </div>
      </main>
    
  
      <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2021 All rights reserved.</span>
      </footer>
    </div>
</div> --}}
<div>
  <div class="sidebar">
    @include('cliente.menu')
  </div>
  <div class="page-container">
    <div class="header navbar">
     @include('cliente.header')
    </div>
    <main class="main-content bgc-grey-100">
      <div id="mainContent">
      {{--   <div class="row gap-20 masonry pos-r">
          <div class="masonry-sizer col-md-6"></div> --}}
          
          @yield('contenido')
      
         
   {{--  </div> --}}
      </div> 
    </main>
    <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2021 All rights reserved.</span>
    </footer>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="{{asset('/js/adminator/vendor.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/adminator/bundle.js')}}"></script>
  
  <script type="text/javascript" src="{{asset('/js/adminator/vendor.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/adminator/bundle.js')}}"></script>
  
  <script src="{{asset('/js/script.js')}}"></script>
  <script src="{{asset('/js/core.min.js')}}"></script>
  <script src="{{asset('/js/adminator/bootstrap.min.js')}}"></script>
  
</body>
</html>