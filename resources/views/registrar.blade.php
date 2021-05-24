@extends('layouts.template')
@section('titulo')
Registro de Usuario
@endsection


@section('contenido')

<section class="section section-md section-last bg-default text-md-left">
    <div class="container">
     
      <div class="form-center">
        <div class="col-lg-6">
            {{-- <h4 class="text-center">Ingreso de Usuario</h4> --}}
            <div class="oh">
                <h2 class="wow slideInUp mb-5 text-center" data-wow-delay="0s">Registro de Usuario</h2>
            </div>
            @if (session('exito'))
            <div class="alert alert-success">
              {{ session('exito') }}
            </div>
            @endif
            <form   method="post" action="{{route('registrar.store')}}" files="true"  enctype="multipart/form-data">
                {!! csrf_field()  !!}
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-nombre" type="text" name="nombre"  value="{{old('nombre')}}" required>
                      <span class="text-danger">{!! $errors->first('nombre', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-nombre">Nombre</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-apellido" type="text" name="apellido"  value="{{old('apellido')}}" required>
                      <span class="text-danger">{!! $errors->first('apellido', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-apellido">Apellido</label>
                    </div>
                  </div>
               
              
            
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" value="{{old('email')}}" required >
                      <span class="text-danger">{!! $errors->first('email', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-email">Correo</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-password" type="password" name="password" value="{{old('password')}}" required >
                      <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-password">Contraseña</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-wrap">
                    <label for="password-confirm" class="form-label">Confirmar Contraseña</label>
                      
                        <input id="password-confirm" type="password" class="form-input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                  <div class="col-sm-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-razon_social" type="text" name="razon_social"  value="{{old('razon_social')}}" required>
                      <span class="text-danger">{!! $errors->first('razon_social', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-razon_social">Razón Social</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-rif" type="text" name="rif"  value="{{old('rif')}}" required>
                      <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-rif">Rif</label>
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-telefono" type="text" name="telefono" value="{{old('telefono')}}"  required>
                      <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-telefono">Teléfono</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-direccion" type="text" name="direccion" value="{{old('direccion')}}" >
                      <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                      <label class="form-label" for="contact-direccion">Dirección Fiscal</label>
                    </div>
                  </div>

                  <div class="col-2">
                    <div class="form-wrap">
                        <label class="form-label" for="contact-file">Adjuntar Rif</label>
                    </div>
                  </div>

                  <div class="col-10">
                    <div class="form-wrap">
                        <input type="file" class="form-control" name="file" required>
                        <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
                    </div>
                  </div> 


                  
  



                


                  
                 
                </div>
                <div class="col mt-5 text-center">
                    <button class="button button-primary button-pipaluk" type="submit">Registrar</button>
                </div>
              </form>
              <br>
          
             
           
        </div>
      </div>
    </div>


</section>






@endsection