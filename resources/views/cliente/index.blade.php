@extends('admin.layouts.templatecliente')
@section('titulo')
Actualizar Datos
@endsection



@section('contenido')
 {{--  @if (\App\Cliente::where('user_id', $user_id)->exists()) 
  <section class="section section-md section-last bg-default text-md-left">
    <div class="container">

  <h4 class="text-center">Ya tenemos tus datos</h4>
    </div>
  </section>

  @else --}}

    <section class="section section-md section-last bg-default text-md-left">
      <div class="container">
        <div class="form-center">
          <div class="col-lg-6">
              {{-- <h4 class="text-center">Ingreso de Usuario</h4> --}}
              <div class="oh">
                  <h4 class="wow slideInUp mb-5 text-center" data-wow-delay="0s">Actualizar Datos Jurídicos o Personales</h4>
              </div>
              @if (session('exito'))
              <div class="alert alert-success">
                {{ session('exito') }}
              </div>
              @endif
              <form   method="post" action="{{route('home.store')}}" files="true"  enctype="multipart/form-data">
                  {!! csrf_field()  !!}
                  <div class="row row-14 gutters-14">

                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-cliente" type="text" name="cliente"  value="{{old('cliente')}}">
                        <span class="text-danger">{!! $errors->first('cliente', '<span class=error>:message</span>') !!}</span>
                        <label class="form-label" for="contact-cliente">Cliente</label>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-rif" type="text" name="rif"  value="{{old('rif')}}">
                        <span class="text-danger">{!! $errors->first('rif', '<span class=error>:message</span>') !!}</span>
                        <label class="form-label" for="contact-rif">Rif</label>
                      </div>
                    </div>
          
                    <div class="col-12">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-telefono" type="text" name="telefono" value="{{old('telefono')}}" >
                        <span class="text-danger">{!! $errors->first('telefono', '<span class=error>:message</span>') !!}</span>
                        <label class="form-label" for="contact-telefono">Teléfono</label>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-wrap">
                        <input class="form-input" id="contact-direccion" type="text" name="direccion" value="{{old('direccion')}}" >
                        <span class="text-danger">{!! $errors->first('direccion', '<span class=error>:message</span>') !!}</span>
                        <label class="form-label" for="contact-direccion">Dirección</label>
                      </div>
                    </div>

                    <div class="col-2">
                      <div class="form-wrap">
                          <label class="form-label" for="contact-file">Adjuntar Rif</label>
                      </div>
                    </div>

                    <div class="col-10">
                      <div class="form-wrap">
                          <input type="file" class="form-control" name="file" >
                          <span class="text-danger">{!! $errors->first('file', '<span class=error>:message</span>') !!}</span>
                      </div>
                    </div> 


                  
                  </div>
                  <div class="col mt-5 text-center">
                      <button class="button button-primary button-pipaluk" type="submit">Enviar</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </section>
    

{{-- 
  @endif --}}
   











@endsection


