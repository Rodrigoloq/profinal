<?php 

include("conexion.php");

$conexion = fnconexion();

$ruc = $_POST["vnom"] ?? null;

$sql = "select * from Tb_Proveedores
where RUC='" . $ruc . "'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    
    echo "-1";
} else {
    echo "-2";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>