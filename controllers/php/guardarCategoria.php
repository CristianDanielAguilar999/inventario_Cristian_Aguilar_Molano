<?php
require_once 'conexion.php';

$datos = json_decode(file_get_contents('php://input'), true);

$nombreCategoria = $datos['nombreCategoria'];
$descripción = $datos['descripciónCategoria'];
$codigoCategoria = $datos['codigoCategoria'];
$estado = $datos['estadoCategoria'];

$sql = "INSERT INTO categoria (nombreCategoria, descripción, codigoCategoria, estado) VALUES ('$nombreCategoria', '$descripción', '$codigoCategoria', '$estado')";

if ($pdo->query($sql) === true) {
  echo "Categoría agregada correctamente";
} else {
  echo "Error al agregar categoría: " . $pdo->errorInfo()[2];
}

$pdo = null;
