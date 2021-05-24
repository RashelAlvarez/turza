<div class="modal" id="frmModificarPedido" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" {{-- action="{{url('/pedidos/'.$pedidos->id)}}" --}}>
            {!! csrf_field()  !!}
          
            {{method_field('PATCH')}}
            <div class="modal-body" id="body">
            
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_id"  placeholder="Usuario" value="" disabled>
                        <span class="text-danger">{!! $errors->first('usuario', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nro_orden"  placeholder="Orden" value="" disabled>
                        <span class="text-danger">{!! $errors->first('orden', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="sub_total"  placeholder="Sub Total" value="" disabled>
                        <span class="text-danger">{!! $errors->first('sub_total', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
            
                
                <div class="col-sm-12">
                    <div class="form-group"> 
                  <select class="form-control" id="role_id" name="role_id" required>
                      <option selected disabled>--Tipo de Usuario--</option>
                      
                
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

 