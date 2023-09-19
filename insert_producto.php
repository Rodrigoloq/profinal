<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>

<body>
    <h1>Registrar los datos del producto en la bd</h1>

    <hr>

    <?php

    //incluye el archivo de conexión al servidor y la bd

    include("conexion.php");

    //invoca a la función de conexíón

    $cn = fnconexion();

    //recueprar datos del formulario html

    $nombre = $_POST["Nom_pro"];

    $idproveedor = $_POST["Id_prv"];

    $idcategoria = $_POST["Id_cat"];

    $unidadmedida = $_POST["Uni_med"];

    $usuario = $_POST["Usu_registro"];

    //agregar una sentencia sql para insertar datos

    $sql = "CALL Sp_Insert_Producto(?, ?, ?, ?, ?)";

    $stmt = $cn->prepare($sql);

    $stmt->bind_param("siiss", $nombre, $idproveedor, $idcategoria, $unidadmedida, $usuario);

    if ($stmt->execute()) {
        echo "-1";
    } else {
        echo "-2";
    }

    // Cerrar la conexión
    $stmt->close();
    $cn->close();

    ?>
</body>

</html>