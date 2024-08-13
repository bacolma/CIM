@extends('adminlte::page')

@section('content_header')
    <div class="d-flex justify-content-center">
        <h1>Consulta de Pacientes.</h1>
    </div>
@stop

@section('content')
@isset($noExist)
    <p class="text-center text-danger">{{$noExist}}</p>
@endisset
    <form action="{{route('paciente.index')}}" autocomplete="off" method="GET">
    <div class="form-group">
        <input type="radio" id="ced" name="cons">
        <label for="ced">Buscar por Cédula</label><br>
        <input type="radio" id="nomb" name="cons">
        <label for="ced">Buscar por Nombre y Apellido</label><br>
        <input class="form-control" type="number" id="cedula" name="cedula" placeholder="Solo Números Ejm: 9745624">
        <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Primer Nombre y Primer Apellido">
        <br>
        <button id="enviar" type="submit" class="btn btn-primary">Consultar Datos Paciente</button>
        <a href="{{route('paciente.create')}}" class="btn btn-primary">Nuevo Paciente</a>
    </div>
@stop

@section('js')
<script>
    let opc1 = document.getElementById("cedula");
    let opc2 = document.getElementById("nombre");

    window.onload = function() {
        const bced = document.getElementById("ced");
        bced.onclick = selOpt1;
        const bnomb = document.getElementById("nomb");
        bnomb.onclick = selOpt2;

        opc1.style.display = "none";
        opc2.style.display = "none";
    }

    function selOpt1(){
        opc1.style.display = "block";
        //opc1.value = "Solo Números";
        opc2.style.display = "none";
    }

 function selOpt2(){
        /*let opc1 = document.getElementById("cedula");
        let opc2 = document.getElementById("nombre");
*/
        opc2.style.display = "block";
        //opc2.value = "Primer Nombre y Primer Apellido";
        opc1.style.display = "none";
    }
</script>
@stop
