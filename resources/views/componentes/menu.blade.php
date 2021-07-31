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
              
            
              <!-- RD Navbar Nav-->
              <ul class="rd-navbar-nav">
               {{--  @if(Auth::check())
                  
           
             
                        <li class="rd-nav-item {{request()->is('/') ? 'active' : ''}}"><a class="rd-nav-link " href="{{url('productos')}}">Productos</a>
                        </li>

                           
                        <!---------------------------------------------- CARRITO DE COMPRAS RD Navbar Basket-->
                        <div class="rd-navbar-basket-wrap mt-4">
                          <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                          <div class="cart-inline">
                            <div class="cart-inline-header">
                              <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                              <h6 class="cart-inline-title">Total price:<span> $800</span></h6>
                            </div>
                            <div class="cart-inline-body">
                              <div class="cart-inline-item">
                                <div class="unit align-items-center">
                                  <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-1-108x100.png" alt="" width="108" height="100"/></a></div>
                                  <div class="unit-body">
                                    <h6 class="cart-inline-name"><a href="#">Blueberries</a></h6>
                                    <div>
                                      <div class="group-xs group-inline-middle">
                                        <div class="table-cart-stepper">
                                          <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                        </div>
                                        <h6 class="cart-inline-title">$550</h6>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="cart-inline-item">
                                <div class="unit align-items-center">
                                  <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="images/product-mini-2-108x100.png" alt="" width="108" height="100"/></a></div>
                                  <div class="unit-body">
                                    <h6 class="cart-inline-name"><a href="#">Avocados</a></h6>
                                    <div>
                                      <div class="group-xs group-inline-middle">
                                        <div class="table-cart-stepper">
                                          <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                        </div>
                                        <h6 class="cart-inline-title">$250</h6>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="cart-inline-footer">
                              <div class="group-sm"><a class="button button-md button-primary button-pipaluk" href="#">Carrito de Compras</a></div>
                            </div>
                          </div>
                        </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>2</span></a>

                      <!------------------------------------------------------------------------------------------------>
                        <div class=" dropdown">
                          <a id="navbarDropdown" class="rd-nav-link dropdown-toggle" href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} <span class="caret"></span>
                          </a>
                          
                          <div class="  dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>  <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                          
                                  Cerrar Sesión
                              </a>
                            
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            </li>
      
                          
                          </div>
                        </div>
          
                    
                  
                  
                        
                @endif
 --}}

              
                  
            
                   
                 

                



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
                  {{--   <li class="rd-nav-item {{request()->is('registrar') ? 'active' : ''}}"><a class="rd-nav-link" href="{{url('registrar')}}">Registrar</a>
                    </li> --}}
               
               
                
              </ul>
            </div>
 
          </div>

        </div>
      </div>
    </nav>
  </div>