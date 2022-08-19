<?php

$consulta = "SELECT * FROM articulo";
$tabla = "";

$con = conexion();
$datos = $con->query($consulta);
$datos=$datos->fetchAll();

#listando los datos encontrados en la tabla articulos
$tabla.='
    <div class="table-container">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr class="has-text-centered">
                    <th>#</th>
                    <th>Codigo articulo</th>
                    <th>Nombre</th>
                    <th>precio</th>
                    <th>Cantidad</th>
                    <th>imagen</th>
                    <th>Categoria</th>
                    <th>Responsable</th>
                    <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody>
';
foreach ($datos as $rows){
    $tabla.='
    <tr class="has-text-centered">
        <td>'.$rows['articulo_id'].'</td>
        <td>'.$rows['articulo_codigo'].'</td>
        <td>'.$rows['articulo_nombre'].'</td>
        <td>'.$rows['articulo_precio'].'</td>
        <td>'.$rows['articulo_stock'].'</td>
        <td>'.$rows['articulo_foto'].'</td>
        <td>'.$rows['categoria_id'].'</td>
        <td>'.$rows['usuario_id'].'</td>
        <td>
            <a href="" class="button is-success is-rounded is-email">Actualizar</a>
        </td>
        <td>
            <a href="" class="button is-danger is-rounded is-email">Eliminar</a>
        </td>
    </tr> 
    ';
}

$tabla.='</tbody></table></div>
';

echo $tabla;