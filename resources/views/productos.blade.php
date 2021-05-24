
@extends('layouts.template')
@section('titulo')
Productos
@endsection

@section('contenido')
 
<section class="section section-md bg-default">
    <div class="container">
        <div class="oh">
            <h2 class="wow slideInUp" data-wow-delay="0s">Productos</h2>
        </div>
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
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="">Agregar al carrito</a></div>
                        @endauth
                        
                        

                        @endif
                  {{--           
                        <div class="product-button"><a class="button button-md button-white button-ujarak" href="ingresar">Ver Detalle</a></div>
                        </div> --}}
                        
                        </div>
                        <div class="unit-body">
                        <h6 class="product-title"><a href="#">{{$item->nombre}}</a></h6>
                        @if (Route::has('login'))
                        @auth
                        <h6 class="product-title">Precio: ${{$item->precio}}</h6>
                        @endauth
                        @endif
                        <div class="product-price-wrap">
                
                        </div><a class="button button-sm button-secondary button-ujarak" href="#">Detalle</a>
                        </div>
                    </div>
                    </article>
                </div>
                </div>
            @endforeach
                <!-------------------------------------------2do producto--------------------------------->
            {{--     <div class="col-sm-6 col-md-12 col-lg-4">
                <div class="oh-desktop"> 
                
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                    <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                        <div class="product-figure"><img src="images/mortadela4.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Detalle</a></div>
                        </div>
                        </div>
                        <div class="unit-body">
                        <h6 class="product-title"><a href="#">Mortadela de pollo tipo especial 1kg</a></h6>
                        <div class="product-price-wrap"> 
                
                    </div>
                    </article>
                </div>
                </div> --}}
                <!-------------------------------------------3er producto--------------------------------->
            {{--     <div class="col-sm-6 col-md-12 col-lg-4">
                    <div class="oh-desktop"> 
                    
                    <article class="product product-2 box-ordered-item wow slideInLeft" data-wow-delay="0s">
                        <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                            <div class="product-figure"><img src="images/mortadela5.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Detalle</a></div>
                            </div>
                        </div>
                        <div class="unit-body">
                            <h6 class="product-title"><a href="#">Mortadela de pollo tipo especial 500gr</a></h6>
                            <div class="product-price-wrap"> 
                    
                        </div>
                    </article>
                    </div>
                </div> --}}
        
            
            
        </div>
    </div>
</section>


@endsection