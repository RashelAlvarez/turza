@extends('layouts.template')
@section('titulo')
Pedidos
@endsection

@section('nombre')
Pedidos
@endsection


@section('banner')
@include('componentes.banner')
@endsection

@section('contenido')
@include('componentes.pedidos.cliente')

@endsection
