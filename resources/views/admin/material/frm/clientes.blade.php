<div class="modal" id="exampleModalLong" tabindex="-1" role="dialog" aria-hidden="true">>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('clientes.store')}}">
            {!! csrf_field()  !!}
            <div class="modal-body" id="body">
            
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="razon_social"  placeholder="Razón Social" value="{{old('razon_social')}}">
                        <span class="text-danger">{!! $errors->first('razon_social', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rif"  placeholder="Rif" value="{{old('rif')}}">
                        <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefono"  placeholder="Teléfono" value="{{old('telefono')}}">
                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="direccion"  placeholder="Dirección" value="{{old('direccion')}}">
                        <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="file"  placeholder="archivo" value="{{old('file')}}">
                        <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
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

