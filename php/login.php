<?php
require_once 'conexion.php';
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$nombreUsuario = $data['nombreUsuario'] ?? '';
$contrasena = $data['contrasena'] ?? '';

if (empty($nombreUsuario) || empty($contrasena)) {
  echo json_encode(['estado' => 'error', 'mensaje' => 'No se han enviado los datos correctamente.']);
} else {
  $stmt = $pdo->prepare('SELECT contrasena FROM usuario WHERE nombre = :nombre');
  $stmt->bindParam(':nombre', $nombreUsuario);
  $stmt->execute();
  $contrasenaAlmacenada = $stmt->fetchColumn();

  if ($contrasenaAlmacenada && password_verify($contrasena, $contrasenaAlmacenada)) {
    $_SESSION['nombre'] = $nombreUsuario;
    echo json_encode(['estado' => 'exito']);
  } else {
    echo json_encode(['estado' => 'error', 'mensaje' => 'Credenciales incorrectas.']);
  }
}
