<?php
require_once '../../config/conexion.php';
session_start();

header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$nombreUsuario = $data['nombreUsuario'] ?? '';
$contrasena = $data['contrasena'] ?? '';
$rol = $data['Rol'] ?? '';

if (empty($nombreUsuario) || empty($contrasena) || empty($rol)) {
    echo json_encode(['estado' => 'error', 'mensaje' => 'Faltan datos']);
    exit;
}

$stmt = $pdo->prepare('SELECT contrasena, rol FROM usuario WHERE nombre = :nombre AND rol = :rol');
$stmt->bindParam(':nombre', $nombreUsuario);
$stmt->bindParam(':rol', $rol);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
    $_SESSION['nombre'] = $nombreUsuario;
    $_SESSION['rol'] = $usuario['rol'];  // Guardamos el rol en la sesión

    echo json_encode(['estado' => 'exito', 'rol' => $usuario['rol']]);
} else {
    echo json_encode(['estado' => 'error', 'mensaje' => 'Credenciales incorrectas']);
}
?>
