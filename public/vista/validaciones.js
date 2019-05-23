function validarCamposObligatorios() {

    var bandera = true
    for (var i = 0; i < document.forms[0].elements.length; i++) {
        var elemento = document.forms[0].elements[i]
        if (elemento.value == '' && elemento.type == 'text') {
            if (elemento.id == 'cedula') {
                document.getElementById('mensajeCedula').innerHTML = '<br> La cedula esta vacia'
            }
            if (elemento.id == 'nombres') {
                document.getElementById('mensajeNombre').innerHTML = '<br> El nombre esta vacio'
            }
            if (elemento.id == 'apellidos') {
                document.getElementById('mensajeApellido').innerHTML = '<br> El apellido esta vacio'
            }
            if (elemento.id == 'direccion') {
                document.getElementById('mensajeDireccion').innerHTML = '<br> El direccion esta vacio'
            }
            if (elemento.id == 'telefono') {
                document.getElementById('mensajeTelefono').innerHTML = '<br> El telefono esta vacio'
            }

            if (elemento.id == 'fechaNacimiento') {
                document.getElementById('mensajeFecha').innerHTML = '<br> El fechaNacimiento esta vacio'
            }
            if (elemento.id == 'correo') {
                document.getElementById('mensajeCorreo').innerHTML = '<br> El correo esta vacio'
            }
            if (elemento.id == 'contrasena') {
                document.getElementById('mensajeContrasena').innerHTML = '<br> El contrasena esta vacio'
            }

            elemento.style.border = '1px pink solid'
            elemento.className = 'error'
            bandera = false
        }
    }
    if (!bandera) {

    }
    return bandera
}

function validarcedu() {

    var cad = document.getElementById("cedula").value.trim();
    var total = 0;
    var longitud = cad.length;
    var longcheck = longitud - 1;

    if (cad !== "" && longitud === 10) {
        for (i = 0; i < longcheck; i++) {
            if (i % 2 === 0) {
                var aux = cad.charAt(i) * 2;
                if (aux > 9) aux -= 9;
                total += aux;
            } else {
                total += parseInt(cad.charAt(i));
            }
        }

        total = total % 10 ? 10 - total % 10 : 0;

        if (cad.charAt(longitud - 1) == total) {
            document.getElementById("mensajeCedula").innerHTML = ("Cedula Válida");

        } else {
            document.getElementById("mensajeCedula").innerHTML = ("Cedula Inválida");
        }
    }

}

function sololetras(e) {
    key = e.keyCode || e.which;

    teclado = String.fromCharCode(key).toLowerCase();

    letras = "qwertyuiopasdfghjklñzxcvbnm ";

    especiales = "8-37-38-46-164";

    teclado_especial = false;

    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true;
            break;

        }

    }

    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        document.getElementById("mensajeNombre").innerHTML = ("Dijite solo letras");
        document.getElementById("mensajeApellido").innerHTML = ("Dijite solo letras");
        return false;

    }

}

function SoloNumeros(evt) {
    if (window.event) {
        keynum = evt.keyCode;
    } else {
        keynum = evt.which;
    }

    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
        return true;
    } else {
        return false;
    }
}

function ValidarFecha() {
    var Fecha = document.getElementById('fechaNacimiento').value;
    var Mensaje = '';
    document.getElementById('mensajeFecha').className = '';
    if (Fecha.length == 8) {
        var Anio = Fecha.substr(4, 4);
        var Mes = Fecha.substr(2, 2) - 1;
        var Dia = Fecha.substr(0, 2);
        var VFecha = new Date(Anio, Mes, Dia);
        if ((VFecha.getFullYear() == Anio) && (VFecha.getMonth() == Mes) && (VFecha.getDate() == Dia)) {
            Mensaje = 'Fecha correcta';
            document.getElementById('mensajeFecha').className = 'mensajeFecha';
        } else {
            Mensaje = 'Fecha incorrecta';
            document.getElementById('mensajeFecha').className = 'mensajeFecha';
        }
    }
    document.getElementById('mensajeFecha').innerHTML = Mensaje;
}

function validarCorreo() {
    var correo = document.getElementById("correo").value;
    var long = correo.length
    var val = correo.substring(correo.length - 15)
    var val2 = correo.substring(correo.length - 11)
    if (val != "@est.ups.edu.ec" && val2 != "@ups.edu.ec") {
        document.getElementById('mensajeCorreo').innerHTML = ("Correo correcto");
        for (var i = 0; i < document.forms[0].elements.length; i++) {
            var elemento = document.forms[0].elements[i]
            if (elemento.id == 'correo') {
                document.getElementById('mensajeCorreo').innerHTML = ("Correo Incorrecto");

            }
        }
    }
}