<div class="masonry-sizer col-md-6"></div>
              <div class="masonry-item col-md-6">
                <div class="bgc-white p-20 bd">
                  <h6 class="c-grey-900">Actualizar Datos Jurídicos o Personales</h6>
                  <div class="mT-30">
                    <form   method="post" action="{{route('home.store')}}" files="true"  enctype="multipart/form-data">
                        {!! csrf_field()  !!}
                      <div class="form-group">
                        <label for="contact-cliente">Cliente</label>
                        <input type="text" class="form-control" id="contact-cliente" name="cliente"  value="{{old('cliente')}}"  placeholder="Razon Social/Nombre y Apellido" >
                        <span class="text-danger">{!! $errors->first('cliente', '<span class=error>:message</span>') !!}</span>
                        {{--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                      </div>
                      <div class="form-group">
                        <label for="contact-rif">Rif</label>
                        <input type="text" class="form-control" id="contact-rif" type="text" name="rif"  value="{{old('rif')}}" placeholder="Rif Jurídico/Personal">
                        <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                      </div>
                      <div class="form-group">
                        <label for="contact-telefono">Teléfono</label>
                        <input type="text" class="form-control" id="contact-telefono" type="text" name="telefono"  value="{{old('telefono')}}" placeholder="Teléfono">
                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                      </div>
                      <div class="form-group">
                        <label for="contact-direccion">Dirección</label>
                        <input type="text" class="form-control" id="contact-direccion" type="text" name="direccion"  value="{{old('direccion')}}" placeholder="Dirección">
                        <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                      </div>
                      <div class="form-group">
                        <label for="contact-direccion">Adjuntar Rif</label>
                        <input type="file" class="form-control" id="contact-file" type="text" name="file"  value="{{old('file')}}">
                        <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
                      </div>
                       
                      <button type="submit" class="btn btn-primary">Enviar Datos</button>
                    </form>
                  </div>
                </div>
              </div>
