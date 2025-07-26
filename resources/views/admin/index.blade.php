@extends('adminlte::page')

@section('content_header')
    <h1><b>Menú principal</b></h1>
    <hr>
@stop

@section('content')

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Gestiones registradas</b></span>
                    <span class="info-box-number">{{ $total_gestiones }} <b>gestión/es registrada/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/diploma.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Carreras registradas</b></span>
                    <span class="info-box-number">{{ $total_carreras }} <b>carreras registradas</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/grafico-de-linea.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Niveles registradas</b></span>
                    <span class="info-box-number">{{ $total_niveles }} <b>nivel/es registrada/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/tiempo.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Turnos registradas</b></span>
                    <span class="info-box-number">{{ $total_turnos }} <b>turno/os registrada/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/copiar.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Paralelos registradas</b></span>
                    <span class="info-box-number">{{ $total_paralelos }} <b>paralelo/s registrado/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/completar.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Periodos registrados</b></span>
                    <span class="info-box-number">{{ $total_periodos }} <b>periodo/s registrado/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                
                    <img src="{{ url('/img/libro.gif') }}" width="70px" alt="">

                <div class="info-box-content">
                    <span class="info-box-text"><b>Materias registradas</b></span>
                    <span class="info-box-number">{{ $total_materias }} <b>materia/s registrada/s</b></span>
                </div>
                <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

        </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop