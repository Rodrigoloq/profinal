<?php
    include("conexion.php");

    $conexion = fnconexion();

    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $resultado = $conexion->query("SELECT * FROM Tb_Usuario WHERE Login_usuario = $usuario");

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        if ($fila["Pass_Usuario"] == $clave) {
            $registro[] = $fila;
            echo json_encode($registro, JSON_UNESCAPED_UNICODE);
        }else{
            echo "-1";
        }
        
    } else {
        echo "-2";
    }
    //cerrar la conexion a la base de datos
    $conexion->close(); 
?>