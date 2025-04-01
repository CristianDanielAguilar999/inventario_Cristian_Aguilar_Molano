<?php
require_once '../../config/conexion.php';

// Consulta para obtener las categorías con todos los campos requeridos
$sql = "SELECT * FROM categoria";
$result = $pdo->query($sql);
$categorias = array();

while ($row = $result->fetch()) {
  // Agregar todos los datos necesarios en el array de categorías
  $categorias[] = array(
    'IdCategoria' => $row['IdCategoria'],
    'nombreCategoria' => $row['nombreCategoria'],
    'descripcion' => $row['descripción'],
    'codigoCategoria' => $row['codigoCategoria'],
    'estado' => $row['estado']
  );
}

// Devolver las categorías como JSON
echo json_encode($categorias);

$pdo = null;
