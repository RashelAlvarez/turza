@extends('admin.layouts.material')

@section('titulo')

Turza | Inicio
@endsection
  
@section('contenido')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">person</i>
                    </div>
                    <p class="card-category">Usuarios Registrados</p>
                    <h3 class="card-title">
                        {{$users}}
                    </h3>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="javascript:;">Get More Space...</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Pedidos</p>
                    <h3 class="card-title">{{$pedidos}}</h3>
                    </div>
                    <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                    </div>
                </div>
            </div>
    
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="card card-chart">
                  <div class="card-header card-header-success">
                    <div class="ct-chart" id="dailySalesChart"></div>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">Daily Sales</h4>
                    <p class="card-category">
                      <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">access_time</i> updated 4 minutes ago
                    </div>
                  </div>
                </div>
              </div>



        </div>
    </div>
</div>
{{$analyticsData}}


@endsection