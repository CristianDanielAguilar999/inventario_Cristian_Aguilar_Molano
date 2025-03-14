<?php
require_once 'conexion.php';

$sql = "SELECT * FROM categoria";
$result = $pdo->query($sql);
$categorias = array();
while ($row = $result->fetch()) {
  $categorias[] = array(
    'IdCategoria' => $row['IdCategoria'],
    'nombreCategoria' => $row['nombreCategoria']
  );
}
echo json_encode($categorias);

$pdo = null;
