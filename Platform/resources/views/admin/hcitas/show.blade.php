@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1 class="underline">Prueba de Captura de Minutos</h1>
</div>
@stop

@section('content')
    <h1>Los valores capturados son los siguientes: </h1>

    {{ $hini }}
    <br>
    {{ $hfin }}
    <br>
    {{ $minuto }}
@stop
