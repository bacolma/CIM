@extends('adminlte::page')

@section('content_header')
<h1>Prueba</h1>
<h1>Venimos en la busqueda Detalles de Historia</h1>
@stop

@section('content')

<table class="stripe cell-border hover" id="tab_1">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha</th>
            <th scope="col">Motivo Consulta</th>
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $pacient as $pac)
        <tr>
            <td>{{ $pac->id}}</td>
            <td>{{ $pac->Fecha}}</td>
            <td>{{ $pac->MotCon}}</td>
            <td>Opciones</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/datatables.css')}}"
@stop

@section('js')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src=" {{ asset('js/datatables.js') }} "></script>
    <script>
        $(document).ready(function() {
            $('#tab_1').DataTable();
        })
    </script>
@stop
