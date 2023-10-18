<?php
include("conexion.php");
$cn = fnconexion();

$idempleado = $_POST["idempleado"];

$fecha = $_POST["fecha"];

$usuario = $_POST["Usu_registro"];

$cn->begin_transaction();

$sql = "INSERT INTO Tb_Orden (IdEmpleado, FechaOrden) VALUES (?, ?)";
$stmt = $cn->prepare($sql);
$stmt->bind_param("is", $idempleado, $fecha);
$stmt->execute();
$stmt->close();

$idOrden = $cn->insert_id;

$sql = "CALL Sp_InsertarDetalleOrden(?,?,?,?)";
$stmt = $cn->prepare($sql);

foreach ($_POST['detalles'] as $detalles) {
    $idProducto = $detalles['id_producto'];
    $cantidad = $detalles['cantidad'];

    $stmt->bind_param("iiis", $idOrden, $idProducto, $cantidad, $usuario);
    if ($stmt->execute()) {
        echo "-1";
    } else {
        echo "-2";
    }
}

$stmt->close();

$cn->commit();

$cn->close();
?>