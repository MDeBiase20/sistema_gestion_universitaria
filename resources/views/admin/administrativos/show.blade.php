@extends('adminlte::page')

@section('content_header')
    <h1>Personal administrativo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del usuario: {{ $administrativo->nombre." ".$administrativo->apellidos }} </b></h3>
                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rol">Roles</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill-gear"></i></span>
                                                <input type="text" class="form-control" value="{{ $administrativo->usuario->roles->pluck('name')->implode(', ') }}" readonly>
                                            </div>
                                            @error('rol')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ $administrativo->nombre }}" readonly>
                                            </div>
                                            @error('nombre')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="apellido">Apellido</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="apellido" value="{{ $administrativo->apellidos }}" readonly>
                                            </div>
                                            @error('apellido')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                                                <input type="number" class="form-control" placeholder="Escriba aquí su dni sin puntos" name="dni" value="{{ $administrativo->dni }}" readonly>
                                            </div>
                                            @error('dni')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar2-day-fill"></i></span>
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $administrativo->fecha_nacimiento }}" readonly>
                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                                <input type="text" class="form-control" name="telefono" value="{{ $administrativo->telefono }}" readonly>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                                                <input type="text" class="form-control" name="email" value="{{ $administrativo->usuario->email }}" readonly>
                                            </div>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="profesion">Profesión</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-briefcase-fill"></i></span>
                                                <input type="text" class="form-control" name="profesion" value="{{ $administrativo->profesion }}" readonly>
                                            </div>
                                            @error('profesion')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" class="form-control" name="direccion" value="{{ $administrativo->direccion }}" readonly>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('admin/administrativos') }}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
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