<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idcategoria = $_POST["Id_cat"];

$nombre = $_POST["Nom_cat"];

$descategoria = $_POST["Des_cat"];

$estado= $_POST["Est_cat"];

$usuario = $_POST["Usu_Ult_Mod"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_Categoria(?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("issis", $idcategoria, $nombre, $descategoria, $estado, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>
