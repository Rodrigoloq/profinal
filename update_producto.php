<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idproducto = $_POST["Id_pro"];

$nombre = $_POST["Nom_pro"];

$idcategoria = $_POST["Id_cat"];

$unidadmedida = $_POST["Uni_med"];

$stockminimo = $_POST["Stock_minimo"];

$justificacion = $_POST["justificacion"];

$descontinuado = $_POST["Descontinuado"];

$estado= $_POST["Est_pro"];

$usuario = $_POST["Usu_Ult_Mod"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_Producto(?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("isisisiis", $idproducto, $nombre, $idcategoria, $unidadmedida, $stockminimo, $justificacion, $descontinuado, $estado, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>
