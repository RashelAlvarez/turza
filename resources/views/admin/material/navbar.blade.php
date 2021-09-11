
  
      <div class="navbar-wrapper ">
        <a class="navbar-brand" href="javascript:;">@yield('section')</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse  justify-content-end">
        <ul class="navbar-nav ">

       
        @if  (auth()->user()->hasRoles(['Cliente', 'Administrador']))

          <li class="nav-item">
              <a class="nav-link" href="{{route('cart.checkout')}}">
                Ver Carrito
                <span class="material-icons">
                  add_shopping_cart
                  </span>
                  
                  @if (count(Cart::getContent()))
          
                  <span class="notification">{{count(Cart::getContent())}}</span>
                  
              
                  @endif
                
              
              </a>
            {{--  @include('admin.material.carrito') --}}
          </li> 
        @endif
       
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             
              <i class="material-icons">notifications</i>
              @if($count= auth()->user()->unreadNotifications->count())
            <span class="notification">
              
              {{$count}}</span>
              @endif
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
           
              @foreach(auth()->user()->unreadNotifications as $unreadNotifications)
                
              
              <a class="dropdown-item  " href="{{-- {{$unreadNotifications->data['link']}} --}}"><span class="material-icons">
                priority_high
                </span> {{   $unreadNotifications->data['text'] }}</a>
          
              @endforeach

 
            
            
            </div>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>  <span class="hidden-xs"> {{ Auth::user()->email }} </span><i class="material-icons">arrow_drop_down</i> 
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              {{-- <a class="dropdown-item" href="#">Perfil</a> --}}
 
       
              <a class="dropdown-item"  href="{{ route('logout') }}"   onclick="event.preventDefault();
              document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i>    Cerrar Sesión</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </li>

         





          <!-- your navbar here -->
        </ul>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{-- la funcion sumar() va a contar las cantidades que se estan sumando al carrito --}}
{{-- <script>
      function sumar() {

        var total = 0;

        $(".monto").each(function() {

          if (isNaN(parseFloat($(this).val()))) {

            total += 0;

          } else {

            total += parseFloat($(this).val());

          }

        });

        //alert(total);
        document.getElementById('spTotal').innerHTML = total;

        }



        function multiplicar(){
          m1 = document.getElementById("cantidad").value;
          m2 = document.getElementById("pu").value;
          r = m1*m2;
          document.getElementById("subTotal").value = r;
        }
</script> --}}