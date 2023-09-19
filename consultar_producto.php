<?php 

include("conexion.php");

$conexion = fnconexion();

$id = $_POST["codigo"];

$sql = "call railway.Sp_Consultar_Producto($id)";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Crear un array para almacenar los resultados
    $registros = array();

    while ($fila = $resultado->fetch_assoc()) {
        // Agregar cada fila al array de resultados
        $registros[] = $fila;
    }

    // Convertir el array de resultados a formato JSON
    $json_resultados = json_encode($registros);

    // Mostrar el JSON
    echo $json_resultados;
} else {
    echo 'No se encontraron registros.';
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>