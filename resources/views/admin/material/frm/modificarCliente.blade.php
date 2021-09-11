<div class="modal" id="frmModificarCliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{url('/clientes/'.$item->id)}}">
            {!! csrf_field()  !!}
          
            {{method_field('PATCH')}}
            <div class="modal-body" id="body">
            
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="razon_social"  placeholder="Razón Social" value="{{$item->razon_social}}">
                        <span class="text-danger">{!! $errors->first('razon_social', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="rif"  placeholder="Rif" value="{{$item->rif}}">
                        <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="telefono"  placeholder="Teléfono" value="{{$item->telefono}}">
                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="direccion"  placeholder="Dirección" value="{{$item->direccion}}">
                        <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
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

