@extends('adminlte::page')
@stop

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Creacion de Citas</h1>
    </div>
@stop
@section('content')
    <div>
        <h2>Doctor: {{ $dnom }}</h2>
    </div>

    <form action="{{ route('citas.store')}}" method="POST">
            @csrf
        <div class="form-group">
            <label for="docid">ID Doctor</label>
            <input type="text" class="form-control" id="docid" name="docid" value="{{ $did }}" readonly="yes">
            <label for="fecha">Fecha de la Cita</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{$fecha;}}" readonly="yes">
            <input type="hidden" class="form-control" id="horaid" name="horaid" value="{{$hcitaid}}" readonly="yes">
            <label for="horad">Hora de la Cita</label>
            <input type="text" class="form-control" id="horad" name="horad" value="{{$hora}}" readonly="yes">
            <label for="datPac">Datos del Paciente</label>
            <input type="text" class="form-control" id="datPac" name="datopac" autocomplete="off" value="{{$datopac}}" placeholder="Escriba información del Paciente.">
        </div>
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
            <a type="button" class="btn btn-danger" href="{{route('citas.list', ['pacId'=>$pacId,'fecha' => $fecha])}}">Cancelar</a>
    </form>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <!--<li>{{$error}}</li>-->
                    <li>El Campo de Datos del Paciente, no puede ser guardado en Blanco</li>
                    <li>Seleccione Cancelar si desea regresar al Menu anterior.</li>
                @endforeach
            </ul>
        </div>
        @endif
@stop
