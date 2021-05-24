 
 @extends('layouts.template')
 
 
 @section('titulo')

Turza | Productos

@endsection
 
 
 
 
 
 @section('contenido')
 
 <section class="section section-md section-first bg-default text-md-left">
    <div class="container">
        <div class="row row-50 justify-content-center">

      
           
     

        <div class="col-md-10 col-lg-5 col-xl-6"><img src="{{asset('/images/'.$productos->image)}}" alt="" width="450" height="350"/>
            </div>
        
            <div class="col-md-10 col-lg-7 col-xl-6 mb-1">
                <h2>Detalle del producto</h2>
                
                    
            
                <div class="" >
                    <h4 class="mt-4">{{$productos->nombre}}</h4>
                    <ul class="">
                    <li class="nav-item mt-2" role="presentation"><b>Descripción:</b> {{$productos->descripcion}} </li>
                
                    <li class="nav-item mt-2" role="presentation"><b>Impuesto:</b> {{$productos->impuesto}}</li>
                    
                    </ul>
                   
                    <a class="button button-primary button-pipaluk" href="{{url('login')}}">Ingresar para hacer pedido</a>
                  
                    
                </div>
            </div>

           
         
          
        </div>
    </div>
     
</section> 

@endsection