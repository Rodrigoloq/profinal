<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$nombre = $_POST["Nom_pro"];

$descategoria = $_POST["Des_Cat"];

$usuario = $_POST["Usu_registro"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Insert_Categoria(?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("sss", $nombre, $descategoria, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>
