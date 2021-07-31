@extends('admin.layouts.material')

@section('titulo')

Turza | Costos

@endsection

@section('contenido')

@if  (auth()->user()->hasRoles(['Administrador', 'Operador']))


@if (session('costos'))
<div class="alert alert-success">
  {{ session('costos') }}
</div>
@endif
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#costos">
      Ingresar Costos
    </button>




    <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Costos de Productos por cliente</h4>
            <p class="card-category"> En esta sección puedes ver, crear y modificar los costos de los productos por cliente.
                Si el cliente no tiene los costos de los productos asignados, no puede hacer pedidos.
            
            </p>
          </div> 
          <div class="card-body">
            <div class="table-responsive">
              <table id="example" class="table">
          @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
                <thead class=" text-primary">
                  <th>#</th>
                  <th>Cliente</th>
                  <th>Producto</th>
                  <th>Precio Unitario</th>
                   <th>Acciones</th>
                </thead>
                <tbody>
               
                 
                  
                      @foreach($precios as $item)
                              
                        
                        <tr>
                         <td>{{$loop->iteration}}</td>
                         <td>{{$item->razon_social}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->precio_unitario}}</td>
                
                          <td>
                            <a type="button" href="{{url('/clientes/'.$item->id.'/edit')}}"  id="modificarCliente" data-toggle="modal" data-target="#frmModificarCliente" > 
                              <span class="material-icons yellow">
                              create
                              </span></a>
                         
                          </td>
                      
                        </tr>
                      @endforeach
                
               
              </tbody>
          @endif
      
      
              </table>
            </div>
          </div>
        </div>
      </div>
      
@include('admin.material.frm.costos')



@endif



@endsection