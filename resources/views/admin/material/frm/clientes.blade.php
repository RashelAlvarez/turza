<div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('clientes.store')}}" enctype="multipart/form-data">
            {!! csrf_field()  !!}
            <div class="modal-body" id="body">
            
            <div class="row">
              <div class="col-sm-12 ">
                <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                  <label class="bmd-label-floating">Nombre</label>
                    <input type="text" class="form-control" name="nombre"    value="{{old('nombre')}}">
                    <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                </div>
              </div>
              <div class="col-sm-12 ">
                <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                  <label class="bmd-label-floating">Apellido</label>
                    <input type="text" class="form-control" name="apellido"    value="{{old('apellido')}}">
                    <span class="text-danger">{!! $errors->first('apellido', '<span class=error>:message</span>') !!}</span>
                </div>
              </div>
              <div class="col-sm-12 ">
                <div class="form-group {{ $errors->has('razon_social') ? 'has-error' : ''}}">
                  <label class="bmd-label-floating"> Razón social</label>
                    <input type="text" class="form-control" name="razon_social"    value="{{old('razon_social')}}">
                    <span class="text-danger">{!! $errors->first('razon_social', '<span class=error>:message</span>') !!}</span>
                </div>
              </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rif"  value="{{old('rif')}}">
                        <label class="bmd-label-floating">Rif</label>
                        <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefono"  value="{{old('telefono')}}">
                        <label class="bmd-label-floating"> Teléfono</label>
                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="direccion"  value="{{old('direccion')}}">
                        <label class="bmd-label-floating">Dirección</label>
                        <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="email"  value="{{old('email')}}">
                        <label class="bmd-label-floating">Correo</label>
                        <span class="text-danger">{!! $errors->first('email', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                
                 
                  
                  <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('vendedor_id') ? 'has-error' : ''}}"> 
                      <select class="select form-control-sm custom-select" id="vendedor_id" name="vendedor_id">
                          <option selected disabled>Selecciona el Vendedor</option>
                          
                            @foreach ($vendedor as $item)
                              <option value="{{$item->id}}">{{$item->nombre}} {{$item->apellido}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                @if  (auth()->user()->hasRoles(['Administrador', 'Operador']))  
                  <div class="col-sm-12">
                    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}"> 
                      <select class="select form-control-sm custom-select" id="user_id" name="user_id">
                          <option selected disabled>Selecciona el Usuario</option>
                          
                            @foreach ($user as $item)
                              <option value="{{$item->id}}">{{$item->email}} </option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                @endif
                  <div class="col-sm-12 {{ $errors->has('file') ? 'has-error' : ''}}">
                    <label class="bmd-label-floating">Rif: formato PDF,JPG,JPEG,PNG</label>
                    <input type="file" id="file" accept="image/jpeg,image/png" class="form-control-file" name="file"    value="{{old('file')}}"> 
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

