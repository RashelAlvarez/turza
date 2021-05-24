
     <style>
       .error{
	
        color: #f5543f;
        font-size: 10px;
}
     </style>
     <!-- Contact Form and Gmap-->
      <section class="section section-md section-last bg-default text-md-left">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 section-map-small">
              <div class="map">
                <figure class=" text-center">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d981.6658167375836!2d-67.962511!3d10.2079766!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2sve!4v1606157162968!5m2!1ses-419!2sve"></iframe>
                   </figure>
                  <address class="text-center">
                                <dl>
                                    <dt><p>Alimento Solo Alimentos,C.A.<br>
                                        Zona Industrial, Los Jarales<br>
                                        San Diego. Carabobo</p>
                                    </dt>
                                    <dd><span>Gerente General: </span>Jesús Sevilla</dd>
                                    <dd><span>Teléfono: </span>+58 412 559 6580</dd>
                                    <dd><span>Gerente de Ventas: </span>Harold Caballero</dd>
                                    <dd><span>Teléfono: </span>+58 412 559 6580</dd>
                                </dl>
                             </address>
     
              </div>
            </div>

            @if (session()->has('info'))
              <h3>{{session('info')}}</h3>
            @else
            <div class="col-lg-6">
              <h4 class="text-spacing-50">Formulario de Contacto</h4>
              <form   method="post" action="contacto">
                {!! csrf_field()  !!}
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-first-nombre" type="text" name="nombre"  value="{{old('nombre')}}">
                      <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-first-nombre">Nombre</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-razonsocial" type="text" name="razonsocial" value="{{old('razonsocial')}}">
                      <span class="text-danger">{{ $errors->first('razonsocial') }}</span>
                      <label class="form-label" for="contact-last-razonsocial">Razón Social</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-rif" type="text" name="rif" value="{{old('rif')}}" >
                      <span class="text-danger">{{ $errors->first('rif') }}</span>
                      <label class="form-label" for="contact-last-rif">Rif</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-telefono" type="text" name="telefono" value="{{old('telefono')}}" >
                      <span class="text-danger">{{ $errors->first('telefono') }}</span>
                      <label class="form-label" for="contact-last-telefono">Telefono</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-correo" type="email" name="correo" value="{{old('correo')}}" >
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                      <label class="form-label" for="contact-correo">Correo</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-comentario">Comentario</label>
                      <textarea class="form-input" id="contact-comentario" name="comentario" value="{{old('comentario')}}"></textarea>
                      <span class="text-danger">{{ $errors->first('comentario') }}</span>
                    </div>
                  </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Enviar</button>
              </form>
            </div>
            @endif
          </div>
        </div>
      </section>