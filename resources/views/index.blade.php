@extends('layouts.template')

@section('titulo')
Inicio
@endsection

@section('contenido')
 
@include('componentes.slider')


@include('componentes.iconoscentrales')
@include('componentes.productos')

{{-- @include('componentes.equipo') --}}
@include('componentes.vrecetas')
@endsection