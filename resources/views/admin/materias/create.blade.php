@extends('adminlte::page')

@section('content_header')
    <h1>Materias</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Llene los campos</b></h3>
                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('admin/materias/create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="carrera_id" >Carrera</label>
                                                    <div class="input-group mb-3">

                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                                                        </div>

                                                            <select name="carrera_id" class="form-control" aria-label="Default select example">

                                                                <option selected>Seleccione una opción...</option>
                                                                @foreach ($carreras as $carrera )
                                                                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                                                                @endforeach 
                                                                
                                                            </select>
                                                    </div>
                                                    @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nombre Materia</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-journal-bookmark"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ old('nombre', $materia->nombre ?? '') }}" required>
                                                    </div>
                                                    @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Código Materia</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-upc"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="codigo" value="{{ old('codigo', $materia->codigo ?? '') }}" required>
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
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <a href="{{ url('admin/materias') }}" class="btn btn-secondary">Cancelar</a>
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