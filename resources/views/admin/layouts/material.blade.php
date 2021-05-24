<!doctype html>
<html lang="en">

<head>
  <title>@yield('titulo')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="icon" href="{{asset('/images/icon.ico')}}" type="image/x-icon">
  <!-- Material Kit CSS -->
  <link href="{{asset('/css/material-dashboard.css')}}" rel="stylesheet" />

  

  <link href="{{asset('/css/demo.css')}}" rel="stylesheet" />
{{--   <link href="{{asset('/css/style.css')}}" rel="stylesheet" /> --}}
 
</head>

<body>
  <div class="wrapper ">
   @include('admin.material.sidebar')






    <div class="main-panel">
      <!-- Navbar -->
     
      <nav class="navbar navbar-expand-lg  navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
            @include('admin.material.navbar')
        </div>
      </nav>



      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->

            @yield('contenido')

        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
            {{--     <a target="_blank" >
                  Zona Industrial Los Jarales, San Diego - Carabobo
                </a> --}}
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
                $(document).ready(function() {
                  $().ready(function() {
                    $sidebar = $('.sidebar');
            
                    $sidebar_img_container = $sidebar.find('.sidebar-background');
            
                    $full_page = $('.full-page');
            
                    $sidebar_responsive = $('body > .navbar-collapse');
            
                    window_width = $(window).width();
            
                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
            
                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                      if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                      }
            
                    }
            
                    $('.fixed-plugin a').click(function(event) {
                      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                      if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                          event.stopPropagation();
                        } else if (window.event) {
                          window.event.cancelBubble = true;
                        }
                      }
                    });
            
                    $('.fixed-plugin .active-color span').click(function() {
                      $full_page_background = $('.full-page-background');
            
                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');
            
                      var new_color = $(this).data('color');
            
                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                      }
            
                      if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                      }
            
                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                      }
                    });
            
                    $('.fixed-plugin .background-color .badge').click(function() {
                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');
            
                      var new_color = $(this).data('background-color');
            
                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                      }
                    });
            
                    $('.fixed-plugin .img-holder').click(function() {
                      $full_page_background = $('.full-page-background');
            
                      $(this).parent('li').siblings().removeClass('active');
                      $(this).parent('li').addClass('active');
            
            
                      var new_image = $(this).find("img").attr('src');
            
                      if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                          $sidebar_img_container.fadeIn('fast');
                        });
                      }
            
                      if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            
                        $full_page_background.fadeOut('fast', function() {
                          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                          $full_page_background.fadeIn('fast');
                        });
                      }
            
                      if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            
                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                      }
            
                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                      }
                    });
            
                    $('.switch-sidebar-image input').change(function() {
                      $full_page_background = $('.full-page-background');
            
                      $input = $(this);
            
                      if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar_img_container.fadeIn('fast');
                          $sidebar.attr('data-image', '#');
                        }
            
                        if ($full_page_background.length != 0) {
                          $full_page_background.fadeIn('fast');
                          $full_page.attr('data-image', '#');
                        }
            
                        background_image = true;
                      } else {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar.removeAttr('data-image');
                          $sidebar_img_container.fadeOut('fast');
                        }
            
                        if ($full_page_background.length != 0) {
                          $full_page.removeAttr('data-image', '#');
                          $full_page_background.fadeOut('fast');
                        }
            
                        background_image = false;
                      }
                    });
            
                    $('.switch-sidebar-mini input').change(function() {
                      $body = $('body');
            
                      $input = $(this);
            
                      if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;
            
                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
            
                      } else {
            
                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
            
                        setTimeout(function() {
                          $('body').addClass('sidebar-mini');
            
                          md.misc.sidebar_mini_active = true;
                        }, 300);
                      }
            
                      // we simulate the window Resize so the charts will get updated in realtime.
                      var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                      }, 180);
            
                      // we stop the simulation of Window Resize after the animations are completed
                      setTimeout(function() {
                        clearInterval(simulateWindowResize);
                      }, 1000);
            
                    });
                  });
                });
              </script>
            
            <script>
              document.write(new Date().getFullYear())
            </script>, 
            <a  target="_blank">Alimento SoloAlimentos,C.A</a>
          </div>
          <!-- your footer here -->
        </div>
      </footer>
    </div>
  </div>
</body>

  <script src="{{asset('/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/js/core/bootstrap-material-design.min.js')}}"></script>
 
 <script src="{{asset('/js/core/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
 <script src="{{('/js/core/plugins/moment.min.js')}}"></script>
 <script src="{{asset('/js/core/plugins/jquery.bootstrap-wizard.js')}}"></script>
 <script src="{{asset('/js/core/plugins/jquery.dataTables.min.js')}}"></script>
 <script src="{{asset('/js/core/plugins/bootstrap-tagsinput.js')}}"></script>
 <script src="{{asset('/js/core/plugins/jasny-bootstrap.min.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
 <script src="{{asset('/js/core/plugins/arrive.min.js')}}"></script>
  <script src="{{asset('/js/core/material-dashboard.js')}}" type="text/javascript"></script>
{{--   <script src="{{asset('/js/core/demo.js')}}"></script> --}}
  <script src="{{asset('/js/core/core.min.js')}}"></script>


  <script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
       $('#example').dataTable( {
         //ordering: false, me elimina el ordenamiento y la funcion de ordenar al darle clicl a los encabezados
           "order": [[ 0, "asc" ]],
        "language": {
        "sProcessing":   "Procesando...",
        "sLengthMenu":   "Mostrar _MENU_ registros",
        "sZeroRecords":  "No se encontraron resultados",
        "sInfo":         "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
        "sInfoEmpty":    "Mostrando desde 0 hasta 0 de 0 registros",
        "sInfoFiltered": "(filtrado de _MAX_ registros en total)",
        "sInfoPostFix":  "",
        "sSearch":       "Buscar:",
        "sUrl":          "",
        "oPaginate": {
          "sFirst":    "Primero",
          "sPrevious": "Anterior",
          "sNext":     "Siguiente",
          "sLast":     "Último"
}
}
  } );
} );
  </script>
  
  
  
</html>