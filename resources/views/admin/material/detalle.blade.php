@extends('admin.layouts.material')

@section('titulo')

Turza | Productos

@endsection



@section('section')

Detalle del producto


@endsection

@section('contenido')

 
<section class="section section-md section-first bg-default text-md-left">
    <div class="container">
        <div class="row row-50 justify-content-center">

           {{--  $collection[0]->title --}}
          
        <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{asset('/images/'.$productos[0]->image)}}" alt="" width="450" height="350"/>
            </div>
            
            <div class="col-md-12  col-lg-6   col-xl-6">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">{{$productos[0]->nombre}}</h4>
                  {{--   <p class="card-category"> Here is a subtitle for this table</p> --}}
                  </div> 
                  <div class="card-body">
                            
                                {{-- <h3>{{$productos->nombre}}</h3> --}}
                                
                                    
                                @if (Route::has('login'))
                                @auth
                                
                                <form action="{{route('cart.add')}}" method="post">
                                    {!! csrf_field()  !!}
                                <div class="" >
                                    {{-- <h4 class="mt-4">{{$item->nombre}}</h4> --}}
                                    <ul>
                                        <li class="nav-item mt-2" role="presentation"><b>Descripción:</b> {{$productos[0]->descripcion}} </li>
                                        <li><p>Cantidad: <input type="number" name="quantity" value="1" min="1" max="10000"> </p></li>
                                    
                                   
                                       
                                        <div class="row">   
                                                <div class="col">
                                                    <h4><p class="nav-item mt-2 float-right" role="presentation"><b>Precio Unitario:</b> ${{number_format($productos[0]->precio_unitario,2)}}</p></h4>
                                                </div>
                                            </div>

                                    
                                    
                                    </ul>
                                
                                </div>
                            {{--  @if  (auth()->user()->hasRoles(['Cliente'])) --}}
                       
                             
                                <div class="text-center">
                                    <input type="hidden" name="producto_id" value="{{$productos[0]->id}}">
                                    <button type="submit" value="Agregar al carrito" class="btn btn-warning" ><span class="material-icons">
                                        add_shopping_cart
                                        </span>  Agregar al Carrito</button> 
                                    </div>
                               
                                   
                            </form>
                                @endauth
                                @endif
                        
                  </div>
                </div>
            </div>
        </div>         

           
         
          
        </div>
    </div>
     
</section> 
            
     


@endsection