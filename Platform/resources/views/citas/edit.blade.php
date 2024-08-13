@extends('adminlte::page')

    @section('content-header')
    <h1>Creacion de Citas</h1>
    @stop
    @section('content')
        <div>
            <h2>Doctor: {{ $nombre }}</h2>
        </div>


        <form action="{{ route('citas.update', ['cita' => $datAgd[0]->id, 'fecha'=>$datAgd[0]->fecha] )}}" method="POST">
            @csrf
            @method('PUT')
        <div class="form-group" autocomplete="off">
            <!-- <label for="docid">ID Doctor</label> -->
            <input type="text" class="form-control" id="docid" name="docid" value="{{ $doct }}" readonly="yes" hidden>
            <label for="fecha">Fecha de la Cita</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{$datAgd[0]->fecha}}" readonly="yes">
            <input type="hidden" class="form-control" id="horaid" name="horaid" value="{{$datAgd[0]->fecha}}" readonly="yes">
            <label for="horad">Hora de la Cita</label>
            <input type="text" class="form-control" id="horad" name="horad" value="{{$datAgd[0]->hora}}" readonly="yes">
            <label for="datPac">Datos del Paciente</label>
            <input type="text" class="form-control" id="datPac" name="datPac" value="{{$datAgd[0]->datopac}}" >
        </div>
        <button type="submit" class="btn btn-primary">Guardar Datos</button>
      </form>

@stop
