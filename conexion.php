<?php
header('Access-Control-Allow-Headers', 'Content-Type');

function fnconexion()
{

    $DB_HOST = $_ENV["DB_HOST"];
    $DB_USER = $_ENV["DB_USER"];
    $DB_PASSWORD = $_ENV["DB_PASSWORD"];
    $DB_NAME = $_ENV["DB_NAME"];
    $DB_PORT = $_ENV["DB_PORT"];

    $conexion = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");

    $bd = mysqli_select_db($conexion, "$DB_NAME");

    mysqli_set_charset($conexion, "utf8");

    if (($conexion == true) && ($bd == true)) {
    } else {
        echo ("Error conectandose a la BD");

        mysqli_close($conexion);
    }
    return $conexion;
}
?>