@extends('admin.layouts.material')

@section('titulo')

Turza | Carrito de Compra
@endsection

@section('section')

<h3>Carrito de compra</h3>
 

@endsection

@section('contenido')  

@if  (auth()->user()->hasRoles(['Administrador', 'Operador', 'Cliente']))
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
             
                <td>{{$item->name}}</td>
                <td>{{$item->attributes->descripcion}}</td>
                <td>{{number_format($item->price,2)}}</td>

                <td>
                  {{$item->quantity}}
              
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
     
        <form action="{{route('pedidos.store')}}" method="post" name="pedido">
          {!! csrf_field()  !!} 
          <div class="col-4">
            <div class="form-group {{ $errors->has('tipo_pago') ? 'has-error' : ''}}"> 
              <label class="bmd-label-floating"> Seleccione el método de pago:</label>
              <select class="select form-control-sm custom-select " id="tipo_pago" name="tipo_pago">
                  <option selected disabled>Tipo de Pago</option>
                  
                    @foreach ($tipopago as $item)
                      <option value="{{$item['id']}}">{{$item['nombre']}}</option>
                    @endforeach
                </select>
            </div>
          </div>
          @foreach(Cart::getContent() as $item)
              
              <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">


              <input type="hidden" name="pedido[{{$item->id}}][producto_id]" value="{{$item->id}}">
          
              <input type="hidden" name="pedido[{{$item->id}}][cantidad]" value="{{$item->quantity}}">
              <input type="hidden" name="pedido[{{$item->id}}][precio]" value="{{$item->price}}">
              
              <input type="hidden" name="pedido[{{$item->id}}][total]" value="{{$item->price * $item->quantity}}">
              <input type="hidden" name="sub_total" value="{{Cart::getSubTotal()}}"> 
             
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

@endif


@if  (auth()->user()->hasRoles(['Vendedor']))
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
             
                <td>{{$item->name}}</td>
                <td>{{$item->attributes->descripcion}}</td>
                <td>{{number_format($item->price,2)}}</td>

                <td>
                  {{$item->quantity}}
              
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
     
        <form action="{{route('pedidosvendedor.store')}}" method="post" name="pedido">
          {!! csrf_field()  !!} 
          <div class="col-4">
            <div class="form-group {{ $errors->has('tipo_pago') ? 'has-error' : ''}}"> 
              <label class="bmd-label-floating"> Seleccione el método de pago:</label>
              <select class="select form-control-sm custom-select " id="tipo_pago" name="tipo_pago"  required>
                  <option selected disabled>Tipo de Pago</option>
                  
                    @foreach ($tipopago as $item)
                      <option value="{{$item['id']}}">{{$item['nombre']}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{!! $errors->first('tipo_pago', '<span class=error>:message</span>') !!}</span>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}"> 
              <label class="bmd-label-floating"> Seleccione el cliente:</label>
              <select class="select form-control-sm custom-select " id="user_id" name="user_id" required>
                  <option selected disabled>Seleccione el cliente</option>
                  
                    @foreach ($cliente as $item)
                      <option value="{{$item->id}}">{{$item->razon_social}}</option>
                    @endforeach
                </select>
                <span class="text-danger">{!! $errors->first('user_id', '<span class=error>:message</span>') !!}</span>
            </div>
          </div>
          @foreach(Cart::getContent() as $item)
              
          {{--     <input type="hidden" name="user_id" value="{{ Auth::user()->id}}"> --}}


              <input type="hidden" name="pedido[{{$item->id}}][producto_id]" value="{{$item->id}}">
          
              <input type="hidden" name="pedido[{{$item->id}}][cantidad]" value="{{$item->quantity}}">
              <input type="hidden" name="pedido[{{$item->id}}][precio]" value="{{$item->price}}">
              
              <input type="hidden" name="pedido[{{$item->id}}][total]" value="{{$item->price * $item->quantity}}">
              <input type="hidden" name="sub_total" value="{{Cart::getSubTotal()}}"> 
             
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






@endif
@endsection