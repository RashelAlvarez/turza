<div class="modal" id="frmModificarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{url('/usuarios/'.$user->id)}}">
            {!! csrf_field()  !!}
          
            {{method_field('PATCH')}}
            <div class="modal-body" id="body">
            
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nombre"  placeholder="Nombre" value="{{$user->nombre}}">
                        <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="apellido"  placeholder="Apellido" value="{{$user->apellido}}">
                        <span class="text-danger">{!! $errors->first('apellido', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email"  placeholder="Correo" value="{{$user->email}}">
                        <span class="text-danger">{!! $errors->first('correo', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="password" class="form-control" name="password"  placeholder="Contraseña" value="{{$user->password}}">
                        <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      
                        <input  type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" value="{{$user->password}}" required autocomplete="new-password">
                        <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                    </div>
                </div>
                
                <div class="col-sm-12">
                    <div class="form-group"> 
                  <select class="form-control" id="role_id" name="role_id" required>
                      <option selected disabled>--Tipo de Usuario--</option>
                      
                        @foreach ($roles as $role)
                          <option value="{{$role['id']}}">{{$role['nombre']}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{!! $errors->first('role_id', '<span class=error>Seleccione una opción</span>') !!}</span>
                    </div>
                    </div>
                  

        



                  @if (session('exito'))
                  <div class="alert alert-success">
                    {{ session('exito') }}
                  </div>
                  @endif
                    
             
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit"  class="btn btn-success">Guardar</button>
            </div>


        </form>
   
      </div>
    </div>
  </div>

