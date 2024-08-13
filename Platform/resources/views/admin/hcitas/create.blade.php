@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1 class="underline">Crear Nuevo Set Horas de Citas</h1>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
@stop

@section('content')
    @csrf
    <br>
    <h2 class="font-weight-bold">Para su Correcto Funcionamiento, Debe colocar valores para Hora, Minutos y Segundos HH:MM:SS</h2>
    <br>
    <form method="POST" action="{{ route('hcitas.store') }}">
        @csrf
        <div class="form-group">
            <label for="hini">Indique la Hora de Inicio:</label>
            <input type="text" class="form-control" id="hini" name="hini" placeholder="08:00:00 Para las 8 am"
            pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}">
            <label for="hfin">Indique la Hora Final:</label>
            <input type="text" class="form-control" id="hfin" name="hfin" placeholder="16:30:00 Para las 4 pm"
            pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}">
            <label for="minuto">Ingrese el Valor del intervalo de las horas de la cita:</label>
            <input type="text" class="form-control" id="minuto" name="minuto" placeholder="00:20:00 Intervalos de 20 min"
            pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}">
        </div>
        <input type="submit" class="btn btn-success text-dark" value="Guardar Cambios">
        <a type="button" class="btn btn-danger text-dark" href="{{ route('hcitas.index')}}">Cancelar</a>
    </form>
@stop
