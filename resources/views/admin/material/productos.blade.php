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

            
              {{-- <form method="post" action="{{url('/productad/'.$item->razon_social.'/mostrarProductos')}}"> --}}
                <div class="col-sm-4">
                    <div class="form-group {{ $errors->has('cliente_id') ? 'has-error' : ''}}"> 
                      <select class="select form-control-sm custom-select" id="cliente_id" name="cliente_id">
                          <option selected disabled>Selecciona el cliente:</option>
                          
                            @foreach ($clientes as $item)
                              <option value="{{$item->id}}">{{$item->razon_social}}</option>
                              
                            @endforeach
                        </select>
                    </div>
                  </div>
              {{-- </form> --}}
            <!-------------------------------------------- Productos----------------------------------------->
            <div class="row"> 
             @foreach ($productos as $item)
              
           
                 
               
                <div class="col-sm-6 col-md-12 col-lg-4" id="productos">
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
                        </div>  
                        
                        </div>
                       
                    </form>
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
              </div>
        </div>


      





</div>
            
        



@include('admin/material/frm/agregarProductos')
     

<script>

    //jquery obtienes de forma muy sencilla el value de la opcion seleccionada
  
   /*  $("#cliente_id").change(function(){
          var cliente = $("#cliente_id").val();
          alert(cliente);
        });
 */

 
 $('#cliente_id').on('change', function(){
            var cliente = $("#cliente_id").val();
          
            $.ajax({
                url:"{{url('productad')}}/"+id+"/mostrarProductos";
                method:"get",
                data:cliente,
                dataType: "json",
                success: function (data) {
                    $("#productos").html(response);
         
                    
                    $('#cliente_id').val(data.cliente.id);
                   
                    $("#productos").delay(500).fadeIn("slow");      // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                   
                  

                }
            })
        }); 
    

</script>
@endsection


