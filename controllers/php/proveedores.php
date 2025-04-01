<?php
include '../../config/conexion.php'; // Asegúrate de que existe este archivo

// Obtener proveedores
$sql = "SELECT IdProveedor, nombre, dirección AS direccion, telefono, email FROM proveedor";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$proveedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver JSON
header('Content-Type: application/json'); // Indicar que la respuesta es JSON
echo json_encode($proveedores);
?>

