<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar datos</title>
</head>

<body>
    <h1>Registrar los datos de la categoria en la bd</h1>

    <hr>

    <?php

    //incluye el archivo de conexión al servidor y la bd

    include("conexion.php");

    //invoca a la función de conexíón

    $cn = fnconexion();

    //recueprar datos del formulario html

    $nombre = $_POST["txtnombre"];

    $descripcion = $_POST["txtdescripcion"];

    //agregar una sentencia sql para insertar datos

    $sqlinsert = "insert into Tb_Categorias(nombre,Des_Cat)

    values('$nombre','$descripcion')";

    //se ejecuta la sentencia sql 

    $rs = mysqli_query($cn, $sqlinsert);

    echo "<br>";

    //se realiza la transacción

    mysqli_query($cn, "commit");

    mysqli_close($cn);

    echo "Se agrego un nuevo registro";

    echo "<br>";

    echo "<br>";

    echo "<a href=formulario1.html>Consultar</a>";

    ?>
</body>

</html>