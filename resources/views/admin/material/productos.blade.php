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
   
       
        <div class="col-md-12">

            

         
            <div class="row"> 
              @if  (auth()->user()->hasRoles(['Cliente']))
             @foreach ($productos as $item)
              
             
                 
               
                <div class="col-sm-6 col-md-12 col-lg-4" >
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
                                  
                                    <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{route('productad.show', $item->id)}}">Ver Detalle</a></div>
                                </form>
                            </div>  
                              
                          </div>
                        
                          
                          <div class="unit-body">
                            <h6 class="product-title"><a href="#">{{$item->nombre}}</a></h6>
                          
                            <h6 class="product-title">Precio: ${{$item->precio_unitario}}</h6>
                          
                            @endauth
                        
                            @endif
                          </div>
                      </div>
                    </article>
                </div>
                </div>
            @endforeach
            @endif





            @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
             @foreach ($productos3 as $item)
              
             
                 
               
                <div class="col-sm-6 col-md-12 col-lg-4" >
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
                                  
                                     <div class="product-button"><a class="button button-md button-white button-ujarak" href="{{route('productad.show', $item->id)}}">Ver Detalle</a></div> 
                                </form>
                            </div>  
                              
                          </div>
                        
                          
                          <div class="unit-body">
                            <h6 class="product-title"><a href="#">{{$item->nombre}}</a></h6>
                          
                            <h6 class="product-title">Precio: ${{$item->precio_unitario}}</h6>
                          
                            @endauth
                        
                            @endif
                          </div>
                      </div>
                    </article>
                </div>
                </div>
            @endforeach
            @endif
              </div>
        </div>


      





</div>
            
        



@include('admin/material/frm/agregarProductos')
     

@endsection


