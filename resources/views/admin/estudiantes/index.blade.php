@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Estudiantes</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Estudiantes registradas</h3>
                <!-- /.card-tools -->

                    <div class="card-tools">
                        <a href="{{ url('admin/estudiantes/create') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>

                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-docentes" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Nombre y apellido</th>
                                    <th style="text-align: center">Rol</th>
                                    <th style="text-align: center">Dni</th>
                                    <th style="text-align: center">Fecha de nacimiento</th>
                                    <th style="text-align: center">Teléfono</th>
                                    <th style="text-align: center">Correo</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>

                            @php
                                $contador_estudiantes = 1;
                            @endphp

                            <tbody>
                                @foreach ($estudiantes as $estudiante)
                                    <tr>
                                        <td style="text-align: center">{{ $contador_estudiantes++ }}</td>
                                        <td style="text-align: center">{{ $estudiante->nombre." ".$estudiante->apellidos }}</td>
                                        <td style="text-align: center">{{ $estudiante->usuario->roles->pluck('name')->implode(', ') }}</td>
                                        <td style="text-align: center">{{ $estudiante->dni }}</td>
                                        <td style="text-align: center">{{ $estudiante->fecha_nacimiento }}</td>
                                        <td style="text-align: center">{{ $estudiante->telefono }}</td>
                                        <td style="text-align: center">{{ $estudiante->usuario->email }}</td>
                                        <td style="text-align: center" class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ url('admin/estudiantes/show/'.$estudiante->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{ url('admin/estudiantes/edit/'.$estudiante->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ url('admin/estudiantes/'.$estudiante->id) }}" method="post" 
                                                    onclick="preguntar{{ $estudiante->id}} (event)" id='miFormulario{{ $estudiante->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $estudiante->id}}(event) {
                                                        event.preventDefault(); // Evita que se envíe el formulario automáticamente
                                                        var form = document.getElementById('miFormulario{{ $estudiante->id }}');
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                                    "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Estudiantes",
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