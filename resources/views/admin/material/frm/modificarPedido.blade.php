
 

<div class="modal" id="frmModificarPedido{{$pedido->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modificar Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('pedidos.update', $pedido->id)}}">
            {!! csrf_field()  !!}
          
            {{method_field('PATCH')}}
            <div class="modal-body" id="body">
            
            
                {{-- <div class="col-sm-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_id"  placeholder="Usuario" value="" disabled>
                        <span class="text-danger">{!! $errors->first('usuario', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div> --}}
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating"># Orden</label>
                    <input type="text" class="form-control" name="nro_orden" id="nro_orden" value="{{$pedido->nro_orden}}"    disabled>
                        <span class="text-danger">{!! $errors->first('orden', '<span class=error>:message</span>') !!}</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Total</label>
                    <input type="text" class="form-control" name="sub_total" id="sub_total" value="{{$pedido->sub_total}}"   disabled>
                        <span class="text-danger">{!! $errors->first('sub_total', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
              
            
                
                <div class="col-sm-12">
                  <div class="form-group"> 
                  <select class="select form-control-sm custom-select "  id="estado" name="estado"   required>

             

               {{--        @foreach ($estado as $item)
             
                    <option value="{{$item->id}}" @if ($pedido->estado== $item) selected='selected'
                      @endif 
                      > {{$item->nombre }}</option>
                
                      @endforeach --}}
                    </select>
                    <span class="text-danger">{!! $errors->first('estado', '<span class=error>Seleccione una opción</span>') !!}</span>
                  </div>
                </div>
                  
           
        



                 
             
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit"  class="btn btn-success update">Actualizar</button>
            </div>


        </form>
   
      </div>
    </div>
  </div>



