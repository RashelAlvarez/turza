<div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('usuarios.store')}}" enctype="multipart/form-data">
            {!! csrf_field()  !!}
            <div class="modal-body" id="body">
            
              <div class="row">
                <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                        <label class="bmd-label-floating"> Nombre</label>
                        <input type="text" class="form-control" name="nombre"    value="{{old('nombre')}}">
                        <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                      <label class="bmd-label-floating">Apellido</label>
                        <input type="text" class="form-control" name="apellido"    value="{{old('apellido')}}">
                        <span class="text-danger">{!! $errors->first('apellido', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                        <label class="bmd-label-floating"> Correo</label>
                        <input type="text" class="form-control" name="email"    value="{{old('email')}}">
                        <span class="text-danger">{!! $errors->first('email', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                      <label class="bmd-label-floating"> Contraseña</label>
                        <input type="password" class="form-control" name="password"    value="{{old('password')}}">
                        <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                      <label class="bmd-label-floating"> Confirmar contraseña</label>
                        <input  type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password">
                        <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                    </div>
                </div>
                <div class="col-sm-12 ">
                  <div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
                    <label class="bmd-label-floating"> Razón social</label>
                      <input type="text" class="form-control" name="razon_social"    value="{{old('razon_social')}}">
                      <span class="text-danger">{!! $errors->first('razon_social', '<span class=error>:message</span>') !!}</span>
                  </div>
                </div>

                <div class="col-sm-6 ">
                  <div class="form-group {{ $errors->has('rif') ? 'has-error' : ''}}">
                    <label class="bmd-label-floating"> Rif</label>
                      <input type="text" class="form-control" name="rif"   value="{{old('rif')}}">
                      <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                  </div>
                </div>

                <div class="col-sm-6 ">
                  <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                      <label class="bmd-label-floating"> Teléfono</label>
                      <input type="text" class="form-control" name="telefono"   value="{{old('telefono')}}">
                      <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                  </div>
                </div>

                <div class="col-sm-12 ">
                  <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                    <label class="bmd-label-floating"> Dirección</label>
                      <input type="text" class="form-control" name="direccion"    value="{{old('direccion')}}">
                      <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                  </div>
                </div>


                <div class="col-sm-12">
                  <div class="form-group {{ $errors->has('vendedor') ? 'has-error' : ''}}"> 
                    <select class="form-control" id="vendedor" name="vendedor">
                        <option selected disabled>--Vendedor--</option>
                        
                          @foreach ($vendedor as $item)
                            <option value="{{$item['id']}}">{{$item['nombre']}} {{$item['apellido']}}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
            
                  <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}"> 
                      <select class="form-control" id="role_id" name="role_id">
                          <option selected disabled>--Tipo de Usuario--</option>
                          
                            @foreach ($roles as $role)
                              <option value="{{$role['id']}}">{{$role['nombre']}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>


                  <div class="col-sm-12 {{ $errors->has('file') ? 'has-error' : ''}}">
                        <label class="bmd-label-floating">Rif: formato PDF,JPG,JPEG,PNG</label>
                        <input type="file" id="file"  class="form-control-file" name="file"    value="{{old('file')}}"> 
                        <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
                
                  </div>


                  @if (session('exito'))
                  <div class="alert alert-success">
                    {{ session('exito') }}
                  </div>
                  @endif
                    
              </div> 
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit"  class="btn btn-success">Guardar</button>
            </div>


        </form>
   
      </div>
    </div>
  </div>

