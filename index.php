<?php
    require "./inc/session_start.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php
    include "./inc/head.php";
?>
<body>
    <?php

        //Condicional para verificar si la veriable tipo GET viene definida o vacia
        if (!isset($_GET['vista']) || $_GET['vista']=="") {
            $_GET['vista'] ="login";
        }

        //carga de una vista dependiendo de lo que contenga el metodo GET
        if (is_file("./vistas/" .$_GET['vista'].".php") && $_GET['vista'] !="login" && $_GET['vista'] !="404") {

            include "./inc/navbar.php";
            include "./vistas/".$_GET['vista'].".php";
            include "./inc/script.php";

        }else{
            if ($_GET['vista']=="login") {
                include "./vistas/login.php";
            }else{
                include "./vistas/404.php";
            }
        }
    ?>
</body>
</html>