<?php 

include("conexion.php");

$conexion = fnconexion();

$doc = $_POST["vdoc"] ?? null;

$sql = "select * from Tb_Empleados
where Nro_documento='" . $doc . "'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>