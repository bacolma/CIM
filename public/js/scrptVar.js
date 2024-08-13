function calcEdad() {
    const fechaNacimiento=document.getElementById("fecnac");
    const edad=document.getElementById("edadCalc");
    console.log("Mensaje de Prueba");
    debugger;
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

    edad.value = ed;
}

function setReadO() {
    const inpt = document.querySelectorAll("input");
    const txtAr = document.querySelectorAll("textarea");
    const btnChg = document.getElementById("btnRon");

    let cont = 0;

    const camp = [ inpt, txtAr ];

    for (let i = 0 ; i < camp.length; i++) {
        camp[i].forEach(element => {
            if (element.readOnly === true) {
                element.readOnly = false;
                if (cont == 0 ) {
                    btnChg.textContent = "Cancelar Modificacion";
                    //btnG.classList.remove('disabled');
                    //togButSav();
                    $("#btnSav").toggle();
                    cont = 1;
                }
            } else {
                element.readOnly = true;
                if (cont == 0 ) {
                    btnChg.textContent = "Modificar Datos Paciente";
                    $("#btnSav").toggle();
                    cont = 1;
                }
            }
    });
    }
}

function creaCita(pacId) {
    let dpForm = document.querySelector('#dpForm');
    datePickTog();
    dpForm.setAttribute('action', "/citas/create");
    //dpForm.requestFullscreen();
    // Variable para crear el nuevo input y configuracion
    const newInp = document.createElement('input');
    newInp.setAttribute('name','pacId');
    newInp.setAttribute('hidden', 'on');
    // Asignamos el valor de la variable $pacId al input
    newInp.setAttribute('value', pacId);
    // Insertamos el elemento al inicio
    dpForm.insertBefore(newInp, dpForm.children[0]);
   // dpForm.setAttribute('action', 'citas/create');
   //dpForm.setAttribute('action', "{{route('citas.index')}}");
   //console.log(ruta);
}

function consAten() {
    let dpForm = document.querySelector('#dpForm');
    dpForm.setAttribute('action', "atenc");
    datePickTog();
}

function datePickTog() {
    let dateP = document.querySelector('#date-picker-example');
    dateP.toggleAttribute('hidden');
}

function consAgenda() {
    let dpForm = document.querySelector('#dpForm');
    datePickTog();
    dpForm.setAttribute('action', "citas/");
}
