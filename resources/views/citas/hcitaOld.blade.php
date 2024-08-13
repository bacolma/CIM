@extends('layouts.layout')

@section('encab')
<link rel="stylesheet" type="text/css" href="/citas/public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/citas/public/css/datatables.bootstrap4.css">
@endsection

@section('content')
    <h4 class="text-center">Pacientes Programados del Día {{ $fech }}</h4>
    <h5>Doctor:  {{ $nombre }}</h5>
    <table class="table table-sm table-bordered table-striped" id="tab_1">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Hora.</th>
                <th scope="col">Det. Paciente</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($hcitas as $hcita)
            <tr>
                <td>{{ $hcita->id }}</td>
                <td>{{ $hcita->hora }}</td>
                @php
                        $ext = 0;
                    @endphp

                @foreach ($agendas as $agenda)

                @if ($agenda->hcita_id == $hcita->id)
                    <td>{{ $agenda->datopac }}</td>
                    @php
                        $ext = 1;
                    @endphp
                @endif
                @endforeach
                @if ($ext == 0)
                    <td>Hora Disponible</td>
                @endif

                <td>
                    <!-- <a href="create/{{$fech}}/{{$doct}}/{{$hcita->id}}" id="btn{{$hcita->id}}" class="btn btn-success">Nueva</a> -->
                    <a href="check/{{$fecha}}/{{$doct}}/{{$hcita->id}}" id="btn{{$hcita->id}}" class="btn btn-success">Editar</a>
                    <!--<a href="create/{{$fech}}/{{$doct}}/{{$hcita->id}}" id="btn{{$hcita->id}}" class="btn btn-danger">Eliminar</a> -->

                    @if ($ext == 1)
                    <script type="text/javascript" >
                        document.getElementById("btn{{$hcita->id}}").disabled=true);
                    </script>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@section('content2')
<h4 class="text-center">Orden de Ingreso a la Consulta.</h4>
<table class="table table-sm table-bordered table-striped" id="tab_2">
    <thead>
        <tr>
            <th scope="col">Paciente.</th>
            <th scope="col">Tipo de Consulta.</th>
        </tr>
    </thead>
    <tbody>


            <tr>
                <td>{{'Angel Mancera, 14876'}}</td>
                <td>
                    <select name="tcons" id="tcons">
                        <option value="1">Consulta</option>
                        <option value="2">Proced.</option>
                        <option value="3">Emerg.</option>
                    </select>

                </td>
            </tr>

    </tbody>

</table>
<input type="submit" value="Insertar Paciente">
@endsection

@section('scrdtab')
<script type="text/javascript" charset="utf8" src="js/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    var $jq=jQuery.noConflict(true);
</script>
<script>
    $jq(document).ready( function () {
        $jq('#tab_1').DataTable();
    } );
</script>
<script>
    $jq(document).ready( function () {
        $jq('#tab_2').DataTable();
    } );
</script>
@endsection
