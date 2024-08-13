@extends('adminlte::page')
@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Horarios Por Usuario</h1>
    </div>
@stop
@section('content')
<div>
    <table id="thoratab"  class="stripe cell-border hover">
        <thead>
            <tr>
                <th>id</th>
                <th>Usuario</th>
                <th>Intervalo</th>
                <th>Hora Inicio</th>
                <th>Hora Final</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($horAsig as $hras)
                    <td>{{$hras->id}}</td>
                    <td>{{$hras->name}}</td>
                    <td>{{$hras->descripcion}}</td>
                    <td>{{$hras->horaini}}</td>
                    <td>{{$hras->horafin}}</td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop
@section('js')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        var $jq=jQuery.noConflict(true);
    </script>
    <script>
        $jq(document).ready( function () {
            $jq('#thoratab').DataTable( {
                "language": {
                    "lengthMenu": "Se Muestran _MENU_ Usuarios por página",
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
            });
        });
    </script>
@stop
