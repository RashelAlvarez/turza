@extends('admin.layouts.templateadminator')




@section('contenido')

<div class="container-fluid">
    {{--   <h4 class="c-grey-900 mT-10 mB-30">Usuarios</h4> --}}
       
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <h4 class="c-grey-900 mB-20">Clientes</h4>
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                      <th>#</th>
                      <th>Cliente</th>
                      <th>Rif</th>
                      <th>Telefono</th>
                      <th>Dirección</th>
                      <th>Rif Digital</th>
             
                      <th>Fecha de Creación</th>
                      <th>Acciones</th>
                  </tr>
                </thead>
              
                <tbody>
                    @foreach($clientes as $cliente)
                        
                  
                  <tr>
                  <td>{{$loop->iteration}}</td>
                    <td>{{$cliente->cliente}}</td>
                    <td>{{$cliente->rif}}</td>
                    <td>{{$cliente->telefono}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>
                   {{--  <a href="{{route('cliente.show', $cliente->file)}}" target="_blank">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                     
                   </a> --}}
                   
                            {{--      <a href="{{route('cliente.show', $cliente->file)}}" target="_blank">
                                    <i class="c-green-500 fa fa-download" aria-hidden="true"></i>
                            </a> --}}
                    </td>
    {{--                 $pathToFile = '/rif/'.$cliente->file
                    return response()->file($pathToFile) --}}
                    <td>{{$cliente->created_at->format('d-m-Y')}}</td>
                    <td>
                      <a type="" href="{{url('/clientes/'.$cliente->id.'/edit')}}"  class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">Editar</a>
                      <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">Eliminar</a>
                    </td>
                  </tr>
                  @endforeach
                 
                </tbody>
            </table>
          </div>
        </div>
     
  </div>
  



@endsection