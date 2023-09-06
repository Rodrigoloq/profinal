<?php
// Datos de conexión a la base de datos
$DB_HOST=$_ENV["DB_HOST"];
$DB_USER=$_ENV["DB_USER"];
$DB_PASSWORD=$_ENV["DB_PASSWORD"];
$DB_NAME=$_ENV["DB_NAME"];
$DB_PORT=$_ENV["DB_PORT"];

// Conexión a la base de datos
$conexion = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");

// Verificar la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Consulta SQL SELECT
$sql = 'SELECT * FROM Libros';

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