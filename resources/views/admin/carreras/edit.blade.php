@extends('adminlte::page')

@section('content_header')
    <h1>Carreras</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title"><b>Llene los campos</b></h3>
                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('admin/carreras/edit', $carrera->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ old('nombre', $carrera->nombre ?? '') }}" required>
                                                    </div>
                                                    @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                                    <a href="{{ url('admin/carreras') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop