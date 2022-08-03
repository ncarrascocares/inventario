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