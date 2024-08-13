@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Datos de Paciente.</h1>
    </div>
@stop

@section('content')
<form autocomplete="off">

<nav>
    <div class="nav nav-tabs" id="tabMenu"  role="tablist">
        <a class="nav-link text-dark bg-primary active" id="navTabPac1" data-toggle="tab" role="tab" href="#tabpac1" aria-controls="tabpac1" aria-selected="true">Hoja 1/3</a>
        <a class="nav-link text-dark bg-primary" id="navTabPac2" data-toggle="tab" role="tab" href="#tabpac2" aria-controls="tabpac2" aria-selected="false">Hoja 2/3</a>
        <a class="nav-link text-dark bg-primary" id="navTabPac3" data-toggle="tab" role="tab" href="#tabpac3" aria-controls="tabpac3" aria-selected="false">Hoja 3/3</a>
    </div>
</nav>
<div><br></div>
<div class="tab-content" id="tabConten">
    <div class="tab-pane fade show active" id="tabpac1" role="tabpanel" aria-labelledby="navTabPac1">

        <div class="row">
            <div class="col">
                <label for="nombres">Nombres</label><br>
                <input type="text" id="nombres" name="nombres" class="form-control" value="{{$pacient->nombres}}">
            </div>
            <div class="col">
                <label for="" >Apellidos</label><br>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{$pacient->apellidos}}">
            </div>
            <div class="col">
                <label for="cedula" >Cedula</label><br>
                <input type="number" class="form-control" id="cedula" name="cedula" value="{{$pacient->cedula}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="fecnac">Fecha Nac</label><br>
                <input type="date" class="form-control" id="fecnac" name="fecnac" value="{{$pacient->fecnac}}">
            </div>
            <div class="col">
                <label for="edadCalc">Edad</label>
                <input type="number" class="form-control" id="edadCalc" name="edadCalc">
            </div>
            <div class="col">
                <label for="nacionid">Nacionalidad</label><br>
                <select id="nacionid" class="form-control" name="nacionid" value="{{$pacient->nacionid}}">
                    <option value="1">Venezolano</option>
                    <option value="2">Extranjero</option>
                    <option value="3">Sin Cedula</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="lugarnac">Lugar De Nacimiento</label><br>
                <input type="text" class="form-control" id="lugarnac" name="lugarnac" value="{{$pacient->lugarnac}}">
            </div>
            <div class="col">
                <label for="sexoid">Sexo</label><br>
                <select id="sexoid" class="form-control" name="sexoid" value="{{$pacient->sexoid}}">
                    <option value="1">Femenino</option>>
                    <option value="2">Masculino</option>
                </select>
            </div>
            <div class="col">
                <label for="edocivid">Estado Civil</label><br>
                <select id="edocivid" name="edocivid" class="form-control" value="{{$pacient->edocivid}}">
                    <option value="1">Soltera(o)</option>
                    <option value="2">Casada(o)</option>
                    <option value="3">Divorciada(o)</option>
                    <option value="4">Viuda(o)</option>
                </select>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <label for="correo">Correo</label><br>
                <input type="email" name="correo" id="correo" class="form-control" value="{{$pacient->correo}}">
            </div>
            <div class="col">
                <label for="profesion">Profesión</label>
                <input type="text" id="profesion" name="profesion" class="form-control" value="{{$pacient->profesion}}">
            </div>
            <div class="col">
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control" value="{{$pacient->celular}}">
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tabpac2" role="tabpanel" aria-labelledby="NavTabPac2">
        <div class="row">
            <div class="col">
                <label for="tlfofc">Telefono Habitación</label>
                <input type="text" id="tlfofc" name="tlfofc" class="form-control" value="{{$pacient->tlfha}}">
            </div>
            <div class="col">
                <label for="dirhab">Dirección Habitación</label>
                <textarea id="dirhab" name="dirhab" class="form-control" rows="3" cols="20">
                    {{$pacient->dirhab}}
                </textarea>
            </div>
            <div class="col">
                <label for="tlfhab">Telefono Oficina</label>
                <input type="text" id="tlfhab" name="tlfhab" class="form-control" value="{{$pacient->tlfofc}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="dirhab">Dirección Oficina</label>
                <textarea id="dirhab" name="dirhab" class="form-control" rows="3" cols="20">
                    {{$pacient->dirofc}}
                </textarea>
            </div>
            <div class="col">
                <label for="referido">Referido</label>
                <input type="text" id="referido" name="referido" class="form-control" value="{{$pacient->referido}}">
            </div>
            <div class="col">
                <label for="fecreg">Fecha de Registro</label>
                <input type="date" id="fecreg" name="fecreg" class="form-control" value="{{$pacient->fecreg}}">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="cedrepres">Cedula Representante</label>
                <input type="text" id="cedrepres" name="cedrepres" class="form-control" value="{{$pacient->cedrepres}}">
            </div>
            <div class="col">
                <label for="representante">Representante</label>
                <input type="text" id="representante" name="representante" class="form-control" value="{{$pacient->representante}}">
            </div>
            <div class="row">
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tabpac3" role="tabpanel" aria-labelledby="NavTabPac3">
        <div class="row">
            <div class="col">
                <label for="antecedentes">Antecedentes Médicos</label>
                <textarea id="antecedentes" name="antecedentes" class="form-control" rows="8" cols="20">
                    {{$pacient->antecedentes}}
                </textarea>
            </div>
            <div class="col">
                <label for="historia">Carpeta Historia</label>
                <input type='text' id="historia" name="historia" class="form-control" value="{{$pacient->historia}}">
            </div>
        </div>
    </div>
</div>

</form>

    <br>

    <a href="{{route('paciente.create')}}" role="button" class="btn btn-primary">Nuevo Paciente</a>
    <a class="btn btn-primary" id="btnRon" href="{{route('paciente.edit', [$pacient->id])}}">Modificar Datos Paciente</a>
    <a href="{{route('historia.index', ['paciente' => $pacient->id] )}}" class="btn btn-primary">Historia Paciente</a>

@php
// Para lograr asignar el valor de la base de datos a los select de la pantalla
    $naci = $pacient->nacionid; $sex = $pacient->sexoid; $edciv = $pacient->edocivid;
    $opc = array("nacionid" => $naci, "sexoid" => $sex, "edocivid" => $edciv);
@endphp
@stop
<!-- Para lograr asignar el valor de la base de datos a los select de la pantalla -->

@section('js')
    <script>
        const opc = {{ Js::from($opc) }};
        Object.keys(opc).forEach(key => {
            document.getElementById(key).value = opc[key];
        });
    </script>

    <script src="{{ asset('js/scrptVar.js') }}"></script>
    <script>
        calcEdad();
        setReadO();
    </script>
@stop
