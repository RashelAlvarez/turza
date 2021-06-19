<div class="modal" id="crearVendedor" tabindex="-1" role="dialog" aria-hidden="true">>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registro de Vendedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('vendedor.store')}}" >
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

