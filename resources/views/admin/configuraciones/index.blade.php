@extends('adminlte::page')

@section('content_header')
    <h1>Configuraciones</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ url('admin/configuraciones/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-hospital"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ old('nombre', $configuraciones->nombre ?? '') }}" required>
                                                    </div>
                                                    @error('nombre')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Descripción</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-list-columns-reverse"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="descripcion" value="{{ old('descripcion' , $configuraciones->descripcion ?? '') }}"required>
                                                    </div>
            
                                                    @error('descripcion')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-globe-americas"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="direccion" value="{{ old('direccion', $configuraciones->direccion ?? '') }}"required>
                                                    </div>
                                                    @error('direccion')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Teléfono</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="telefono" value="{{ old('telefono', $configuraciones->telefono ?? '') }}" required>
                                                    </div>
            
                                                    @error('telefono')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-at"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="email" value="{{ old('email', $configuraciones->email ?? '') }}" required>
                                                    </div>
                                                    @error('email')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
            
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Sitio web</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-globe"></i></span>
                                                        <input type="text" class="form-control" placeholder="Escriba aqui..." name="web" value="{{ old('web', $configuraciones->web ?? '') }}" required>
                                                    </div>
            
                                                    @error('web')
                                                        <small style="color: red">{{ $message }}</small>    
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div> 

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" name="logo" accept=".jpg, .jpeg, .png" id="file">
                                    @error('logo')
                                        <small style="color:red;"> {{ $message }} </small>
                                    @enderror
                                    <br>
                                    <!--Script para previsualizar la imagen a cargar en la base de datos-->
                                    <center>
                                        <output style="padding= 10px" id="list">
                                            @if (isset($configuraciones->logo))
                                                <img class="thumb thumbnail" src="{{ url($configuraciones->logo) }}" width="50%" title= "{{ $configuraciones->logo }}"/>
                                            @endif
                                        </output>
                                    </center>
                                    <br>
                                    <br>
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
                            </div>

                            </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Cancelar</a>
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