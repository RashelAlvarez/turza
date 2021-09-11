@extends('admin.layouts.material')

@section('titulo')

Turza | Pedido
@endsection

@section('section')

<h3>Pedido</h3>


@endsection

@section('contenido')  
 
@if (session('pedido'))
<div class="alert alert-success">
  {{ session('pedido') }}
</div>
@endif


<div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Pedido</h4>
      {{--   <p class="card-category"> Here is a subtitle for this table</p> --}}
      </div>
      <div class="card-body">
      
    
        <div class="table-responsive">
          @if  (auth()->user()->hasRoles(['Cliente']))
        
          <table id="example" class="table">
            <thead class=" text-primary">
                <th># de Orden</th>
                <th>Total</th>
                <th>Fecha del Pedido</th>
                <th>Estado</th>

                
                <th>Ver orden</th>
         {{--        <th>Modificar</th> --}}
         
            </thead>
            <tbody>
            @foreach ($pedidos2 as $item)
                  
            
            <tr>
                <td>{{$item->nro_orden}}</td>
                <td>{{$item->sub_total}}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            <td>{{$item->nombre}}</td>
            <td>
            
              <a type="button" href="{{url('/pedidos/'.$item->nro_orden.'/mostrarOrden')}}"  rel="tooltip" title="Ver orden" > <span class="material-icons yellow">
                text_snippet
                </span>
              </a>
            </td>
           {{--  <td> <a type="button" href="{{url('/pedidos/'.$item->nro_orden.'/mostrarOrden')}}"  rel="tooltip" title="Modificar" > <span class="material-icons yellow">
              edit
              </span>
            </a></td> --}}
            </tr>
            @endforeach
         
           

           
          </tbody>
         
          </table>

 
          @endif

          @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
          <table  class="table">
            <thead class=" text-primary">
                <th># de Orden</th>
                <th>Total</th>
                <th>Fecha del Pedido</th>
                <th>Estado</th>
                <th>Usuario</th>

                
                <th>Ver orden</th>
                 <th>Modificar</th> 
         
            </thead>
            <tbody>
            @foreach ($pedidos3 as $pedido)
                  
            
            <tr  id='{{ $pedido->id }}'>
            <td id="pedido_nro_orden{{$pedido->id}}">{{$pedido->nro_orden}}</td>
                <td id="pedido_sub_total{{$pedido->id}}">{{$pedido->sub_total}}</td>
            <td id="pedido_created_at{{$pedido->id}}">{{ Carbon\Carbon::parse($pedido->created_at)->format('d-m-Y') }}</td>
            <td id="pedido_estado{{$pedido->id}}">{{$pedido->nombre}}</td>
            <td id="pedido_email{{$pedido->id}}" >{{$pedido->email}}</td>
            <td>
       
              <a type="button" href="{{url('/pedidos/'.$pedido->nro_orden.'/mostrarOrden')}}" class="btn btn-success btn-sm" rel="tooltip" title="Ver orden" > <span class="material-icons">
                text_snippet
                </span>
              </a>
            </td>
            <td> {{-- <a type="button" href=""  rel="tooltip" title="Modificar" > <span class="material-icons yellow">
              edit
              </span>
            </a> --}}
           
          <a type="button" {{-- href="{{route('pedidos.edit', $pedido->id)}}"  --}}  class="open-modal btn btn-warning btn-sm"  {{-- href="{{url('/pedidos/'.$pedido->id.'/edit')}}" --}}  data-toggle="modal" data-target="#frmModificarPedido{{$pedido->id}}" >
              <span class="material-icons">
                create
                </span>
              </a>
            
            @include('admin/material/frm/modificarPedido')
 
          </td>
            </tr>
            @endforeach
         
           

           
          </tbody>
         
          </table>
          @endif
          
        </div>
      </div>
    </div>
  </div>

  






 <script>
 
   

</script>
@endsection