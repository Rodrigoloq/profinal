<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idempleado = $_POST["idempleado"];

$fecha = $_POST["fecha"];

$detalles = $_POST["detalles"];

$usuario = $_POST["Usu_registro"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Insert_CompraconDetalle(?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("isss", $idempleado, $fecha, $detalles, $usuario);

$error = $cn->error;

$stmt->execute();

if($error){
    echo "-1";
}else{
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>