<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idcompra = $_POST["idcompra"];

$estado = $_POST["estado_ingreso"];

$usuario = $_POST["Usu_registro"];

$fecha_lote = $_POST["fecha_lote"];

$fecha_vencimiento = $_POST["fecha_vencimiento"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_CompraRealizada_Estado(?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("iisss", $idcompra, $estado, $usuario, $fecha_lote, $fecha_vencimiento);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>