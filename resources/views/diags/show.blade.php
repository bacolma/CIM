@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center">Detalle Datos Diagnósticos</h1>
@stop

@section('content')
    <div>
        <form action="{{route('diagn.edit', ['diagn' => $id])}}" autocomplete="off" method="GET">
            <label for="desc">Descripción</label> <br>
            <input disabled class="form-control"  type="text" name="desc" id="desc" value="{{$dinfo}}">
            <br>
            <input type="submit" class="btn btn-primary"value="Editar">
            <button class="btn btn-primary">Nuevo Diagnóstico</button>
        </form>
    </div>
@stop