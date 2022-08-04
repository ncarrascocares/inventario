<?php

//Inclusión del archivo
require_once "main.php";

#Almacenando datos
$nombre = limpiar_cadena($_POST["usuario_nombre"]);
$apellido = limpiar_cadena($_POST["usuario_apellido"]);

$usuario = limpiar_cadena($_POST["usuario_usuario"]);
$email = limpiar_cadena($_POST["usuario_email"]);

$clave_1 = limpiar_cadena($_POST["usuario_clave_1"]);
$clave_2 = limpiar_cadena($_POST["usuario_clave_2"]);

#Verificando campos obligatorios
if ($nombre=="" || $apellido=="" || $usuario=="" || $clave_1=="" || $clave_2=="" ) {
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos obligatorios.
        </div>
    ';

    exit();
}

# Verificando integridad de los datos

if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $nombre)){
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            El <strong> Nombre </strong> no coincide con el formato solicitado.
        </div>
    ';

    exit();
}

if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}", $apellido)){
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            El <strong> Apellido </strong> no coincide con el formato solicitado.
        </div>
    ';

    exit();
}

if(verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)){
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            El <strong> Usuario </strong> no coincide con el formato solicitado.
        </div>
    ';

    exit();
}

if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave_2)){
    echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            Las <strong> Claves </strong> no coinciden con el formato solicitado.
        </div>
    ';

    exit();
}

#Verificando el email
if ($email!="") {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $check_email=conexion();

        $check_email=$check_email->query("SELECT usuario_email FROM usuario WHERE usuario_email = '$email'");

        if ($check_email->rowCount()>0) {
            #alerta por encontar datos
            echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            El <strong> Email </strong> ya se encuentra registrado, favor ingresar otro email.
        </div>
        ';
        exit();
        }

        $check_email=null;
    } else {
        echo '
        <div class="notification is-danger is-light">
            <button class="delete"></button>
            <strong>Ocurrio un error inesperado!</strong><br>
            El <strong> Email </strong> no es valido.
        </div>
    ';
    exit();
    }
    
}

#Verificando usuario#
$check_usuario=$conexion(); 
$check_usuario=$check_usuario->query("SELECT usuario_usuario FROM usuario WHERE usuario_usuario='$usuario");
if ($check_usuario->rowCount()>0) {
    echo '
    <div class="notification is-danger is-light">
        <button class="delete"></button>
        <strong>Ocurrio un error inesperado!</strong><br>
        El <strong> Usuario </strong> ya se encuentra registrado, favor ingresar otro usuario.
    </div>
    ';
    exit();
}

$check_usuario=null;

#verificando las contraseñas
if ($clave_1 != $clave_2) {
    echo '
    <div class="notification is-danger is-light">
        <button class="delete"></button>
        <strong>Ocurrio un error inesperado!</strong><br>
        Las <strong> Claves </strong> ingresadas no coinciden.
    </div>
    ';
    exit();
}else{
    $clave=password_hash($clave_1,PASSWORD_BCRYPT,["cost"=>10]);

}

#Guardando datos#
$guardar_usuario=$conexion(); 
$guardar_usuario=$guardar_usuario->query("INSERT INTO  usuario (usuario_nombre, usuario_apellido, usuario_usuario, usuario_clave, usuario_email) VALUES ('$nombre', '$apellido', '$usuario', '$clave', '$email')");