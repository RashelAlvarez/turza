@extends('admin.layouts.material')

@section('titulo')

Turza | Clientes

@endsection


@section('contenido')

<style>
  .error{

   color: #f5543f;
   
}

</style>

 {{-- 
<button type="button" id="crearCliente" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalLong">
  Nuevo Cliente
</button> --}}
@if  (auth()->user()->hasRoles(['Administrador', 'Operador', 'Vendedor']))
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalLong">
      Nuevo Cliente
    </button>

    
@endif

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Clientes</h4>
    {{--   <p class="card-category"> Here is a subtitle for this table</p> --}}
    </div> 
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table">
    @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))
          <thead class=" text-primary">
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Razón Social</th>
            <th>Rif</th>
            <th>Teléfono</th>
            <th>Dirección</th>
           {{--        <th>Archivo</th> --}}
          
            <th>Vendedor</th>
            <th>Fecha de creación</th>
             <th>Acciones</th>
          </thead>
          <tbody>
         
           
            
                @foreach($clientes as $item)
                        
                  
                  <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->apellido}}</td>
                    <td>{{$item->razon_social}}</td>
                    <td>{{$item->rif}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->direccion}}</td>
                  {{--   <td>
                      <a href="{{route('clientes.show', $item->file)}}" target="_blank">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        
                      </a>
                      
                              
                      </td> --}}
                   
                    <td>{{$item->usvendedor}}</td>
                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
          
                    <td>
                      <a type="button" href="{{url('/clientes/'.$item->id.'/edit')}}"  id="modificarCliente" data-toggle="modal" data-target="#frmModificarCliente" > 
                        <span class="material-icons yellow">
                        create
                        </span></a>
                        @if  (auth()->user()->hasRoles(['Administrador']))
                          <a type="button" href="#" > <span class="material-icons red600">
                            delete_outline
                            </span></a>
                        @endif
                    </td>
                
                  </tr>
                @endforeach
          
         
        </tbody>
    @endif

    @if  (auth()->user()->hasRoles(['Vendedor']))
          <thead class=" text-primary">
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Razón Social</th>
            <th>Rif</th>
            <th>Teléfono</th>
            <th>Dirección</th>
                  <th>Archivo</th>
           
            <th>Vendedor</th>
            <th>Fecha de creación</th>
             <th>Acciones</th>
          </thead>
          <tbody>
         
           
            
                @foreach($clientes2 as $item)
                        
                  
                  <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->nombre}}</td>
                  <td>{{$item->apellido}}</td>
                    <td>{{$item->razon_social}}</td>
                    <td>{{$item->rif}}</td>
                    <td>{{$item->telefono}}</td>
                    <td>{{$item->direccion}}</td>
                    <td>
                      <a href="{{route('clientes.show', $item->file)}}" target="_blank">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        
                      </a>
                              
                      </td>
                   
                    <td>{{$item->usvendedor}}</td>
                    <td>{{Carbon\Carbon::parse($item->created_at)->format('d-m-Y')}}</td>
                    <td>
                      <a type="button" href="{{url('/clientes/'.$item->id.'/edit')}}"  id="modificarCliente" data-toggle="modal" data-target="#frmModificarCliente" > 
                        <span class="material-icons yellow">
                        create
                        </span></a>
                        @if  (auth()->user()->hasRoles(['Administrador']))
                          <a type="button" href="#" > <span class="material-icons red600">
                            delete_outline
                            </span></a>
                        @endif
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







@include('admin/material/frm/clientes')


@if (isset($item->id))

@include('admin/material/frm/modificarCliente')
@endif
 

@endsection