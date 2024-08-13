@extends('adminlte::page')

@section('content_header')
    <h1 class="text-center">Crear Nuevo Diagnóstico</h1>
@stop
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            La Descripción del Diagnóstico no puede estar Vacía
        </div>
    @endif
    <form action="{{route('diagn.store')}}"  method="POST" autocomplete="off">
        @csrf
        <label for="desc">Descripción</label>
        <input name="desc" id="desc" class="form-control" type="text">
        <br>
        <input type="submit" class="btn btn-primary" onclick="conf()" value="Guardar">
    </form>
    <br><br>
    <span class="text-danger">Por Favor Asegurese que el Diagnóstico no existe en la base de datos antes de agregarlo</span>
@stop

@section('js')
    <script>
        function conf() {
            confirm("Está seguro de Salvar esta información?");
        }
    </script>
@stop