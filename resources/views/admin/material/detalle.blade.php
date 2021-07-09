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

      
            
     

        <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{asset('/images/'.$productos->image)}}" alt="" width="450" height="350"/>
            </div>
            
            <div class="col-md-12  col-lg-6   col-xl-6">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title ">{{$productos->nombre}}</h4>
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
                                        <li class="nav-item mt-2" role="presentation"><b>Descripción:</b> {{$productos->descripcion}} </li>
                                        <li><p>Cantidad: <input type="number" name="quantity" value="1" min="1" max="10000"> </p></li>
                                    
                                        @if  (auth()->user()->hasRoles(['Vendedor']))
                                         <li>  <p> 
                                              
                                                
                                                   Precio acordado con el cliente:
                                                        <input type="number"  name="precio"    value="{{old('telefono')}}">
                                                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                                                  
                                       
                                            </p> </li>
                                        @else
                                        <div class="row">   
                                                <div class="col">
                                                    <h4><p class="nav-item mt-2 float-right" role="presentation"><b>Precio Unitario:</b> ${{number_format($productos->precio,2)}}</p></h4>
                                                </div>
                                            </div>

                                        @endif 
                                    
                                    </ul>
                                
                                </div>
                            {{--  @if  (auth()->user()->hasRoles(['Cliente'])) --}}
                       
                             
                                <div class="text-center">
                                    <input type="hidden" name="producto_id" value="{{$productos->id}}">
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