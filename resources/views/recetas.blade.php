@extends('layouts.template')
@section('titulo')
Recetas
@endsection

@section('nombre')
Recetas
@endsection


@section('banner')
@include('componentes.banner')
@endsection

@section('contenido')
@include('componentes.recetas.preparacion')
 
@endsection
