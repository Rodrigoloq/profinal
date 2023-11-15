<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$idempleado = $_POST["idempleado"];

$nombre = $_POST["nombre"];

$apellido = $_POST["apellido"];

$cargo= $_POST["cargo"];

$fecha_nac = $_POST["fecha_nac"];

$fecha_ing = $_POST["fecha_ing"];

$direccion = $_POST["direccion"];

$tipo_doc = $_POST["tipo_doc"];

$num_doc = $_POST["num_doc"];

$distrito = $_POST["distrito"];

$telefono = $_POST["telefono"];

$login = $_POST["login_usu"];

$password = $_POST["password"];

$nivel = $_POST["nivel_usu"];

$estado = $_POST["estado"];

$usuario = $_POST["usu_ult_mod"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Update_UsuarioEmpleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("issssssisssssiis", $idempleado, $nombre, $apellido, $cargo, $fecha_nac, $fecha_ing, 
$direccion, $tipo_doc, $num_doc, $distrito, $telefono, $login, $password, $nivel, $estado, $usuario);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>