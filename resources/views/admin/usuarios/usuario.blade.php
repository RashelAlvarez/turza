@extends('admin.layouts.templateadmin')
@section('titulo')
Usuarios
@endsection


@section('header')
Ver Usuarios
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Ver Usuarios</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>Cliente</th>
                <th>Documento</th>
                <th>Rif</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    
               
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$usuario->nombre}}</td>
                    <td>{{$usuario->apellido}}</td>
                    <td>{{$usuario->role}}</td>
                    <td>{{$usuario->razonsocial}}</td>
                    <td>{{$usuario->idtipodocumento}}</td>
                    <td>{{$usuario->rif}}</td>
                    <td>{{$usuario->telefono}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>
                      <a  href="{{-- {{url('/usuario/'.$usuario->id.'/edit')}} --}}"  class="btn btn-warning border-bottom-warning btn-sm ">Modificar</a> 
                 
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
            {{-- <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </tfoot> --}}
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

      {{-- <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </thead>
            <tbody>
             
              <tr>
                <td>Other browsers</td>
                <td>All others</td>
                <td>-</td>
                <td>-</td>
                <td>U</td>
              </tr>
            </tbody>
            <tfoot>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box --> --}}
    </div><!-- /.col -->
  </div><!-- /.row -->



@endsection