@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Crear Tipo de Horario</h1>
    </div>
@stop

@section('content')
    <form action="{{ route('tiphora.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="intv">Ingrese el intervalo del horario en minutos</label>
            <input type="input" class="form-control" id="intv" name="intv" placeholder="00:20:00 Intervalos de 20 min" pattern="[0-9]{2}:[0-9]{2}:[0-9]{2}">
            <br>
            <label for="intdesc">Ingrese la descripcion del Intervalo</label>
            <input type="text" class="form-control" id="intdesc" name="intdesc">
        </div>
            <input type="submit" class="btn btn-primary text-dark" value="Guardar Cambios">
            <a type="button" class="btn btn-danger text-dark" href="{{ route('tiphora.index')}}">Cancelar</a>
    </form>
@stop
