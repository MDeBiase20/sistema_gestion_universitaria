@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Administrativos</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Administrativos registradas</h3>
                <!-- /.card-tools -->

                    <div class="card-tools">
                        <a href="{{ url('admin/administrativos/create') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>

                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-periodos" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Nombre y apellido</th>
                                    <th style="text-align: center">Rol</th>
                                    <th style="text-align: center">Profesión</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>

                            @php
                                $contador_administrativos = 1;
                            @endphp

                            <tbody>
                                @foreach ($administrativos as $administrativo)
                                    <tr>
                                        <td style="text-align: center">{{ $contador_administrativos++ }}</td>
                                        <td style="text-align: center">{{ $administrativo->nombre." ".$administrativo->apellidos }}</td>
                                        <td style="text-align: center">{{ $administrativo->usuario->roles->pluck('name')->implode(', ') }}</td>
                                        <td style="text-align: center">{{ $administrativo->profesion }}</td>
                                        <td style="text-align: center" class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ url('admin/administrativos/show/'.$administrativo->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                                <a href="{{ url('admin/administrativos/edit/'.$administrativo->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ url('admin/administrativos/'.$administrativo->id) }}" method="post" 
                                                    onclick="preguntar{{ $administrativo->id}} (event)" id='miFormulario{{ $administrativo->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $administrativo->id}}(event) {
                                                        event.preventDefault(); // Evita que se envíe el formulario automáticamente
                                                        var form = document.getElementById('miFormulario{{ $administrativo->id }}');
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
    $('#table-periodos').DataTable({
                        "pageLength": 5,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Administrativos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Administrativos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Administrativos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Administrativos",
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