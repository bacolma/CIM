@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Resultado de Consulta de Paciente</h1>
    </div>
@stop

@section('content')
    @isset($mnsj)
     <h4 class="text-center bg-danger">{{$mnsj}}</h4>
    @endisset
    <table class="stripe cell-border hover" id="tab_1">
        <thead>
            <tr>
                <th hidden>ID</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Cedula</th>
                <th scope="col">Celular</th>
                <th scope="col">Correo</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacient as $pac)
            @php
                $pacId=$pac->id;
            @endphp
            <tr>
                <td hidden>{{ $pac->id}}</td>
                <td>{{ $pac->nombres}}</td>
                <td>{{ $pac->apellidos}}</td>
                <td>{{ $pac->cedula}}</td>
                <td>{{ $pac->celular}}</td>
                <td>{{ $pac->correo}}</td>
                <td>
                    <a href="{{route('paciente.show', [ 'paciente' => $pac->id] )}}"
                        id="btn{{$pac->id}}" class="btn btn-primary">Det/Pac</a>
                    <a href="{{route('historia.index', ['paciente' => $pac->id] )}}"
                        class="btn btn-success">Historia</a>
                    <a class="btn btn-primary" onclick="creaCita($pacId)">Crear Cita</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br><br>
    <a href="{{route('paciente.create')}}" class="btn btn-primary">Nuevo Paciente</a>
    <br><br>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('js')
<script src="{{ asset('js/scrptVar.js')}}" type="text/javascript"></script>
<script>
    let $pacId = {{ Js::from($pacId) }};
</script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>

    <script type="text/javascript">
        var $jq=jQuery.noConflict(true);
    </script>
    <script>
        $jq(document).ready( function () {
            $jq('#tab_1').DataTable( {
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
            } );
        } );
    </script>
@stop
