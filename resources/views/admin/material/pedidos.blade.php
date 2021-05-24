@extends('admin.layouts.material')

@section('titulo')

Turza | Pedido
@endsection

@section('section')

<h3>Pedido</h3>


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
          @if  (auth()->user()->hasRoles(['Cliente']))
        
          <table  class="table">
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
            @foreach ($pedidos3 as $item)
                  
            
            <tr>
                <td>{{$item->nro_orden}}</td>
                <td>{{$item->sub_total}}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
            <td>{{$item->nombre}}</td>
            <td>{{$item->email}}</td>
            <td>
       
              <a type="button" href="{{url('/pedidos/'.$item->nro_orden.'/mostrarOrden')}}"  rel="tooltip" title="Ver orden" > <span class="material-icons yellow">
                text_snippet
                </span>
              </a>
            </td>
            <td> {{-- <a type="button" href=""  rel="tooltip" title="Modificar" > <span class="material-icons yellow">
              edit
              </span>
            </a> --}}
            <a type="button" href="{{url('/pedidos/'.$item->id.'/edit')}}"  id="" data-toggle="modal" data-target="#frmModificarPedido" >
              <span class="material-icons yellow">
                create
                </span>
              </a></td>
            </tr>
            @endforeach
         
           

           
          </tbody>
         
          </table>
          @endif
          
        </div>
      </div>
    </div>
  </div>

  



  @include('admin/material/frm/modificarPedido')



@endsection