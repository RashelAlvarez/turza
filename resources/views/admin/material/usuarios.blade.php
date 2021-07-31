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
            {{--   <a type="button" href="{{route('/usuarios.edit/'.$user->id.'/edit')}}"  id="modificarUsuario" data-toggle="modal" data-target="#frmModificar" > <span class="material-icons yellow">
                create
                </span></a> --}}
              <a type="button" href="{{url('/usuarios/'.$user->id.'/edit')}}" data-id="{{$user->id}}" {{-- rel="tooltip" title="Modificar" --}} class="btn btn-warning btn-sm" id="modificarUsuario" name="id"  onclick="obtenerVendedor('{{$user->id}}')"  data-toggle="modal" data-target="#frmModificarUsuario" >
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




<script>

  function obtenerVendedor(id){
  var route = "{{url('usuarios')}}/"+id+"/edit";
  $.get(route, function(data){
    
    
    $('#email').val(data.email);
    $('#password').val(data.password);
  /*   $("select[name='role_id'").html(data.role_id); */
  $('#role_id').val(data.role_id).html(data);
  alert(data.role_id)
 /*  $("#role_id").on('change', function () {
      
            role_id=$(this).val();
            alert(role_id);
       	
       
   }); */
  });

  
   
 
 
  /* var plantSelect = $('#role_id');
  function populatePlantSelect() {
        $.ajax({
            url: "{{ route('usuarios.create') }}",
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                $.each(response.data, function (key, value) {
                    plantSelect.append("<option value='" + value.id + "'>" + value.name + "</option>");
                });
            },
            error: function () {
                alert('Hubo un error obteniendo las plantas!');
            }
        });
    } */
  /*  
     $(document).ready(function(){

$(".role_id").click(function(){
  var role=data.role_id;
     var id = $(this).attr('id');  
    console.log(role);
    var parametros={"role":role};  
               
            $.ajax({
                data: parametros,
                url: "{{url('usuarios')}}/"+id+"/edit",
                type:  'get',
                beforeSend: function () {},
                    success:  function (response) {    
                    $(".role_id").html(response);

                    setTimeout(() => {
                        $(".role_id").empty();  
                    }, 2000);
                },
                error:function(){
                    alert("error")
                }
            }); // fin de ajax/ 
}); // fin de click 
});  
  */
 }  



   
</script>
 


@include('admin/material/frm/usuarios')
@include('admin/material/frm/modificarUsuario')
@endsection