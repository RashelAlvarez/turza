@extends('admin.layouts.templateadmin')
@section('titulo')
Pedidos
@endsection

@section('header')
Ver Pedidos
@endsection

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-6">

        <div class="box box-warning">
            <div class="box-header with-border">
            <h3 class="box-title">Ingresa tus Datos Personales o Jurídicos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
            <div class="box-body">
                <div class="form-group">
                <label for="exampleInputCliente">Cliente</label>
                <input type="text" class="form-control" id="exampleInputCliente" placeholder="Cliente o Razón Social">
                </div>
                <div class="form-group">
                <label for="exampleInputRif">Rif</label>
                <input type="text" class="form-control" id="exampleInputRif" placeholder="Ingresa Rif">
                </div>
                <div class="form-group">
                    <label for="exampleInputDireccion">Dirección</label>
                    <input type="text" class="form-control" id="exampleInputDireccion" placeholder="Dirección">
                </div>
                <div class="form-group">
                    <label for="exampleInputTelefono">Teléfono</label>
                    <input type="text" class="form-control" id="exampleInputTelefono" placeholder="Teléfono">
                </div>
                <div class="form-group">
                <label for="exampleInputFile">Adjunta tu Rif en formato PDF, PNG,JPG</label>
                <input type="file" id="exampleInputFile">

                <p class="help-block">Example block-level help text here.</p>
                </div>
             
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>

@endsection
