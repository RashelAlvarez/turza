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
        
            <div class="col-md-10 col-lg-7 col-xl-6 mb-1">
                <h3>{{$productos->nombre}}</h3>
                
                    
                @if (Route::has('login'))
                @auth
                
                <form action="{{route('cart.add')}}" method="post">
                    {!! csrf_field()  !!}
                <div class="" >
                    {{-- <h4 class="mt-4">{{$item->nombre}}</h4> --}}
                    <ul class="">
                    <li class="nav-item mt-2" role="presentation"><b>Descripción:</b> {{$productos->descripcion}} </li>
                
                   {{--  <li class="nav-item mt-2" role="presentation"><b>Impuesto:</b> {{$productos->impuesto}}</li> --}}
                    
                    <li><p>Cantidad: <input type="number" name="quantity" value="1" min="1" max="10000"> </p></li>
                    <div class="row">
                        <div class="col">
                            <h4><p class="nav-item mt-2 float-right" role="presentation"><b>Precio Unitario:</b> ${{number_format($productos->precio,2)}}</p></h4>
                        </div>
                    </div>
                    
                    </ul>
                  
                        
                    
                   

                     
                    
                    
                </div>
               {{--  @if  (auth()->user()->hasRoles(['Cliente'])) --}}
                <div class="text-center">
                    <input type="hidden" name="producto_id" value="{{$productos->id}}">
                    <button type="submit" value="Agregar al carrito" class="btn btn-warning" ><span class="material-icons">
                        add_shopping_cart
                        </span>  Agregar al Carrito</button> 
                     </div>
{{-- 
                @endif --}}
            </form>
                @endauth
                @endif
            </div>

           
         
          
        </div>
    </div>
     
</section> 
            
     


@endsection