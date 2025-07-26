@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de Roles</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles registradas</h3>
                <!-- /.card-tools -->

                    <div class="card-tools">
                        <a href="{{ url('admin/roles/create') }}" class="btn btn-primary">Crear nuevo</a>
                    </div>

                </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="table-gestion" class="table table-bordered table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th style="text-align: center">#</th>
                                    <th style="text-align: center">Nombre</th>
                                    <th style="text-align: center">Acciones</th>
                                </tr>
                            </thead>

                            @php
                                $contador_roles = 1;
                            @endphp

                            <tbody>
                                @foreach ($roles as $rol)
                                    <tr>
                                        <td style="text-align: center">{{ $contador_roles++ }}</td>
                                        <td style="text-align: center">{{ $rol->name }}</td>
                                        <td style="text-align: center" class="text-center">
                                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <a href="{{ url('admin/roles/edit/'.$rol->id) }}" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                <form action="{{ url('admin/roles/'.$rol->id) }}" method="post" 
                                                    onclick="preguntar{{ $rol->id}} (event)" id='miFormulario{{ $rol->id }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 3px 3px 0px"><i class="bi bi-trash"></i></button>
                                                </form>
                                                <script>
                                                    function preguntar{{ $rol->id}}(event) {
                                                        event.preventDefault(); // Evita que se envíe el formulario automáticamente
                                                        var form = document.getElementById('miFormulario{{ $rol->id }}');
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                                    "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Roles",
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