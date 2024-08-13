@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Indice Paciente Consultado.</h1>
    </div>
@stop

@section('content')
    @include('historia.encab')
    <table class="stripe cell-border hover" id="tab_1">
        <thead>
            <tr>
                <th style="display: none" >id</th>
                <th>Fecha</th>
                <th>Motivo Consulta</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $hist as $his)
            <tr>
                <td style="display: none" >{{ $his->id}}</td>
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d',$his->fecha)->format('d/m/Y');}}</td>
                <td>{{ $his->motcon }}</td>
                <td><a href="{{route('historia.show', ['historium'=>$his->id, 'pacid'=> $dpac->id])}}" class="btn btn-primary">Detalles consulta</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('historia.create', ['pacid'=>$dpac->id])}}" class="btn btn-primary">Nueva Consulta</a>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/datatables.min.js')}}"></script>

    <script type="text/javascript">
        var $jq=jQuery.noConflict(true);
    </script>
    <script>
        $jq(document).ready( function () {
            $jq('#tab_1').DataTable( {
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
            } );
        } );
    </script>
@stop
