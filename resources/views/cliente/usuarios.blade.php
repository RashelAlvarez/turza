@extends('admin.layouts.templateadminator')




@section('contenido')

<style>
  .error{

   color: #f5543f;
   
}

</style>
<div class="container-fluid">
  {{--   <h4 class="c-grey-900 mT-10 mB-30">Usuarios</h4> --}}
     
      <div class="col-md-12">
        <div class="bgc-white bd bdrs-3 p-20 mB-20">
          <h4 class="c-grey-900 mB-20">Usuarios</h4>
          <button type="button" id="crearUsuario" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalLong">
            Crear Usuario
          </button>
        {{--   <a href="#" class="btn btn-success mb-3">Crear Usuario</a> --}}
          <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Fecha creación</th>
                    <th>Acciones</th>
          
                </tr>
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
                    <a type="button" href="{{route('/usuarios.edit/'.$user->id.'/edit')}}" id="modificarUsuario" data-toggle="modal" data-target="#frmModificar" class="c-blue-500 fa-edit ml-5 mr-3"> </a>
                  
                    <a type="button" href="#" class="c-red-500 fa-trash"> </a>
                  </td>
              
                </tr>
                @endforeach
               
              </tbody>
          </table>
        </div>
      </div>
   
</div>
 
@include('cliente/frm/usuarios')
@include('cliente/frm/modificar')

 

@endsection