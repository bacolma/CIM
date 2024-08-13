@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center">Edición Datos Diagnósticos</h1>
@stop

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            La Descripción del Diagnóstico no puede estar Vacía
        </div>
    @endif
    <div>
       <form action="{{route('diagn.update', ['diagn' => $id])}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')
            <label for="desc">Descripción</label> <br>
            <input class="form-control"  type="text" name="desc" id="desc" value="{{$dinfo}}">
            <br>
            <input type="submit" class="btn btn-primary" onclick="conf()" value="Guardar Cambios">
            <a href="{{route('diagn.create')}}" type="button" class="btn btn-primary">Nuevo Diagnóstico</a>
    </form>
    </div>
@stop

@section('js')
    <script>
        function conf() {
            confirm("Está seguro de Modificar la información?");
        }
    </script>
@stop