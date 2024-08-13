@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Pacientes Programados del Día {{ $fech }} Prueba</h1>
    </div>
@stop

@section('content')

<div class="row">
    <div class="col">
        <h5>Doctor:  {{ $nombre }}</h5>
    </div>
    <div class="col">
        <button class="btn btn-primary" onclick="consAgenda()">Consultar Otra Fecha</button>
</div>
</div>
<table class="stripe cell-border hover" id="tab_1">
    <thead>
        <tr>
            <th scope="col" style="display: none"></th>
            <th scope="col">Hora.</th>
            <th scope="col">Det. Paciente</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hcitas as $hcita)
        <tr>
            <td style="display: none">{{ $hcita->id }}</td>
            <td>{{ $hcita->hora }}</td>
            @php
                $ext = 0;
            @endphp
            @if(isset($agendas))
            @foreach ($agendas as $agenda)
                @if($agenda->hcitaid == $hcita->id)
                    @if(isset($agenda->datopac))
                        <td>{{$agenda->datopac}}</td>
                        <td><a href="{{route('citas.edit', ['cita' => $agenda->id, 'fecId' => $fecExt[0]->id])}}" id="btn{{$agenda->id}}" class="btn btn-success">Modificar Datos</a></td>
                        @php
                            $ext = 1;
                        @endphp
                        @break
                    @endif
                @endif
            @endforeach
            @endif
            @php
                if ($ext == 0) {
                    echo '<td>Hora Disponible</td>';
                    echo '<td></td>';
                }
            @endphp

        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('js')
<script src="{{ asset('js/scrptVar.js')}}" type="text/javascript" charset="utf8"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript">
        var $jq=jQuery.noConflict(true);
    </script>
    <script>
        $jq(document).ready( function () {
            $jq('#tab_1').DataTable({
                "language": {
                    "lengthMenu": "Se Muestran _MENU_ Citas por página",
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
        } );
    </script>
@stop
