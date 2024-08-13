<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css')}}">
    <title>Reporte</title>
    <style>

    </style>

</head>
<body>
    <div>
        <br><br>
        <h3>Reporte Atenciones por Fecha: {{$fecDia}}</h3>
        <br><br>
    </div>
    <div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Paciente</th>
                <th scope="col">Tipo Consulta</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($pacs as $pac)
        <tr>
            <td scope="row">{{$pac->nombres}}
            {{$pac->apellidos}}</td>
            @php
                // Para lograr asignar el valor de la base de datos a los select de la pantalla
                $tipc = $pac->tipcon;
                //$opc = array("tipcon" => $tipc);
            @endphp
            <td>
                @switch($tipc)
                @case(1)
                    Consulta
                    @break
                @case(2)
                    Procedimiento
                    @break
                @case(3)
                    Emergencia
                    @break
                @case(4)
                    Excento
                    @break
                @case(5)
                    Seguro
                    @break
            @endswitch
            </td>
            <td>{{Carbon\Carbon::parse($pac->fecha)->format('d/m/Y')}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery.dataTables.min.js')}}"></script>

        <script type="text/javascript">
            var $jq=jQuery.noConflict(true);
        </script>
        <script>
            $jq(document).ready( function () {
                $jq('#tab_1').DataTable();
            } );
        </script>
        <script>
            $(function() {
                $('#dateP').datepicker({

                });
            });
        </script>
</body>
</html>
