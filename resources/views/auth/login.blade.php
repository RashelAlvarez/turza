{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}

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
                    <label class="form-label" for="contact-password">Clave</label>
                    <span class="text-danger">{!! $errors->first('password', '<span class=error>:message</span>') !!}</span>
                </div>
                </div>
            </div>
            <div class="col mt-5 text-center">
                <button class="button button-primary button-pipaluk" type="submit">Ingresar</button>
            </div>
            </form>

            <div class="registro mt-5">
                <p>¿No estás registrado?,  <a class="clic"href="{{url('registrar')}}">Haz clic aqui</a></p>
            </div>
        </div>
      </div>
    </div>


    
</section>
  


@endsection