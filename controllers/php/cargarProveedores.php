<?php
require_once '../../config/conexion.php';

$sql = "SELECT * FROM proveedor";
$result = $pdo->query($sql);
$proveedores = array();
while ($row = $result->fetch()) {
  $proveedores[] = array(
    'IdProveedor' => $row['IdProveedor'],
    'nombre' => $row['nombre']
  );
}
echo json_encode($proveedores);

$pdo = null;

