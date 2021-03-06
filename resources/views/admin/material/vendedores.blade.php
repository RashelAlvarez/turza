@extends('admin.layouts.material')

@section('titulo')

Turza | Vendedores
@endsection

@section('section')

<h3>Vendedores</h3>


@endsection

@section('contenido')  
 
@if (session('pedido'))
<div class="alert alert-success">
  {{ session('pedido') }}
</div>
@endif


@if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
<button type="submit" data-toggle="modal" data-target="#crearVendedor"  class="btn btn-success mb-3 ">Nuevo Vendedor</button>




<div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">Vendedores</h4>
      </div>
      <div class="card-body">
      
    
        <div class="table-responsive">
          
          

          <table   id="example" class="table">
            <thead class=" text-primary">
                <th>#</th>
               
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Modificar</th> 
         
            </thead>
            <tbody>
            @foreach ($vendedor as $item)
               <tr>   
            <td>{{$loop->iteration}}</td>
            
            <td >{{$item->nombre}}</td>
            <td >{{$item->apellido}}</td>
            <td >{{$item->direccion}}</td>
            <td >{{$item->telefono}}</td>
            <td>
       
                <a type="button" href="{{url('/vendedor/'.$item->id.'/edit')}}"  rel="tooltip" title="Modificar" class="btn btn-warning btn-sm" id="modificarUsuario"  data-toggle="modal" data-target="#frmModificarUsuario" >
                    <span class="material-icons ">
                      create
                      </span>
                    </a>
            </td>
            
          </tr>
            @endforeach
         
           

           
          </tbody>
         
          </table>
         
          
        </div>
      </div>
    </div>
  </div>


  @include('admin/material/frm/vendedor')
  
@endif

  @endsection