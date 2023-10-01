<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html
$idproveedor = $_POST["Id_prv"];

$nombre = $_POST["Nombre"];

$apellido = $_POST["Apellido"];

$nombrecontacto = $_POST["Nom_cont"];

$cargocontacto = $_POST["Cargo_cont"];

$ruc = $_POST["RUC"];

$telefono = $_POST["Telefono"];

$estado = $_POST["Est_prv"];

$direccion = $_POST["Direccion"];

$pais = $_POST["Pais"];

$departamento = $_POST["Departamento"];

$provincia = $_POST["Provincia"];

$distrito = $_POST["Distrito"];

$usuario = $_POST["Usu_Ult_Mod"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_Proveedor(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("issssssissssss", $idproveedor, $nombre, $apellido, $nombrecontacto, $cargocontacto, $ruc, $telefono, $estado, $direccion, $pais, $departamento, $provincia, $distrito, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>
