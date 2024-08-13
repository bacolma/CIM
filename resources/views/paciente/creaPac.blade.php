@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Datos del Nuevo Paciente.</h1>
    </div>
@stop

@section('content')
<div class="text-right">
<span class="text-danger text-center">(*) Campos Obligatorios</span><br>
</div>
<form action="{{route('paciente.store')}}" autocomplete="off" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col">
                <label for="nomb">Nombres <span class="text-danger">(*)</span></label>
                <input type="text" class="form-control" id="nomb" name="nomb" required>
            </div>
            <div class="col">
                <label for="apell">Apellidos <span class="text-danger">(*)</span></label>
                <input type="text" class="form-control" name="apell" id="apell" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cedula">Cédula</label>
                <input type="text" class="form-control" name="cedula" id="cedula">
            </div>
            <div class="col">
                <label for="fecnac">Fecha Nacimiento <span class="text-danger">(*)</span></label>
                <input type="date" class="form-control" name="fecnac" id="fecnac" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="nacionid">Nacionalidad <span class="text-danger">(*)</span></label>
                <select name="nacionid" id="nacionid" class="form-control" required>
                    <option value="1">Venezolana</option>
                    <option value="2">Extranjera</option>
                    <option value="3">Sin Cedula</option>
                </select>
            </div>
            <div class="col">
                <label for="sexoid">Genero/Sexo <span class="text-danger">(*)</span></label>
                <select name="sexoid" id="sexoid" class="form-control" required>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="edocivid">Estado Civil <span class="text-danger">(*)</span></label>
                <select name="edocivid" id="edocivid" class="form-control" required>
                    <option value="1">Soltera/Soltero</option>
                    <option value="2">Casada/Casado</option>
                    <option value="3">Divoricada/Divorciado</option>
                    <option value="4">Viuda/Viudo</option>
                </select>
            </div>
            <div class="col">
                <label for="celular">Número Celular</label>
                <input type="text" name="celular" id="celular" class="form-control">
            </div>
        </div>
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Guardar Datos Paciente">

</form>
@stop
