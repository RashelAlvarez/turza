@extends('admin.layouts.material')

{{-- @section('section')

Usuarios

@endsection --}}
@section('titulo')

Turza | Usuarios

@endsection

@section('contenido')

<style>
  .error{

   color: #f5543f;
   
}

</style>

@if  (auth()->user()->hasRoles(['Administrador']))
<button type="button" id="crearUsuario" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalLong">
  Nuevo Usuario
</button>
@endif

<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-primary">
      <h4 class="card-title ">Usuarios</h4>
    {{--   <p class="card-category"> Here is a subtitle for this table</p> --}}
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table id="example" class="table">
          <thead class=" text-primary">
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Fecha creación</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach($users as $user)
                
          
          <tr>
          <td>{{$loop->iteration}}</td>
            <td>{{$user->nombre}}</td>
            <td>{{$user->apellido}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->Role->nombre}}</td>
            <td>{{$user->created_at->format('d-m-Y')}}</td>
            <td>
            {{--   <a type="button" href="{{route('/usuarios.edit/'.$user->id.'/edit')}}"  id="modificarUsuario" data-toggle="modal" data-target="#frmModificar" > <span class="material-icons yellow">
                create
                </span></a> --}}
                <a type="button" href="{{url('/usuarios/'.$user->id.'/edit')}}"  rel="tooltip" title="Modificar" class="btn btn-warning btn-sm" id="modificarUsuario" data-toggle="modal" data-target="#frmModificarUsuario" >
                  <span class="material-icons ">
                    create
                    </span>
                  </a>
                @if  (auth()->user()->hasRoles(['Administrador']))
                <form method="post" action="{{url('/usuarios/'.$user->id)}}" style="display:inline">
                  {{ csrf_field() }}
                  {{method_field('DELETE')}}
                <a type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger  btn-sm">
                  <i class="material-icons">close</i>
                </a>
              </form>

               {{--  <form method="post" action="{{url('/usuario/'.$usuario->id)}}" style="display:inline">
                  {{ csrf_field() }}
                  {{method_field('DELETE')}}
                  <button type="submit" onclick="return confirm('borrar?');" class="btn btn-danger border-bottom-danger btn-sm " href="#">Eliminar</button>
                  </form> --}}
                @endif
            {{--   <a type="button" href="#" > <span class="material-icons red600">
                delete_outline
                </span></a> --}}
            </td>
        
          </tr>
          @endforeach
         
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>







@include('admin/material/frm/usuarios')
@include('admin/material/frm/modificarUsuario')

 

@endsection