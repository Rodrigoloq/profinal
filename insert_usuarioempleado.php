<?php
include("conexion.php");

//invoca a la función de conexíón

$cn = fnconexion();

//recueprar datos del formulario html

$nombre = $_POST["nombre"];

$apellido = $_POST["apellido"];

$cargo= $_POST["cargo"];

$fecha_nac = $_POST["fecha_nac"];

$genero = $_POST["genero"];

$fecha_ing = $_POST["fecha_ing"];

$direccion = $_POST["direccion"];

$tipo_doc = $_POST["tipo_doc"];

$num_doc = $_POST["num_doc"];

$distrito = $_POST["distrito"];

$telefono = $_POST["telefono"];

$login = $_POST["login_usu"];

$usuario = $_POST["usuario"];

$password = $_POST["password"];

$nivel = $_POST["nivel_usu"];

//agregar una sentencia sql para insertar datos

$sql = "CALL Sp_Insertar_UsuarioEmpleado(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $cn->prepare($sql);

$stmt->bind_param("ssssississssssi", $nombre, $apellido, $cargo, $fecha_nac, $genero, $fecha_ing, 
$direccion, $tipo_doc, $num_doc, $distrito, $telefono, $login, $usuario, $password, $nivel);

if ($stmt->execute()) {
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión
$stmt->close();
$cn->close();
?>