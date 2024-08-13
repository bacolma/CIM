@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Tipos de Horarios Existentes</h1>

    </div>
@stop

@section('content')

    <div>
    <table id="thoratab"  class="stripe cell-border hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Intervalo</th>
                <th>Descripción</th>
                <th>Horas Creadas</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($thor as $tho )
        <tr>
            <td>{{ $tho->id }}</td>
            <td>{{ $tho->intervalo }}</td>
            <td>{{ $tho->descripcion }}</td>
            <td><a type="button" class="btn btn-primary text-dark" href=" {{ route('hcita.index', [$tho->id]) }} ">Horas</td>
        </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    <div class="d-inline p-2 justify-content-start">
        <a type="button" class="btn btn-primary text-dark" href=" {{ route('tiphora.create') }} ">Crear Nuevo Tipo de Horario</a>
        <a type="button" class="btn btn-primary text-dark" href=" {{ route('usrAsignHor.index') }} ">Horario Por Usuario</a>
    <br><br>
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
        $jq('#thoratab').DataTable();
    });
</script>
@stop
