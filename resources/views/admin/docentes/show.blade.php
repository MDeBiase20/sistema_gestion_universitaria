@extends('adminlte::page')

@section('content_header')
    <h1>Personal docente</h1>
<hr>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('admin/docentes') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
@stop


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del docente: {{ $docente->nombre." ".$docente->apellidos }} </b></h3>
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
                                                <input type="text" class="form-control" value="{{ $docente->usuario->roles->pluck('name')->implode(', ') }}" readonly>
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
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="nombre" value="{{ $docente->nombre }}" readonly>
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
                                                <input type="text" class="form-control" placeholder="Escriba aqui..." name="apellido" value="{{ $docente->apellidos }}" readonly>
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
                                                <input type="number" class="form-control" placeholder="Escriba aquí su dni sin puntos" name="dni" value="{{ $docente->dni }}" readonly>
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
                                                <input type="date" class="form-control" name="fecha_nacimiento" value="{{ $docente->fecha_nacimiento }}" readonly>
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
                                                <input type="text" class="form-control" name="telefono" value="{{ $docente->telefono }}" readonly>
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
                                                <input type="text" class="form-control" name="email" value="{{ $docente->usuario->email }}" readonly>
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
                                                <input type="text" class="form-control" name="profesion" value="{{ $docente->especialidad }}" readonly>
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
                                                <input type="text" class="form-control" name="direccion" value="{{ $docente->direccion }}" readonly>
                                            </div>
                                            @error('direccion')
                                                <small style="color: red">{{ $message }}</small>    
                                            @enderror
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.card-body -->
            </div>
        </div>
    </div>

    <hr>
    <h3>Formación académica</h3>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>Datos del docente: {{ $docente->nombre." ".$docente->apellidos }} </b></h3>

                    <div class="card-tools">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        Registrar nueva formación académica
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Formación académica</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: black">
                                <form action="{{ url('/admin/docentes/createformacion/'.$docente->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Título</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="bi bi-award-fill"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="titulo" placeholder="Escriba aquí el título" value ="{{ old('titulo') }}" required>
                                                </div>
                                                @error('titulo')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class = "col-md-12">
                                            <div class="form-group">
                                                    <label for="">Institución</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="bi bi-hospital-fill"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="institucion" placeholder="Nombre de la institución" value ="{{ old('institucion') }}" required>
                                                    </div>
                                                    @error('institucion')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                            </div>
                                        </div>    
                                        
                                        <div class = "col-md-12">
                                            <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="bi bi-stack"></i></span>
                                                        </div>
                                                        <select name="nivel" class="form-control" id="" required>
                                                            <option value="" disabled selected>Seleccione una opción...</option>
                                                            <option value="Técnico" {{ old('nivel') == 'Técnico' ? 'selected' : '' }}>Técnico</option>
                                                            <option value="Licenciatura" {{ old('nivel') == 'Licenciatura' ? 'selected' : '' }}>Licenciatura</option>
                                                            <option value="Maestría" {{ old('nivel') == 'Maestría' ? 'selected' : '' }}>Maestría</option>
                                                            <option value="Doctorado" {{ old('nivel') == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                                                        </select>
                                                    </div>
                                                    @error('institucion')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                            </div>
                                        </div>
                                        
                                        <div class = "col-md-12">
                                            <div class="form-group">
                                                    <label for="">Año de graduación</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="bi bi-calendar-check-fill"></i></span>
                                                        </div>
                                                        <input type="date" class="form-control" name="fecha_graduacion" value ="{{ old('fecha_graduacion') }}" required>
                                                    </div>
                                                    @error('fecha_graduacion')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                            </div>
                                        </div>
                                        
                                        <div class = "col-md-12">
                                            <div class="form-group">
                                                    <label for="">Archivo (Certificado/Diploma)</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="bi bi-upload"></i></span>
                                                        </div>
                                                        <input type="file" class="form-control" name="archivo" placeholder="Archivo" value ="{{ old('archivo') }}" required>
                                                    </div>
                                                    @error('archivo')
                                                        <small style="color: red">{{ $message }}</small>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class = "col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                    
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        </div>

                    </div>

                <!-- /.card-tools -->
                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            
                        <table id="table-docentes" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Título</th>
                                    <th style="text-align: center">Institución</th>
                                    <th style="text-align: center">Nivel</th>
                                    <th style="text-align: center">Fecha graduación</th>
                                    <th style="text-align: center">Archivo</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>

                            @php
                                $contador_formaciones = 1;
                            @endphp

                            <tbody>
                                @foreach ($formaciones as $formacion)
                                    <tr>
                                        <td style="text-align: center">{{ $contador_formaciones++ }}</td>
                                        <td style="text-align: center">{{ $formacion->titulo }}</td>
                                        <td style="text-align: center">{{ $formacion->institucion }}</td>
                                        <td style="text-align: center">{{ $formacion->nivel }}</td>
                                        <td style="text-align: center">{{ $formacion->fecha_graduacion }}</td>
                                        <td style="text-align: center">
                                            <a href="{{ url($formacion->archivo) }}" class="btn btn-success" style="text-align: center;" target="blanck"> Ver archivo </a>
                                        </td>
                                        <td style="text-align: center" class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form action="{{ url('/admin/docentes/formacion/'. $formacion->id) }}" method="post" 
                                                    onclick="preguntar{{ $formacion->id}} (event)" id='miFormulario{{ $formacion->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $formacion->id}}(event) {
                                                        event.preventDefault(); // Evita que se envíe el formulario automáticamente
                                                        var form = document.getElementById('miFormulario{{ $formacion->id }}');
                                                        Swal.fire({
                                                            title: '¿Estás seguro?',
                                                            text: "¡No podrás revertir esto!",
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#3085d6',
                                                            cancelButtonColor: '#d33',
                                                            confirmButtonText: 'Sí, eliminarlo!'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                form.submit(); // Envía el formulario si el usuario confirma
                                                            }
                                                        });
                                                    }
                                                </script>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

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
    $('#table-docentes').DataTable({
                        "pageLength": 5,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Formaciones",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Formaciones",
                                    "infoFiltered": "(Filtrado de _MAX_ total Formaciones)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Formaciones",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                            })
    
</script>
@stop