
@extends('layouts.template')
@section('titulo')
Nosotros
@endsection

@section('nombre')
Sobre Nosotros
@endsection


@section('banner')
@include('componentes.banner')
@endsection

@section('contenido')

 
@include('componentes.nosotros.quienessomos')
@include('componentes.nosotros.pcalidad')
@include('componentes.nosotros.aliados')

@endsection
