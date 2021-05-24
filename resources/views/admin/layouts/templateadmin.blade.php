<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('/css/admin/bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!---Data tables-->
      <link href="{{asset('/css/admin/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('/css/admin/AdminLTE.css')}}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{asset('/images/icon.ico')}}" type="image/x-icon">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{asset('/css/admin/_all-skins.css')}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <body class="skin-red">
    <div class="wrapper">


      @include('admin.component.header')




      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

         <!--------------------------------------------- SIDEBAR MENU----------------------------------------------------------- -->
        @include('admin.component.menu')
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            @yield('header')
           {{--  <small>Optional description</small> --}}
          </h1>
        
        </section>

        <!------------------------------------------------------------ CONTENIDO --------------------------------------------->
        <section class="content">
          
          <!-- Your Page Content Here -->



          @yield('content')
















        </section><!--------------------------------------------- FIN CONTENIDO ------------------------------------------------->




      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
       {{--  <div class="pull-right hidden-xs">
          Anything you want
        </div> --}}
        <!-- Default to the left --> 
        <strong>Copyright &copy; 2021 <a href="#">Turza</a>.</strong> Todos los derechos reservados.
      </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
    <script src="{{asset('/js/admin/jQuery-2.1.3.min.js')}}"></script>
    <script src="{{asset('/js/admin/jquery-ui-1.10.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('/js/admin/bootstrap.js')}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('/js/admin/app.js')}}" type="text/javascript"></script>
      <!-- DATA TABES SCRIPT -->
    <script src="{{asset('/js/admin/jquery.dataTables.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/admin/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>