<div class="sidebar" data-color="purple" data-background-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
      <a href="{{route('admin.dashboard')}}" class="simple-text logo-mini"><img src="{{asset('/images/logo_turza.png')}}" alt="" width="166" height="17"/>

      </a>
     {{--  <a href="" class="simple-text logo-normal">
        Alimento SoloAlimentos,C.A
      </a> --}}
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
     {{--    @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
        <li class="nav-item{{ (request()->is('admin*')) ? 'active' : '' }} ">
          <a class="nav-link" href="{{route('admin.dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Inicio</p>
          </a>
        </li>
        @endif --}}

       
        @if  (auth()->user()->hasRoles(['Cliente', 'Administrador']))
        <li class="nav-item {{ (request()->is('productad*')) ? 'active' : '' }} ">
          <a class="nav-link" href="{{route('productad.index')}}">
            <i class="material-icons">dashboard</i>
            <p>Productos</p>
          </a>
         {{--  <ul class="nav-item">
            <a class="nav-link"  href="{{route('productad.index')}}">   <i class="material-icons">dashboard</i>
              <p>Agregar Productos</p></a>
              
          </ul> --}}
        </li>
        @endif

        @if  (auth()->user()->hasRoles(['Cliente', 'Administrador', 'Operador']))
        <li class="nav-item {{ (request()->is('pedidos*')) ? 'active' : '' }}">
          <a class="nav-link" href="{{route('pedidos.index')}}">
            <i class="material-icons">person</i>
            <p>Pedidos</p>
          </a>
        </li>
        @endif
        @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
  
          <li class="nav-item {{ (request()->is('usuarios*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('usuarios.index')}}">
              <i class="material-icons">person</i>
              <p>Usuarios</p>
            </a>
          </li>
        

          <li class="nav-item {{ (request()->is('clientes*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('clientes.index')}}">
              <i class="material-icons">person</i>
              <p>Clientes</p>
            </a>
          </li>

          <li class="nav-item {{ (request()->is('vendedor*')) ? 'active' : '' }}">
            <a class="nav-link" href="{{route('vendedor.index')}}">
              <i class="material-icons">person</i>
              <p>Vendedores</p>
            </a>
          </li>

          
          @endif
         
 
        <!-- your sidebar here -->
      </ul>
    </div>
  </div>