<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inf Med</title>
    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <style>
        @page {
            margin: 0cm 0cm;
        }
        body {
            margin-top: 3cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
        }
        .header {
            position:fixed;
            top:1cm;
            left:1cm;
            right:1cm;
            height:3cm;
        }
        .head-right {
            float: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <a>Carlos Eduardo Marquez</a>
        <div class="head-right">
            <img src="{{asset('images/001_LOGO.png')}}">
        </div>
        <br>
        <a>Traumatología, Cirugía Artroscopica y Reemplazos Articulares.</a>
    </div>
    <main>
    <div>
    <p style="float:right">Caracas {{Carbon\Carbon::parse($detCons->fecha)->format('d/m/Y')}}</p>
    <p>
        <input hidden id="fecnac" value="{{$dpac->fecnac}}">
        Paciente {{$dpac->nombres}} {{$dpac->apellidos}}<br>
        Cedula: {{$dpac->cedula}} <span id="edadCalc">Edad: {{$eda}} años</span></p>

    </div>
    @php
    $campos = array("motcon","texenf","antecedentes","vitres","exalab","exarad","exapre","exaesp","resexalab",
      "resexarad","resexapre","resexaesp", "otrobs","tratamiento","indicaciones","plater");

    $titulos = array("motcon"=>"Motivo Consulta", "texenf"=>"Enfermedad Actual","otrobs"=>"Diagnósticos",
        "evolucion"=>"Evolución","plater"=>"Planificación Terapia","tratamiento"=>"Tratamiento",
        "indicaciones"=>"Indicaciones","vitres"=>"Exámen Físico","evolucion"=>"Evolucion",
        "antecedentes"=>"Antecedentes","exalab"=>"Examenes Laboratorio",
        "exarad"=>"Exámenes Radiológicos","exaesp"=>"Exámenes Especiales",
        "exapre"=>"Exámenes Preoperatorios","indicaciones"=>"Indicaciones",
        "resexalab"=>"Resultados Exámenes Laboratorios","resexarad"=>"Resultados Exámenes Radiológicos",
        "resexapre"=>"Resultados Exámenes Preoperatorios","resexaesp"=>"Resultados Exámenes Especiales");
        $cont=0;
    @endphp
<div>
    <p style="text-align:center; font-weight:bold"><ins>INFORME MÉDICO</ins></p>
</div>
<div>
        @foreach ($campos as $campo)
            @if ($campo=='antecedentes')
                @if(!$dpac->$campo == '')
                    <span style="font-weight:bold"> {{$titulos[$campo]}}</span><br>
                    <!-- {{ $dpac->$campo}} <br><br> -->
                    @php
                     echo nl2br($dpac->$campo);
                    @endphp
                    <br><br>
                 @endif
            @elseif (!$detCons->$campo == '')
                <span style="font-weight:bold"> {{$titulos[$campo]}}</span><br>
               <!-- {{$detCons->$campo}}<br><br> -->
               @php
                echo nl2br($detCons->$campo);
               @endphp
               <br><br>
            @endif
        @endforeach
</div>

<div style="text-align:center">
    <br><br>
    <p>
        <br><br>Carlos Eduardo Márquez G<br>
        M.S.A.S.: 31508 C.M.D.F.: 11760<br>
        RIF: V-05304777-3
    </p>
    </div>

</div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script type="text/javascript" src="{{ asset('js/scrptVar.js') }}"></script>
    <script>
        fechaNacimiento = document.getElementById("fecnac");
        console.log(fechaNacimiento.value);
        const edad=document.getElementById("edadCalc");
        console.log("Mensaje de Prueba");

        const fechaActual = new Date;
        const anoActual = parseInt(fechaActual.getFullYear());
        const mesActual = parseInt(fechaActual.getMonth() + 1);
        const diaActual = parseInt(fechaActual.getDate());

        const anoNac = parseInt(String(fechaNacimiento.value).substring(0,4));
        const mesNac = parseInt(String(fechaNacimiento.value).substring(5,7));
        const diaNac = parseInt(String(fechaNacimiento.value).substring(8,10));
        console.log("Hola");
        let ed = anoActual - anoNac;
        if (mesActual < mesNac) {
            ed = ed - 1;
        } else if(mesActual === mesNac) {
            if(diaActual < diaNac) {
                ed = ed - 1;
            }
        }

        //console.log("Prueba 2");
        edad.innerHTML = " Edad " + ed;

    </script>
    </main>
</body>
</html>
