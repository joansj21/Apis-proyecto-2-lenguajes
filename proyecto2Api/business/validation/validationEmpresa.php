<?php

// Validar la longitud de nombre y dirección
function validarLongitud($campo, $longitud_maxima) {
    return strlen($campo) <= $longitud_maxima;
}

// Validar formato de cédula
function validarCedula($cedula) {
    $fisica = preg_match("/^\d{2}-\d{4}-\d{4}$/", $cedula);
    $juridica = preg_match("/^\d{2}-\d{3}-\d{6}$/", $cedula);
    return $fisica || $juridica;
}

// Validar formato de fecha
function validarFecha($fecha) {
    $d = DateTime::createFromFormat('d/m/Y', $fecha);
    return $d && $d->format('d/m/Y') === $fecha;
}

// Validar formato de correo electrónico
function validarCorreo($correo) {
    return filter_var($correo, FILTER_VALIDATE_EMAIL) !== false;
}

// Validar formato de teléfono
function validarTelefono($telefono) {
    return preg_match("/^\d{4}-\d{4}$/", $telefono);
}

// Validar contraseña
function validarContraseña($contraseña) {
    $longitud = strlen($contraseña) >= 8;
    $mayuscula = preg_match('/[A-Z]/', $contraseña);
    $minuscula = preg_match('/[a-z]/', $contraseña);
    $numero = preg_match('/[0-9]/', $contraseña);
    $especial = preg_match('/[!@#$%^&*]/', $contraseña);
    return $longitud && $mayuscula && $minuscula && $numero && $especial;
}

// Método para validar todos los campos
function validarCampos(Empresa $empresa) {
    $mensajeError = "";

    if (!validarLongitud($empresa->nombre, 200)) {
        $mensajeError .= 'El nombre debe tener 200 caracteres o menos. ';
    }
    if (!validarLongitud($empresa->direccion, 200)) {
        $mensajeError .= 'La dirección debe tener 200 caracteres o menos. ';
    }
    if (!validarCedula($empresa->cedula)) {
        $mensajeError .= 'La cédula debe tener un formato válido. ';
    }
    if (!validarFecha($empresa->fecha_creacion)) {
        $mensajeError .= 'La fecha debe estar en formato DD-MM-YYYY. ';
    }
   /* if (!validarCorreo($empresa->correo)) {
        $mensajeError .= 'El correo electrónico debe tener un formato válido. ';
    }*/
    if (!validarTelefono($empresa->telefono)) {
        $mensajeError .= 'El teléfono debe tener un formato válido (0000-0000). ';
    }
    if (!validarContraseña($empresa->contraseña)) {
        $mensajeError .= 'La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula, un número y un carácter especial. ';
    }

    return $mensajeError;
}


function validarCamposInsert(Empresa $empresa) {
    $mensajeError = "";

    if (!validarLongitud($empresa->nombre, 200)) {
        $mensajeError .= 'El nombre debe tener 200 caracteres o menos. ';
    }
    if (!validarLongitud($empresa->direccion, 200)) {
        $mensajeError .= 'La dirección debe tener 200 caracteres o menos. ';
    }
    if (!validarCedula($empresa->cedula)) {
        $mensajeError .= 'La cédula debe tener un formato válido. ';
    }
    if (!validarFecha($empresa->fecha_creacion)) {
        $mensajeError .= 'La fecha debe estar en formato DD-MM-YYYY. ';
    }
    if (!validarCorreo($empresa->correo)) {
        $mensajeError .= 'El correo electrónico debe tener un formato válido. ';
    }
    if (!validarTelefono($empresa->telefono)) {
        $mensajeError .= 'El teléfono debe tener un formato válido (0000-0000). ';
    }
    if (!validarContraseña($empresa->contraseña)) {
        $mensajeError .= 'La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula, un número y un carácter especial. ';
    }

    return $mensajeError;
}

?>
