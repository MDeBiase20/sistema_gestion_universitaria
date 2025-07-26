@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de materias</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Materiass registradas</h3>
                <!-- /.card-tools -->

                    <div class="card-tools">
                        <a href="{{ url('admin/materias/create') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>

                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-gestion" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Carrera</th>
                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Código</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>

                            @php
                                $contador_materias = 1;
                            @endphp

                            <tbody>
                                @foreach ($materias as $materia)
                                    <tr>
                                        <td style="text-align: center">{{ $contador_materias++ }}</td>
                                        <td style="text-align: center">{{ $materia->carrera->nombre }}</td>
                                        <td style="text-align: center">{{ $materia->nombre }}</td>
                                        <td style="text-align: center">{{ $materia->codigo }}</td>
                                        
                                        <td style="text-align: center" class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ url('admin/materias/edit/'.$materia->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ url('admin/materias/'.$materia->id) }}" method="post" 
                                                    onclick="preguntar{{ $materia->id}} (event)" id='miFormulario{{ $materia->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $materia->id}}(event) {
                                                        event.preventDefault(); // Evita que se envíe el formulario automáticamente
                                                        var form = document.getElementById('miFormulario{{ $materia->id }}');
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
    $('#table-gestion').DataTable({
                        "pageLength": 5,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Materias",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Materias",
                                    "infoFiltered": "(Filtrado de _MAX_ total Materias)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Materias",
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