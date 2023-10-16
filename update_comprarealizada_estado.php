<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idcompra = $_POST["idcompra"];

$idempleado = $_POST["idempleado"];

$fecha = $_POST["fecha"];

$estado = $_POST["estado_ingreso"];

$usuario = $_POST["Usu_registro"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Insert_CompraconDetalle(?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("iisis", $idcompra, $idempleado, $fecha, $estado, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>