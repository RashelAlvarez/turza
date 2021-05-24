<div class="modal" id="agregarProducto" tabindex="-1" role="dialog" aria-hidden="true">>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form"  method="post" action="{{route('productad.store')}}" enctype="multipart/form-data">
            {!! csrf_field()  !!}
            <div class="modal-body" id="body">
            
            
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Nombre</label>
                        <input type="text" class="form-control" name="nombre" required  value="{{old('nombre')}}">
                        <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                     
                            <label class="bmd-label-floating"> Descripción del producto</label>
                            <textarea class="form-control" rows="2" name="descripcion" required value="{{old('descripcion')}}"></textarea>
                            <span class="text-danger">{!! $errors->first('descripcion', '<span class=error>:message</span>') !!}</span>
                        
                        
                     </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Precio</label>
                        <input type="number" class="form-control" name="precio" required   value="{{old('precio')}}">
                        <span class="text-danger">{!! $errors->first('precio', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Impuesto</label>
                        <input type="text" class="form-control" name="impuesto"  required  value="{{old('impuesto')}}">
                        <span class="text-danger">{!! $errors->first('impuesto', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div>
                
                  <div class="col-sm-12">
                    
                        <label class="bmd-label-floating">Imagen del producto</label>
                       {{--  <input type="file" id="file"  class="form-control-file" name="file" multiple   value="{{old('file')}}"> --}}
                       <input type="file" id="file"  class="form-control-file" name="file"   accept=".png, .jpg, .jpeg" value="{{old('file')}}" required> 
                       <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
                
                    
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

