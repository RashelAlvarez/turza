@extends('admin.layouts.material')

@section('titulo')

Turza | Productos

@endsection



@section('section')

Productos


@endsection

@section('contenido')
<div class="container-fluid">
    @if (session('exito'))
    <div class="alert alert-success">
      {{ session('exito') }}
    </div>
    @endif
    @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
    <button type="button"  class="btn btn-warning mb-3" data-toggle="modal" data-target="#agregarProducto">
        Agregar Productos
      </button>
    @endif
   {{--    <h4 class="c-grey-900 mT-10 mB-30">Productos</h4> --}}
       
        <div class="col-md-12">

            <div class="row">
        
            <!-------------------------------------------- Productos----------------------------------------->
        
            @foreach ($productos as $item)
                
           
                
                <!-------------------------------------------1er producto--------------------------------->
                <div class="col-sm-6 col-md-12 col-lg-4">
                <div class="oh-desktop">
                    
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                    <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                        <div class="product-figure"><img src="images/{{$item->image}}" alt="" width="270" height="280"/>
                        @if (Route::has('login'))
                        @auth
                        <form action="{{route('cart.add')}}" method="post">
                            {!! csrf_field()  !!}
                        <input type="hidden" name="producto_id" value="{{$item->id}}">
                        
                        
                         
                      
                            {{-- <div class="product-button">   <input type="submit" value="Agregar al carrito" class="button button-md button-white button-ujarak"></div>
                       
                    --}}
                            
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{route('productad.show', $item->id)}}">Ver Detalle</a></div>
                        </div>  
                        
                        </div>
                       {{--  <p>Ingresar Cantidad: <input type="number" name="quantity" value="1" min="1" max="10000"> </p> --}}
                    </form>
                        <div class="unit-body">
                        <h6 class="product-title"><a href="#">{{$item->nombre}}</a></h6>
                      
                        <h6 class="product-title">Precio: ${{$item->precio}}</h6>
                       
                        @endauth
                    
                        @endif
                        </div>
                    </div>
                    </article>
                </div>
                </div>
            @endforeach
            </div>
        </div>


      





</div>
            
        



@include('admin/material/frm/agregarProductos')
     


@endsection