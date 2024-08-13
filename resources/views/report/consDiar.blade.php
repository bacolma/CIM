@extends('adminlte::page')
@section('content_header')
    <h1 class="text-center">Pacientes Atendidos por Fecha</h1>
@stop

@section('content')

<div class="row">
    <div class="col">
        <h4>Fecha: {{$fecDia}}</h4>
    </div>
    <div class="col">
        <button class="btn btn-primary" onclick="consAten()">Consultar Otra Fecha</button>
    </div>
</div>

<table class="stripe cell-border hover" id="tab_1">
    <thead>
        <tr>
            <th>Paciente</th>
            <th>Tipo Consulta</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pacs as $pac)
    <tr>
        <td>{{$pac->nombres}}
        {{$pac->apellidos}}</td>
        @php
            // Para lograr asignar el valor de la base de datos a los select de la pantalla
            $tipc = $pac->tipcon;
            //$opc = array("tipcon" => $tipc);
        @endphp
        <td>
            @switch($tipc)
                @case(1)
                    Consulta
                    @break
                @case(2)
                    Procedimiento
                    @break
                @case(3)
                    Emergencia
                    @break
                @case(4)
                    Excento
                    @break
                @case(5)
                    Seguro
                    @break
            @endswitch
        </td>
        <td><a href="{{route('historia.show', ['historium'=>$pac->hid, 'pacid'=> $pac->id])}}" class="btn btn-primary">Datos Consulta</a></td>
    </tr>
    @endforeach
    </tbody>
</table>
<a type="button" class="btn btn-primary" href="{{route ('reporte.prtAtnc', ['pacs'=>$pacs,'fecDia'=>$fecDia])}}" method='POST' target="_blank">Imprimir</a>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="{{ asset('js/scrptVar.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
    var $jq=jQuery.noConflict(true);
</script>
<script type="text/javascript">
    $jq(document).ready( function () {
        $jq('#tab_1').DataTable({
            "language": {
                "lengthMenu": "Se Muestran _MENU_ Pacientes por página",
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
<script>
    function enaDis() {
        let act = document.getElementById('calDiv');
        act.toggleAttribute('hidden');
        console.log('Ingreso Correcto');
    }
</script>
@stop
