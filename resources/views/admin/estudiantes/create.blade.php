@extends('adminlte::page')

@section('content_header')
    <h1>Personal estudiante</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Llene los campos</b></h3>
                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('admin/estudiantes/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rol">Roles</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill-gear"></i></span>
                                                <select name="rol" class="form-control" id="" style="pointer-events: none;">
                                                    <option value="" disabled>Seleccione un rol...</option>
                                                    @foreach ($roles as $rol)
                                                        @if ($rol->name == 'ESTUDIANTE')
                                                            <option value="{{ $rol->name }}" 
                                                                {{ $rol->name == 'ESTUDIANTE' ? 'selected' : '' }} >
                                                            {{ $rol->name }}</option>
                                                        @else
                                                                <option value="">No existe el rol estudiante</option>
                                                        @endif
                                                        
                                                    @endforeach
                                                </select>
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
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ old('nombre') }}" required>
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
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="apellido" value="{{ old('apellidos') }}" required>
                                            </div>
                                            @error('apellidos')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-card-heading"></i></span>
                                                <input type="number" class="form-control" placeholder="Escriba aquí su dni sin puntos" name="dni" value="{{ old('dni') }}" required>
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
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
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
                                                <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required>
                                            </div>
                                            @error('telefono')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Referencia celular</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                                <input type="text" class="form-control" name="ref_celular" value="{{ old('ref_celular') }}" required>
                                            </div>
                                            @error('ref_celular')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="apellido">Parentesco</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="parentesco" value="{{ old('parentesco') }}" required>
                                            </div>
                                            @error('parentesco')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="email">Correo</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
                                                <input type="text" class="form-control" name="profesion" value="{{ old('profesion') }}" required>
                                            </div>
                                            @error('profesion')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required>
                                                </div>
                                                @error('direccion')
                                                    <small style="color: red">{{ $message }}</small>    
                                                @enderror
                                        </div>
                                    </div>    

                            </div>


                            <div class="row">
                                    
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-image"></i></span>
                                                    </div>
                                                    <input type="file" id="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png">
                                                </div>
                                            @error('foto')
                                                <small style="color:red;"> {{ $message }} </small>
                                            @enderror
                                            <!--Script para previsualizar la imagen a cargar en la base de datos-->
                                            <div class="text-center mt-2">
                                                <output style="padding= 10px" id="list">
                                                    @if (isset($estudiante->foto))
                                                        <img class="thumb thumbnail" src="{{ url($estudiante->foto) }}" width="50%" title= "{{ $estudiante->foto }}"/>
                                                    @endif
                                                </output>
                                            </div>    
                                        </div>
                                </div>    
                                
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Agregar</button>
                                        <a href="{{ url('admin/estudiantes') }}" class="btn btn-secondary">Volver</a>
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
    <script>
            function archivo(evt){
                    var files = evt.target.files;
                    //obtenemos la imagen del campo "file"
                    for(var i=0,f; f= files[i]; i++){
                        //sólo admito imágenes
                        if(!f.type.match('image.*')){
                            continue
                        }
                        var reader = new FileReader()
                        reader.onload = (function (theFile){
                            return function(e){
                                //Insertamos la imagen
                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="50%" title= "',escape(theFile.name), '"/>'].join('')
                            }
                        }) (f)
                        reader.readAsDataURL(f)
                    }
                }
                    document.getElementById('file').addEventListener('change', archivo, false)
            </script>
            <!--Script para previsualizar la imagen a cargar en la base de datos-->
@stop