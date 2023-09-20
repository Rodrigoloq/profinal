<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$nombre = $_POST["Nombre"];

$apellido = $_POST["Apellido"];

$nombrecontacto = $_POST["Nom_cont"];

$cargocontacto = $_POST["Cargo_cont"];

$direccion = $_POST["Direccion"];

$pais = $_POST["Pais"];

$departamento = $_POST["Departamento"];

$provincia = $_POST["Provincia"];

$distrito = $_POST["Distrito"];

$usuario = $_POST["Usu_Registro"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Insert_Proveedor(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("ssssssssss", $nombre, $apellido, $nombrecontacto, $cargocontacto, $direccion, $pais, $departamento, $provincia, $distrito, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>