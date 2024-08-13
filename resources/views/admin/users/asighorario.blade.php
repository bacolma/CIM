@extends('adminlte::page')

@section('content_header')
<div class="d-flex justify-content-center">
    <h1 class="underline">Asignar Horario a Usuario</h1>
</div>
@stop
@section('content')
Asignacion de Horario a: {{$usuar->name}}
<br><br>
    <form action="{{ route('usrAsignHor.store')}}" method="POST">
        @csrf
        <input type="hidden" id='id' name="id" value={{$usuar->id}}>
        <input type="radio" id="15m" name="intervalo" value="1">
        <label for="15m">Consultas de 15 Minutos</label><br>
        <input type="radio" id="20m" name="intervalo" value="2">
        <label for="20m">Consultas de 20 Minutos</label><br>
        <input type="radio" id="30m" name="intervalo" value="3">
        <label for="30m">Consultas de 30 Minutos</label><br>
       <!-- <input type="radio" id="45m" name="intervalo" value="4">
        <label for="45m">Consultas de 45 Minutos</label><br> -->
        <label for="horini">Hora de Inicio: </label>
        <input type="text" id="horini" name="horini" placeholder="Ejm: 08:00:00">
        <label for="horfin">Hora de Final: </label>
        <input type="text" id="horfin" name="horfin" placeholder="Ejm: 18:00:00"><br><br>
        <input type="submit" class="btn btn-primary" value="Guardar Cambios">
    </form>
@stop
