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
    <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModalLong">
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
      
            <th>Correo</th>
            <th>Rol</th>
            <th>Fecha creación</th>
            <th>Acciones</th>
          </thead>
          <tbody>
            @foreach($users as $user)
                
          
          <tr>
          <td>{{$loop->iteration}}</td>
         
            <td>{{$user->email}}</td>
            <td>{{$user->Role->nombre}}</td>
            <td>{{$user->created_at->format('d-m-Y')}}</td>
            <td>
      
              <button href="{{url('/usuarios/'.$user->id.'/edit')}}" data-id="{{$user->id}}"  class="btn btn-warning btn-sm" id="edit" name="id"    data-toggle="modal" data-target="#frmModificarUsuario" >
                  <span class="material-icons ">
                    create
                    </span>
                  </button>
            
 
            </td>
        
          </tr>
          @endforeach
         
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>




<script>

 


 
  $(document).ready(function() {




    // Data Display Code
    var table = $('#roles').DataTable( {
                ajax: "{{ url('usuariosindex') }}",
                columns: [
                    { "data": "email" },
                    { "data": "role_id" },
                    { "data": "created_at" },
                    { 
                        "data": null,
                        render: function(data, type, row) {
                            return `<button data-id="${row.id}" class="btn btn-info" data-toggle="modal" data-target="#frmModificarUsuario" id="edit"><i class="fa fa-edit"></i></button>`;
                        }
                    },
                    { 
                        "data": null,
                        render: function(data, type, row) {
                            return `<button data-id="${row.id}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></button>`;
                        }
                    }
                ]
            } );


// edit city code goes here
                $(document).on('click', '#edit', function() {
                    $.ajax({
                        url: "{{url('usuarios')}}/"+id+"/edit",
                        type: "post",
                        dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "id": $(this).data('id')
                            
                        },
                        success: function(response) {
                          alert(response);
                       
                       $('input[name="email"]').val(response.data.email);
                 
                            
                        }
                    });
                });

  });

 

   
</script>
 


@include('admin/material/frm/usuarios')
@include('admin/material/frm/modificarUsuario')
@endsection