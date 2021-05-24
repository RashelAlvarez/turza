@extends('layouts.template')
@section('titulo')
Ingreso de Usuario
@endsection


@section('contenido')
<section class="section section-md section-last bg-default text-md-left">
    <div class="container">
      <div class="form-center">
        <div class="col-lg-6">
            {{-- <h4 class="text-center">Ingreso de Usuario</h4> --}}
            <div class="oh">
                <h2 class="wow slideInUp mb-5 text-center" data-wow-delay="0s">Ingreso de Usuario</h2>
            </div>
            <form method="post" action="{{ route('login') }}">
            {!! csrf_field()  !!}
            <div class="row row-14 gutters-14">
                <div class="col-12">
                <div class="form-wrap">
                    <input class="form-input" id="contact-email" type="email" name="email" value="{{old('email')}}" >
                    <span class="text-danger">{!! $errors->first('email', '<span class=error>:message</span>') !!}</span>
                    <label class="form-label" for="contact-email">Correo</label>
                </div>
                </div>
                <div class="col-12">
                <div class="form-wrap">
                    <input class="form-input" id="contact-password" type="password" name="password" value="{{old('password')}}">
                    <label class="form-label" for="contact-password">Contraseña</label>
                    <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                </div>
                </div>
            </div>
            <div class="col mt-5 text-center">
                <button class="button button-primary button-pipaluk" type="submit">Ingresar</button>
            </div>
            </form>

            <div class="registro mt-3">
                <p>¿No eres cliente?,  <a class="clic"href="{{url('registrar')}}">Haz clic aqui</a> para registrarte.</p>
            </div>
        </div>
      </div>
    </div>


    
</section>
  


@endsection