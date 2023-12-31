<?php
include("conexion.php");
$cn = fnconexion();

$idempleado = $_POST["idempleado"];

$fecha = $_POST["fecha"];

$usuario = $_POST["Usu_registro"];

$detalles_json = $_POST['detalles'];

$estado = 0;

$fec_ult_mod = null;

$usu_ult_mod = null;

$currentDateTime = new DateTime('now');
$fecharegistro = $currentDateTime->format('Y-m-d h:i:s');

$detalles = json_decode($detalles_json, true);

$mensaje = '';

$cn->begin_transaction();

// 1. Inserta un registro en la tabla "Compra"
$sql = "INSERT INTO Tb_Compra(IdEmpleado,FechaCompra,Estado_Compra,Fec_Registro,Usu_Registro,Fec_Ult_Mod,Usu_Ult_Mod)
VALUES (?,?,?,?,?,?,?);";
$stmt = $cn->prepare($sql);
$stmt->bind_param("isissss", $idempleado, $fecha, $estado, $fecharegistro, $usuario, $fec_ult_mod, $usu_ult_mod);

if ($stmt->execute()) {
    // Éxito en la inserción de Compra
    $idCompra = $cn->insert_id;

    // 2. Inserta registros en la tabla "Detalle_Compra"
    $sql = "CALL Sp_InsertarDetalleCompra(?, ?, ?, ?, ?, ?)";
    $stmt = $cn->prepare($sql);

    // Supongamos que tienes un bucle para procesar varios productos
    foreach ($detalles as $detalle) {
        $idProducto = $detalle['id_producto'];
        $idProveedor = $detalle['id_proveedor'];
        $preciounitario = $detalle['precio_unitario'];
        $cantidad = $detalle['cantidad'];

        $stmt->bind_param("iiidis", $idCompra, $idProducto, $idProveedor, $preciounitario, $cantidad, $usuario);

        if (!$stmt->execute()) {
            // Error en la inserción de Detalle_Compra
            $mensaje = "-2";
            break; // Puedes detener el bucle si hay un error
        }
    }

    if (empty($mensaje)) {
        // Si llegas a este punto sin errores, confirma la transacción
        $cn->commit();
        $mensaje = "-1";
    }
} else {
    // Error en la inserción de Compra
    $mensaje = "-2";
}

// Cierra la conexión a la base de datos
$cn->close();

// Mostrar el mensaje de éxito o error
echo $mensaje;
?>