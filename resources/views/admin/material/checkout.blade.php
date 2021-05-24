@extends('admin.layouts.material')

@section('titulo')

Turza | Carrito de Compra
@endsection

@section('section')

<h3>Carrito de compra</h3>


@endsection

@section('contenido')  


@if(count(Cart::getContent()))
{{-- {{Cart::getContent()}} --}}
<a href="{{route('productad.index')}}" class="btn btn-success"><span class="material-icons">
  reply
  </span>    Seguir Comprando</a>

 
<div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Carrito de Compras</h4>
      {{--   Comprobante # {{ str_pad ($model->id, 7, '0', STR_PAD_LEFT) }} --}}
        {{-- <p class="card-category"> Número de Pedido: {{$orden}} </p> --}}
      </div>
      <div class="card-body">
      <form action="{{route('pedidos.store')}}" method="post">
        {!! csrf_field()  !!} 
        <div class="table-responsive">
          <table  class="table">
            <thead class=" text-primary">
                <th>#</th>
              {{--   <th>Producto</th> --}}
                <th>Nombre</th> 
                <th>Descripcion</th>
                <th>Precio Unitario</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Eliminar</th>
         
            </thead>
            <tbody>
            @foreach (Cart::getContent() as $item)
                  
            
            <tr>
              <td>{{$loop->iteration}}</td>
             {{--    <td><img src="images/{{$item->image}}"/></td> --}}
                <td>{{$item->name}}</td>
                <td>{{$item->attributes->descripcion}}</td>
                <td>{{number_format($item->price,2)}}</td>

                <td>
                  {{$item->quantity}}
               {{--    <div class="table-cart-stepper">
                  <input class="numeros" id="cantidad" value="{{$item->quantity}}" type="number" name="cantidad" data-zeros="true" value="0" min="0" max="1000" />
                  </div> --}}
                </td>
                <td>
                  {{number_format($item->price * $item->quantity,2)}}
                </td>
              <td>
                <form action="{{route('cart.removeitem')}}" method="post">
                  {!! csrf_field()  !!} 
                  <input type="hidden" name="id" value="{{$item->id}}">
              {{--   <button type="submit" class="btn btn-danger  btn-sm "><i class="fa fa-trash"></i></button> --}}
                  <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                    <i class="material-icons">close</i>
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
        
            <tr>
              <td colspan="4"></td>
              
              <td><p class="text-danger">Sub Total:</p></td>
              <td><p class="text-danger">${{number_format(Cart::getSubTotal(),2)}}</p></td>
            </tr>

           
          </tbody>
         
          </table>
        {{--   <p><h3> Sub total: ${{number_format(Cart::getSubTotal(),2)}} </h3></p> --}}
        {{--     <button type="button" href="#" class="btn btn-success mb-3 ">
            Realizar Pedido
          </button> --}}
     
           
        {{-- <input type="hidden" name="producto_id" value="{{$item->id}}"> --}}
        <form action="{{route('pedidos.store')}}" method="post" name="pedido">
          {!! csrf_field()  !!} 
        
          @foreach(Cart::getContent() as $item)
              
              <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
              <input type="hidden" name="pedido[{{$item->id}}][producto_id]" value="{{$item->id}}">
          
              <input type="hidden" name="pedido[{{$item->id}}][cantidad]" value="{{$item->quantity}}">
              <input type="hidden" name="pedido[{{$item->id}}][precio]" value="{{$item->price}}">
              <input type="hidden" name="pedido[{{$item->id}}][total]" value="{{$item->price * $item->quantity}}">
              <input type="hidden" name="sub_total" value="{{Cart::getSubTotal()}}"> 
              {{-- <input type="hidden" name="nro_orden" value="{{$orden}}"> --}} 
          @endforeach
          <div ><button type="submit"   class="btn btn-success   float-right ">Realizar Pedido</button></div>
         
        </form>


        <form action="{{route('cart.clear')}}" method="post">
          {!! csrf_field()  !!} 
        <div ><button type="submit"   class="btn btn-warning  mr-5 float-right"><span class="material-icons">
          remove_shopping_cart
          </span>     Vaciar Carrito</button></div>
      </form>  
          
        </div>
      </div>
    </div>
  </div>



@else 
<div class="text-center mt-5"><img src="{{asset('/images/carritovacio.png')}}" width="250px" height="250px"></div>
<h3><p class="text-center">Tu carrito esta vacio</p></h3>
<h4><p class="text-center">¡Sigue Comprando!</p></h4>
@endif


@endsection