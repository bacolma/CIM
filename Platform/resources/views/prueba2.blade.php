<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Prueba con Disabled</p>
    <div>
        <label for="enDateP">Habilitar y Deshabilitar Opciones</label>
        <input type="checkbox"id="enDateP" name="enDateP" onclick="enaDateP()"><br>

        <label for="dateP">Fecha a Consultar: </label>
        <input type="date" id="dateP" name="dateP" disabled>
    </div>
    <div>
        <br><label for="tipcon">Opciones</label>
        <select class="form-control" id="tipcon" name="tipcon">
            <option value="1">Opcion 1</option>
            <option value="2">Opcion 2</option>
            <option value="3">Opcion 3</option>
        </select>
    </div>

    <script type="text/javascript" charset="utf8" src="{{ asset('js/scrptVar.js')}}"></script>
    <script>
        function enaDateP() {
    let datePEn = document.getElementById('dateP');
    console.log('Seleccionado');
    if (datePEn.disabled == true){
        datePEn.disabled = !datePEn.disabled;
        console.log('Habilitado');
    } else {
        datePEn.disabled = !datePEn.disabled;
        console.log('Deshabilitado');
    }
}
    </script>
</body>
</html>
