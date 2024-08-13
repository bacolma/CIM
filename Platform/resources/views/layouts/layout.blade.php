<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!--<script src="{{ asset('js/app.js') }}" defer></script> -->
        <!--<link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/datatables.bootstrap4.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="css/bootstrap-icons/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>
    <body>
        <div style="height: 100px;">
            <h1 class="text-center">Sistema de Citas.</h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <form action="/show" method="POST">
                        @csrf

                    <div class="container" style="height: 20px"></div>

                    <h3>Fecha Del Día:</h3>
                    <p><input type="date" id="calend" name="fecha" autocomplete="off"></p>

                    <!--<div class="container" style="height: 10px"></div> -->
                    <label>Seleccione una Fecha Nueva para Consultar</label>
                    <button class="button button-primary" type="submit">Consultar Citas</button>
                    </form>

                <div>
                    <form action="/medicos" method="GET" >
                    <br><br>
                    <button class="button button-primary" type="submit">Agregar/Modificar/Eliminar Doctores</button>
                    </form>
                </div>
                </div>

                <div class="col-9">
                    @yield('content')
                </div>
                <!--<div class="col-4">
                    @yield('content2')
                </div> -->
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script>
            document.getElementById("calend").value = getDate();

           function getDate() {
                var dia = new Date();
                var hoy = dia.getFullYear() + '-' + ('0' + (dia.getMonth() + 1)).slice(-2) + '-' +  ('0' + dia.getDate()).slice(-2);
                return hoy;
            };

            $(function() {
                $( "#datepicker" ).datepicker({
                    dateFormat: 'dd/mm/yy',
                    dayNames: [ "Domingo","Lunes",'Martes','Miercoles','Jueves','Viernes','Sabado'],
                    dayNamesMin: [ "Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab" ],
                    monthNames: ["Enero", "Febrero", "Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                });
            });
        </script>
         @yield('scrdtab')
    </body>
</html>
