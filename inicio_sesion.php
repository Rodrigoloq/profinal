<?php
    include("conexion.php");

    $cn = fnconexion();

    $usuario = $_POST["usuario"] ?? null;
    $clave = $_POST["clave"] ?? null;
    $rs = mysqli_query(	$cn,
        "select * from Tb_Usuario 
    where Login_usuario='" . $usuario . "'");
    if (mysqli_num_rows($rs) == 1) {
        $row = mysqli_fetch_assoc($rs);
        if ($row["Pass_Usuario"] == $clave) {
            $res[] = array_map(NULL, $row);
            echo json_encode($res);
        } else {
            echo "-2";
        }
    } else {
        echo "-1";
    }
    mysqli_close($cn);
    //cerrar la conexion a la base de datos
    
