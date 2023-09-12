<?php
    include("conexion.php");

    $cn = fnconexion();

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];
    $rs = mysqli_query(	$cn,
        "select * from clientes 
    where usuario='" . $usuario . "'");
    if (mysqli_num_rows($rs) == 1) {
        $row = mysqli_fetch_assoc($rs);
        if ($row["clave"] == $clave) {
            $res[] = array_map("utf8_encode", $row);
            echo json_encode($res);
        } else {
            echo "-2";
        }
    } else {
        echo "-1";
    }
    mysqli_close($cn);
    //cerrar la conexion a la base de datos
    
