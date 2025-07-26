@extends('adminlte::page')

@section('content_header')
    <h1>Roles</h1>
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
                        <form action="{{ url('admin/roles/create') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill-gear"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="name" value="{{ old('name', $roles->nombre ?? '') }}" required>
                                                    </div>
                                                    @error('name')
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
                                    <a href="{{ url('admin/roles') }}" class="btn btn-secondary">Cancelar</a>
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