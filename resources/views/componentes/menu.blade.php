<div class="rd-navbar-wrap rd-navbar-modern-wrap">
    <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
      <div class="rd-navbar-main-outer">
        <div class="rd-navbar-main">
          <!-- RD Navbar Panel-->
          <div class="rd-navbar-panel">
            <!-- RD Navbar Toggle-->
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <!-- RD Navbar Brand-->
            <div class="rd-navbar-brand"><a class="brand" href="{{url('/')}}"><img src="{{asset('images/logo_turza.png')}}" alt="" width="196" height="47"/></a></div>
          </div>
          <div class="rd-navbar-main-element">
            <div class="rd-navbar-nav-wrap">
              
            
              <ul class="rd-navbar-nav">
               
                    <li class="rd-nav-item {{request()->is('/') ? 'active' : ''}}"><a class="rd-nav-link " href="{{url('/')}}">Inicio</a>
                    </li>
                    <li class="rd-nav-item {{request()->is('nosotros') ? 'active' : ''}}"><a class="rd-nav-link " href="{{url('nosotros')}}">Nosotros</a>
                    </li>
                    <li class="rd-nav-item {{request()->is('recetas') ? 'active' : ''}}"><a class="rd-nav-link " href="{{url('recetas')}}">Recetas</a>
                    </li>
                
                    <li class="rd-nav-item {{request()->is('contacto') ? 'active' : ''}}"><a class="rd-nav-link" href="{{url('contacto')}}">Contacto</a>
                    </li>
                    <li class="rd-nav-item {{request()->is('login') ? 'active' : ''}}"><a class="rd-nav-link" href="{{url('login')}}">Ingresar</a>
                    </li>
               
                
              </ul>
            </div>
 
          </div>

        </div>
      </div>
    </nav>
  </div>