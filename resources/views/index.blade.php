@extends('layouts.template')

@section('titulo')
Inicio
@endsection

@section('contenido')
 
@include('componentes.slider')

@include('componentes.productos')

@include('componentes.vrecetas')
@endsection