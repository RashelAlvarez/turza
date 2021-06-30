@extends('admin.layouts.material')

@section('titulo')

Turza | Pedido
@endsection

@section('section')
{{-- 
<h3>Orden</h3> --}}


@endsection

@section('contenido')  

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Pedido</h4>
    {{--   <p class="card-category"> Here is a subtitle for this table</p> --}}
    </div>
    <div class="card-body">
    
  
      <div class="table-responsive">
        <table  class="table">
          <thead class=" text-primary">
            <th>Producto</th>
 
              <th>Cantidad</th>
              <th>Precio Unitario</th>

              <th>Total</th>




          </thead>
          <tbody>

        @foreach ($pedidos as $item)
  
       
            <tr>
              <td>{{$item->nombre}}</td>
              <td>{{$item->cantidad}}</td>
              <td>${{$item->precio}}</td>
              <td>${{$item->total}}</td>
            </tr>
    
  
          
       
            @endforeach
            <tr></tr>
            <tr>
              <td colspan="2"></td>
              
              <td><h4 class="text-danger">Sub Total:</h4></td>
            <td><h4 class="text-danger">${{$item->sub_total}}</h4></td>
            </tr>
             
          </tbody>
          
         
                <h3 class="modal-title">Orden # {{$item->nro_orden}}</h3>
                <h5 class="modal-title">Razón Social: {{$item->razon_social}}</h5>  
                <h5 class="modal-title">Rif: {{$item->rif}}</h5>
                <h5 class="modal-title">Teléfono: {{$item->telefono}}</h5>
                <h5 class="modal-title">Dirección: {{$item->direccion}}</h5>
                <h5 class="modal-title">Tipo de Pago: {{$item->tnombre}}</h5>
        </table>
    
       
        
        
      </div>
    
    </div>
   
  </div>
  <a href="{{route('pedidos.index')}}" class="btn btn-success"><span class="material-icons">
    reply
    </span> Regresar</a>
</div>
     
@endsection
 
 

