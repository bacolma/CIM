@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center">Indice de Diagnósticos</h1>
@stop

@section('content')
    <table class="table table-striped" id="tab_1">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($diags as $diag)
            <tr>
                <td hidden>{{$diag->id}}</td>
                <td>{{$diag->descripcion}}</td>
                <td>                    
                    <form action="{{route('diagn.destroy',['diagn'=>$diag->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{route('diagn.edit',['diagn'=>$diag->id])}}" class="btn btn-primary">Editar</a>
                        <span> </span>
                        <input type="submit" class="btn btn-danger" value="Eliminar" style="display: inline-block;" onclick="conf()">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('diagn.create')}}" class="btn btn-primary">Nuevo Diagnóstico</a>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}">
@stop

@section('js')

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#tab_1').DataTable(  {
                "order": [],
                "language": {
                    "lengthMenu": "Se Muestran _MENU_ Consultas por página",
                    "zeroRecords": "No se encontraron coincidencias.",
                    "info": "Mostranto Página _PAGE_ de _PAGES_",
                    "infoEmpty": "Sin Registros Disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ Total de Registros)",
                    "search": "Buscar:",
                    "decimal": ',',
                    "thousands": '.',
                    "paginate": {
                        "previous": "Anterior",
                        "next": "Próximo"
                    }
                }
            }
            );
        })
    </script>
    <script>
        function conf() {
            confirm("Está seguro de Eliminar este Diagnóstico?");
        }
    </script>
@stop